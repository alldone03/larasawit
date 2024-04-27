<?php

namespace App\Http\Controllers;

use App\Models\tb_device;
use App\Models\tb_devicelinktouser;
use App\Models\User;


class LinkdeviceController extends Controller
{
    function index()
    {
        $linktodevice = tb_devicelinktouser::all();
        // dd($linktodevice);
        return view('Pages.Dashboard.linkdevice.index', compact('linktodevice'));
    }
    function add()
    {
        $linktodevice = new tb_devicelinktouser();
        $linktodevice->tb_devices = request('device');
        $linktodevice->users = request('user');
        $linktodevice->save();
        return response()->json('add');
    }
    function getuseranddevice()
    {
        $device = tb_device::all();
        $user  = User::all();
        return response()->json(['device' => $device, 'user' => $user]);
    }
}
