<?php

namespace App\Http\Controllers;

use App\Models\tb_device;
use Illuminate\Http\Request;

class ManagedeviceController extends Controller
{
    //

    function index()
    {
        $listdevice = tb_device::all();
        return view('Pages.Dashboard.managedevice.index', compact('listdevice'));
    }
    function add()
    {
        $device = new tb_device();
        $device->nama_device = request('nama_device');
        $device->token = random_int(100000, 999999);
        $device->save();
        return response()->json('add');
    }
    function edit()
    {
        $id = request('id');
        $device = tb_device::find($id);
        $device->nama_device = request('nama_device');
        $device->save();
        return response()->json($device);
    }
}
