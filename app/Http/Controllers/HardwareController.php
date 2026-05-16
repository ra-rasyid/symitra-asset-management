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


class HardwareController extends Controller
{
    public function indexDashboard() {
    // Menghitung jumlah data di tiap tabel
    $countNbPc = HardwareNbPc::count();
    $countPrinter = HardwarePrinterCopier::count();
    $countOthers = HardwareOtherDevice::count();
    $countIp = IpAddressList::count();
    
    // Total semua asset hardware
    $totalAsset = $countNbPc + $countPrinter + $countOthers;

    return view('dashboard', compact('countNbPc', 'countPrinter', 'countOthers', 'countIp', 'totalAsset'));
    }
    
    // Fungsi untuk menampilkan halaman Notebook & PC
    public function indexNbPc() 
    {
        // Mengambil semua data dari tabel MySQL hardwares_nb_pcs
        $assets = HardwareNbPc::all();
        $locations = MasterLocation::all();
           $projects = MasterProject::all();
        
        // Mengirim data ke file view resources/views/hardware/nb-pc.blade.php
           return view('hardware.nb-pc', compact('assets', 'locations', 'projects'));
    }

    // Fungsi untuk menyimpan data baru (Store)
    public function storeNbPc(Request $request) 
    {
        // Validasi data agar tidak kosong
        $request->validate([
            'item_name' => 'required',
            'brand' => 'required',
            'model_type' => 'required',
            'serial_number' => 'required|unique:hardware_nb_pcs,serial_number',
        ]);

        // Simpan ke database
        HardwareNbPc::create($request->all());

        return redirect()->back()->with('success', 'Asset berhasil ditambahkan!');
    }

    public function editNbPc($id) {
        $asset = HardwareNbPc::findOrFail($id);
        $locations = MasterLocation::all();
           $projects = MasterProject::all();
           return view('hardware.edit-nb-pc', compact('asset', 'locations', 'projects'));
    }

    public function updateNbPc(Request $request, $id) {
        $request->validate([
            'item_name' => 'required',
            'brand' => 'required',
            'model_type' => 'required',
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


    // PRINTER & COPIER
    public function indexPrinter() {
        $assets = HardwarePrinterCopier::all();
        $locations = MasterLocation::all();
           $projects = MasterProject::all();
           return view('hardware.printer', compact('assets', 'locations', 'projects'));
    }

    public function storePrinter(Request $request) {
        $request->validate([
            'item_name' => 'required',
            'brand' => 'required',
            'model_type' => 'required',
            'serial_number' => 'required|unique:hardware_printer_copiers,serial_number',
        ]);
        HardwarePrinterCopier::create($request->all());
        return redirect()->back()->with('success', 'Printer/Copier berhasil disimpan!');
    }

    public function editPrinter($id) {
        $asset = \App\Models\HardwarePrinterCopier::findOrFail($id);
        $locations = MasterLocation::all();
           $projects = MasterProject::all();
           return view('hardware.edit-printer', compact('asset', 'locations', 'projects'));
    }

    public function updatePrinter(Request $request, $id) {
        $asset = \App\Models\HardwarePrinterCopier::findOrFail($id);
        $asset->update($request->all());
        return redirect()->route('hardware.printer')->with('success', 'Printer berhasil diupdate!');
    }

    public function destroyPrinter($id) {
        $asset = \App\Models\HardwarePrinterCopier::findOrFail($id);
        $asset->delete();
        return redirect()->back()->with('success', 'Printer berhasil dihapus!');
    }

    // OTHER DEVICES
    public function indexOthers() {
        $assets = HardwareOtherDevice::all();
        $locations = MasterLocation::all();
           $projects = MasterProject::all();
           return view('hardware.others', compact('assets', 'locations', 'projects'));
    }

    public function storeOthers(Request $request) {
        $request->validate([
            'item_name' => 'required',
            'brand' => 'required',
            'model_type' => 'required',
            'serial_number' => 'required|unique:hardware_other_devices,serial_number',
        ]);
        HardwareOtherDevice::create($request->all());
        return redirect()->back()->with('success', 'Device lainnya berhasil disimpan!');
    }

    public function editOthers($id) {
        $asset = \App\Models\HardwareOtherDevice::findOrFail($id);
        $locations = MasterLocation::all();
           $projects = MasterProject::all();
           return view('hardware.edit-others', compact('asset', 'locations', 'projects'));
    }

    public function updateOthers(Request $request, $id) {
        $asset = \App\Models\HardwareOtherDevice::findOrFail($id);
        $asset->update($request->all());
        return redirect()->route('hardware.others')->with('success', 'Device berhasil diupdate!');
    }

    public function destroyOthers($id) {
        $asset = \App\Models\HardwareOtherDevice::findOrFail($id);
        $asset->delete();
        return redirect()->back()->with('success', 'Device berhasil dihapus!');
    }

    // --- IP ADDRESS LIST ---
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
        $ip = \App\Models\IpAddressList::findOrFail($id);
        $ip->update($request->all());
        return redirect()->route('ip-list')->with('success', 'IP Address berhasil diupdate!');
    }

    public function destroyIp($id) {
        $ip = \App\Models\IpAddressList::findOrFail($id);
        $ip->delete();
        return redirect()->back()->with('success', 'IP Address berhasil dihapus!');
    }

    // --- REMOTE ACCESS ---
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
}