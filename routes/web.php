<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HardwareController; 
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    
    // 1. Dashboard Utama
    Route::get('/dashboard', [HardwareController::class, 'indexDashboard'])->name('dashboard');

    // 2. Hardware Inventory Group
    Route::prefix('hardware')->name('hardware.')->group(function () {
        // Notebook & PC 
        Route::get('/nb-pc', [HardwareController::class, 'indexNbPc'])->name('nb-pc');
        Route::post('/nb-pc', [HardwareController::class, 'storeNbPc'])->name('nb-pc.store');
        Route::get('/nb-pc/edit/{id}', [HardwareController::class, 'editNbPc'])->name('nb-pc.edit');
        Route::put('/nb-pc/update/{id}', [HardwareController::class, 'updateNbPc'])->name('nb-pc.update');
        Route::delete('/nb-pc/delete/{id}', [HardwareController::class, 'destroyNbPc'])->name('nb-pc.destroy');

        // Printer & Copier
        Route::get('/printer', [HardwareController::class, 'indexPrinter'])->name('printer');
        Route::post('/printer', [HardwareController::class, 'storePrinter'])->name('printer.store');
        Route::get('/printer/edit/{id}', [HardwareController::class, 'editPrinter'])->name('printer.edit');
        Route::put('/printer/update/{id}', [HardwareController::class, 'updatePrinter'])->name('printer.update');
        Route::delete('/printer/delete/{id}', [HardwareController::class, 'destroyPrinter'])->name('printer.destroy');

        // Other Devices
        Route::get('/others', [HardwareController::class, 'indexOthers'])->name('others');
        Route::post('/others', [HardwareController::class, 'storeOthers'])->name('others.store');
        Route::get('/others/edit/{id}', [HardwareController::class, 'editOthers'])->name('others.edit');
        Route::put('/others/update/{id}', [HardwareController::class, 'updateOthers'])->name('others.update');
        Route::delete('/others/delete/{id}', [HardwareController::class, 'destroyOthers'])->name('others.destroy');
    });

    // 3. IP Address List 
    Route::get('/ip-list', [HardwareController::class, 'indexIp'])->name('ip-list');
    Route::post('/ip-list', [HardwareController::class, 'storeIp'])->name('ip-list.store');
    Route::get('/ip-list/{id}/edit', [HardwareController::class, 'editIp'])->name('ip-list.edit');
    Route::put('/ip-list/{id}', [HardwareController::class, 'updateIp'])->name('ip-list.update');
    Route::delete('/ip-list/{id}', [HardwareController::class, 'destroyIp'])->name('ip-list.destroy');

    // 4. Remote Access 
    Route::get('/remote-access', [HardwareController::class, 'indexRemote'])->name('remote-access');
    Route::post('/remote-access', [HardwareController::class, 'storeRemote'])->name('remote-access.store');
    Route::get('/remote-access/{id}/edit', [HardwareController::class, 'editRemote'])->name('remote-access.edit');
    Route::put('/remote-access/{id}', [HardwareController::class, 'updateRemote'])->name('remote-access.update');
    Route::delete('/remote-access/{id}', [HardwareController::class, 'destroyRemote'])->name('remote-access.destroy');

    // 5. Master Data Group (UPGRADED)
    Route::prefix('master')->name('master.')->group(function () {
        // Location
        Route::get('/location', [HardwareController::class, 'masterLocation'])->name('location');
        Route::post('/location', [HardwareController::class, 'storeMasterLocation'])->name('location.store');
        Route::delete('/location/{id}', [HardwareController::class, 'destroyMasterLocation'])->name('location.destroy');

        // Department
        Route::get('/department', [HardwareController::class, 'masterDepartment'])->name('department');
        Route::post('/department', [HardwareController::class, 'storeMasterDepartment'])->name('department.store');
        Route::delete('/department/{id}', [HardwareController::class, 'destroyMasterDepartment'])->name('department.destroy');

        // Project
        Route::get('/project', [HardwareController::class, 'masterProject'])->name('project');
        Route::post('/project', [HardwareController::class, 'storeMasterProject'])->name('project.store');
        Route::delete('/project/{id}', [HardwareController::class, 'destroyMasterProject'])->name('project.destroy');

        // Devices
        Route::get('/devices', [HardwareController::class, 'masterDevices'])->name('devices');
        Route::post('/devices', [HardwareController::class, 'storeMasterDevices'])->name('devices.store');
        Route::delete('/devices/{id}', [HardwareController::class, 'destroyMasterDevices'])->name('devices.destroy');

        // Status
        Route::get('/status', [HardwareController::class, 'masterStatus'])->name('status');
        Route::post('/status', [HardwareController::class, 'storeMasterStatus'])->name('status.store');
        Route::delete('/status/{id}', [HardwareController::class, 'destroyMasterStatus'])->name('status.destroy');
    });

    // 6. Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';