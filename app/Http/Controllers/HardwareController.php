<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HardwareNbPc; 
use App\Models\HardwarePrinterCopier;
use App\Models\HardwareOtherDevice;
use App\Models\IpAddressList;
use App\Models\RemoteAccess;
use App\Models\MasterLocation;
use App\Models\MasterDepartment;
use App\Models\MasterHardwareDevice;
use App\Models\MasterProject;
use App\Models\MasterStatus;


class HardwareController extends Controller
{
    public function indexDashboard() {
        // 1. Ambil ID Status dari Master (Case Insensitive agar lebih aman)
        $normalStatusIds = MasterStatus::where('status_name', 'like', 'Normal%')->pluck('id')->toArray();
        $minorStatusIds = MasterStatus::where('status_name', 'like', '%Maintenance%')
                                     ->orWhere('status_name', 'like', '%Issue%')
                                     ->pluck('id')->toArray();
        $brokenStatusIds = MasterStatus::where('status_name', 'like', '%Broken%')
                                      ->orWhere('status_name', 'like', '%Rusak%')
                                      ->pluck('id')->toArray();

        // 2. Menghitung jumlah data di tiap tabel (Total Global)
        $countNbPc = HardwareNbPc::count();
        $countPrinter = HardwarePrinterCopier::count();
        $countOthers = HardwareOtherDevice::count();
        $countIp = IpAddressList::count();

        $totalAsset = $countNbPc + $countPrinter + $countOthers;

        // 3. Logika Pencarian Kategori (Untuk Total Asset Card)
        $notebookCount = HardwareNbPc::where(function($q){
            $q->where('item_name', 'like', '%Notebook%')->orWhere('item_name', 'like', '%Laptop%');
        })->count();
        
        $computerCount = HardwareNbPc::where(function($q){
            $q->where('item_name', 'like', '%Computer%')->orWhere('item_name', 'like', '%PC%')->orWhere('item_name', 'like', '%Desktop%');
        })->count();

        // Untuk Printer & Copier, jika tabel tersebut isinya sudah pasti printer/copier, hitung total barisnya saja agar sinkron
        $printerCount = HardwarePrinterCopier::where('item_name', 'not like', '%Copier%')->count();
        $copierCount = HardwarePrinterCopier::where('item_name', 'like', '%Copier%')->count();

        // 4. Logika Stock Ready (Status Normal)
        $stockReadyNotebook = HardwareNbPc::whereIn('status_id', $normalStatusIds)->where(function($q){
            $q->where('item_name', 'like', '%Notebook%')->orWhere('item_name', 'like', '%Laptop%');
        })->count();

        $stockReadyComputer = HardwareNbPc::whereIn('status_id', $normalStatusIds)->where(function($q){
            $q->where('item_name', 'like', '%Computer%')->orWhere('item_name', 'like', '%PC%');
        })->count();

        $stockReadyPrinter = HardwarePrinterCopier::whereIn('status_id', $normalStatusIds)->where('item_name', 'not like', '%Copier%')->count();
        $stockReadyCopier = HardwarePrinterCopier::whereIn('status_id', $normalStatusIds)->where('item_name', 'like', '%Copier%')->count();

        // 5. Logika Broken Asset (Seringkali 0 karena filter nama terlalu ketat, di sini saya buat lebih fleksibel)
        $brokenNotebook = HardwareNbPc::whereIn('status_id', $brokenStatusIds)->where(function($q){
            $q->where('item_name', 'like', '%Notebook%')->orWhere('item_name', 'like', '%Laptop%');
        })->count();

        $brokenComputer = HardwareNbPc::whereIn('status_id', $brokenStatusIds)->where(function($q){
            $q->where('item_name', 'like', '%Computer%')->orWhere('item_name', 'like', '%PC%');
        })->count();

        $brokenPrinter = HardwarePrinterCopier::whereIn('status_id', $brokenStatusIds)->where('item_name', 'not like', '%Copier%')->count();
        $brokenCopier = HardwarePrinterCopier::whereIn('status_id', $brokenStatusIds)->where('item_name', 'like', '%Copier%')->count();

        // 6. Data Untuk Graphic Chart (Condition Status) - HARUS SINKRON DENGAN TOTAL SEMUA TABEL
        $conditionNormal = HardwareNbPc::whereIn('status_id', $normalStatusIds)->count()
            + HardwarePrinterCopier::whereIn('status_id', $normalStatusIds)->count()
            + HardwareOtherDevice::whereIn('status_id', $normalStatusIds)->count();

        $conditionMinor = HardwareNbPc::whereIn('status_id', $minorStatusIds)->count()
            + HardwarePrinterCopier::whereIn('status_id', $minorStatusIds)->count()
            + HardwareOtherDevice::whereIn('status_id', $minorStatusIds)->count();

        $conditionBroken = HardwareNbPc::whereIn('status_id', $brokenStatusIds)->count()
            + HardwarePrinterCopier::whereIn('status_id', $brokenStatusIds)->count()
            + HardwareOtherDevice::whereIn('status_id', $brokenStatusIds)->count();

        return view('dashboard', compact(
            'countNbPc', 'countPrinter', 'countOthers', 'countIp', 'totalAsset',
            'notebookCount', 'computerCount', 'printerCount', 'copierCount',
            'stockReadyNotebook', 'stockReadyComputer', 'stockReadyPrinter', 'stockReadyCopier',
            'brokenNotebook', 'brokenComputer', 'brokenPrinter', 'brokenCopier',
            'conditionNormal', 'conditionMinor', 'conditionBroken'
        ));
    }
    
    // --- KODE CRUD DAN MASTER DATA 
    public function indexNbPc() 
    {
        $assets = HardwareNbPc::all();
        $locations = MasterLocation::all();
        $projects = MasterProject::all();
        $statuses = MasterStatus::all();
        return view('hardware.nb-pc', compact('assets', 'locations', 'projects', 'statuses'));
    }

    public function storeNbPc(Request $request) 
    {
        $request->validate([
            'item_name' => 'required',
            'brand' => 'required',
            'model_type' => 'required',
            'serial_number' => 'required|unique:hardware_nb_pcs,serial_number',
            'status_id' => 'nullable|exists:master_statuses,id',
        ]);
        HardwareNbPc::create($request->all());
        return redirect()->back()->with('success', 'Asset berhasil ditambahkan!');
    }

    public function editNbPc($id) {
        $asset = HardwareNbPc::findOrFail($id);
        $locations = MasterLocation::all();
        $projects = MasterProject::all();
        $statuses = MasterStatus::all();
        return view('hardware.edit-nb-pc', compact('asset', 'locations', 'projects', 'statuses'));
    }

    public function updateNbPc(Request $request, $id) {
        $request->validate([
            'item_name' => 'required',
            'brand' => 'required',
            'model_type' => 'required',
            'status_id' => 'nullable|exists:master_statuses,id',
        ]);
        $asset = HardwareNbPc::findOrFail($id);
        $asset->update($request->all());
        return redirect()->route('hardware.nb-pc')->with('success', 'Asset berhasil diperbarui!');
    }

    public function destroyNbPc($id) {
        $asset = HardwareNbPc::findOrFail($id);
        $asset->delete();
        return redirect()->back()->with('success', 'Asset berhasil dihapus!');
    }

    public function indexPrinter() {
        $assets = HardwarePrinterCopier::all();
        $locations = MasterLocation::all();
        $projects = MasterProject::all();
        $statuses = MasterStatus::all();
        return view('hardware.printer', compact('assets', 'locations', 'projects', 'statuses'));
    }

    public function storePrinter(Request $request) {
        $request->validate([
            'item_name' => 'required',
            'brand' => 'required',
            'model_type' => 'required',
            'serial_number' => 'required|unique:hardware_printer_copiers,serial_number',
            'status_id' => 'nullable|exists:master_statuses,id',
        ]);
        HardwarePrinterCopier::create($request->all());
        return redirect()->back()->with('success', 'Printer/Copier berhasil disimpan!');
    }

    public function editPrinter($id) {
        $asset = \App\Models\HardwarePrinterCopier::findOrFail($id);
        $locations = MasterLocation::all();
        $projects = MasterProject::all();
        $statuses = MasterStatus::all();
        return view('hardware.edit-printer', compact('asset', 'locations', 'projects', 'statuses'));
    }

    public function updatePrinter(Request $request, $id) {
        $request->validate([
            'item_name' => 'required',
            'brand' => 'required',
            'model_type' => 'required',
            'status_id' => 'nullable|exists:master_statuses,id',
        ]);
        $asset = \App\Models\HardwarePrinterCopier::findOrFail($id);
        $asset->update($request->all());
        return redirect()->route('hardware.printer')->with('success', 'Printer berhasil diupdate!');
    }

    public function destroyPrinter($id) {
        $asset = \App\Models\HardwarePrinterCopier::findOrFail($id);
        $asset->delete();
        return redirect()->back()->with('success', 'Printer berhasil dihapus!');
    }

    public function indexOthers() {
        $assets = HardwareOtherDevice::all();
        $locations = MasterLocation::all();
        $projects = MasterProject::all();
        $statuses = MasterStatus::all();
        return view('hardware.others', compact('assets', 'locations', 'projects', 'statuses'));
    }

    public function storeOthers(Request $request) {
        $request->validate([
            'item_name' => 'required',
            'brand' => 'required',
            'model_type' => 'required',
            'serial_number' => 'required|unique:hardware_other_devices,serial_number',
            'status_id' => 'nullable|exists:master_statuses,id',
        ]);
        HardwareOtherDevice::create($request->all());
        return redirect()->back()->with('success', 'Device lainnya berhasil disimpan!');
    }

    public function editOthers($id) {
        $asset = \App\Models\HardwareOtherDevice::findOrFail($id);
        $locations = MasterLocation::all();
        $projects = MasterProject::all();
        $statuses = MasterStatus::all();
        return view('hardware.edit-others', compact('asset', 'locations', 'projects', 'statuses'));
    }

    public function updateOthers(Request $request, $id) {
        $request->validate([
            'item_name' => 'required',
            'brand' => 'required',
            'model_type' => 'required',
            'status_id' => 'nullable|exists:master_statuses,id',
        ]);
        $asset = \App\Models\HardwareOtherDevice::findOrFail($id);
        $asset->update($request->all());
        return redirect()->route('hardware.others')->with('success', 'Device berhasil diupdate!');
    }

    public function destroyOthers($id) {
        $asset = \App\Models\HardwareOtherDevice::findOrFail($id);
        $asset->delete();
        return redirect()->back()->with('success', 'Device berhasil dihapus!');
    }

    public function indexIp() {
        $ips = \App\Models\IpAddressList::all();
        $departments = \App\Models\MasterDepartment::all();
        $devices = \App\Models\MasterHardwareDevice::all();
        $locations = MasterLocation::all();
        return view('ip-list', compact('ips', 'departments', 'devices', 'locations'));
    }

    public function storeIp(Request $request) {
        $request->validate([
            'ip_address' => 'required|unique:ip_address_lists',
            'username' => 'required',
        ]);
        IpAddressList::create($request->all());
        return redirect()->back()->with('success', 'IP Address berhasil disimpan!');
    }

    public function editIp($id) {
        $ip = \App\Models\IpAddressList::findOrFail($id);
        $departments = \App\Models\MasterDepartment::all(); 
        $devices = \App\Models\MasterHardwareDevice::all();
        $locations = MasterLocation::all();
        return view('edit-ip-list', compact('ip', 'departments', 'devices', 'locations'));
    }

    public function updateIp(Request $request, $id) {
        $request->validate([
            'ip_address' => 'required',
            'username' => 'required',
        ]);
        $ip = \App\Models\IpAddressList::findOrFail($id);
        $ip->update($request->all());
        return redirect()->route('ip-list')->with('success', 'IP Address berhasil diupdate!');
    }

    public function destroyIp($id) {
        $ip = \App\Models\IpAddressList::findOrFail($id);
        $ip->delete();
        return redirect()->back()->with('success', 'IP Address berhasil dihapus!');
    }

    public function indexRemote() {
        $remotes = \App\Models\RemoteAccess::all();
        $devices = \App\Models\MasterHardwareDevice::all();
        $locations = MasterLocation::all();
        $projects = MasterProject::all();
        return view('remote-access', compact('remotes', 'devices', 'locations', 'projects'));
    }

    public function storeRemote(Request $request) {
        $request->validate([
            'device_id' => 'required',
            'password' => 'required',
        ]);
        RemoteAccess::create($request->all());
        return redirect()->back()->with('success', 'Akses Remote berhasil disimpan!');
    }

    public function editRemote($id) {
        $remote = \App\Models\RemoteAccess::findOrFail($id);
        $devices = \App\Models\MasterHardwareDevice::all();
        $locations = MasterLocation::all();
        $projects = MasterProject::all();
        return view('edit-remote-access', compact('remote', 'devices', 'locations', 'projects'));
    }
    
    public function updateRemote(Request $request, $id) {
        $remote = \App\Models\RemoteAccess::findOrFail($id);
        $remote->update($request->all());
        return redirect()->route('remote-access')->with('success', 'Akses Remote berhasil diupdate!');
    }

    public function destroyRemote($id) {
        $remote = \App\Models\RemoteAccess::findOrFail($id);
        $remote->delete();
        return redirect()->back()->with('success', 'Akses Remote berhasil dihapus!');
    }

    /** Master Data Functions */
    public function masterLocation() {
        $locations = MasterLocation::all();
        return view('master.location', compact('locations'));
    }

    public function storeMasterLocation(Request $request) {
        $request->validate(['location_name' => 'required|unique:master_locations,location_name']);
        MasterLocation::create($request->all());
        return redirect()->back()->with('success', 'Lokasi berhasil ditambahkan!');
    }

    public function destroyMasterLocation($id) {
        MasterLocation::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Lokasi berhasil dihapus!');
    }

    public function masterDepartment() {
        $departments = MasterDepartment::all();
        return view('master.department', compact('departments'));
    }

    public function storeMasterDepartment(Request $request) {
        $request->validate(['dept_name' => 'required|unique:master_departments,dept_name']);
        MasterDepartment::create($request->all());
        return redirect()->back()->with('success', 'Departemen berhasil ditambahkan!');
    }

    public function destroyMasterDepartment($id) {
        MasterDepartment::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Departemen berhasil dihapus!');
    }

    public function masterProject() {
        $projects = MasterProject::all();
        return view('master.project', compact('projects'));
    }

    public function storeMasterProject(Request $request) 
    {
        $request->validate([
            'project_name' => 'required|unique:master_projects,project_name'
        ]);

        $randomCode = strtoupper(substr($request->project_name, 0, 3)) . '-' . rand(1000, 9999);

        MasterProject::create([
            'project_name' => $request->project_name,
            'project_code' => $randomCode, 
        ]);

        return redirect()->back()->with('success', 'Project berhasil ditambahkan!');
    }

    public function destroyMasterProject($id) {
        MasterProject::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Project berhasil dihapus!');
    }

    public function masterDevices() {
        $devices = MasterHardwareDevice::all();
        return view('master.devices', compact('devices'));
    }

    public function storeMasterDevices(Request $request) {
        $request->validate(['device_name' => 'required|unique:master_hardware_devices,device_name']);
        MasterHardwareDevice::create($request->all());
        return redirect()->back()->with('success', 'Device berhasil ditambahkan!');
    }

    public function destroyMasterDevices($id) {
        MasterHardwareDevice::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Device berhasil dihapus!');
    }

    public function masterStatus() {
        $statuses = MasterStatus::all();
        return view('master.status', compact('statuses'));
    }

    public function storeMasterStatus(Request $request) {
        $request->validate(['status_name' => 'required|unique:master_statuses,status_name']);
        MasterStatus::create($request->all());
        return redirect()->back()->with('success', 'Status berhasil ditambahkan!');
    }

    public function destroyMasterStatus($id) {
        MasterStatus::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Status berhasil dihapus!');
    }
}