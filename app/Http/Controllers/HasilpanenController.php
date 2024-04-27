<?php

namespace App\Http\Controllers;

use App\Models\tb_device;
use App\Models\tb_devicelinktouser;
use App\Models\tb_hasilpanen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HasilpanenController extends Controller
{
    function index()
    {
        $hasilpanen = tb_hasilpanen::all();
        return view('Pages.Dashboard.hasilpanen.index', compact('hasilpanen'));
    }

    function add()
    {
        // dd(tb_device::findorfail(request('token')));
        // dd();

        if (tb_device::where('token', request('token'))->first() == null) {
            return response()->json('Erorr Token');
        }
        // try {
        //     //code...

        // } catch (\Throwable $th) {
        //     //throw $th;
        // }
        // dd(tb_devicelinktouser::where('tb_devices', tb_device::where('token', request('token'))->first()->id)->first()->id);

        $hasilpanen = new tb_hasilpanen();
        $hasilpanen->pohon = request('pohon');
        $hasilpanen->overripe = request('overripe');
        $hasilpanen->ripe = request('ripe');
        $hasilpanen->underripe = request('underripe');
        // gambar is file random name
        $file = request('gambar');
        $filename = time() . '.' . $file->extension();
        $file->move(public_path('images'), $filename);
        $hasilpanen->gambar = $filename;
        $hasilpanen->brondolan = request('brondolan');
        $hasilpanen->keputusan = request('keputusan');
        $hasilpanen->users = tb_devicelinktouser::where('tb_devices', tb_device::where('token', request('token'))->first()->id)->first()->id;
        $hasilpanen->save();
        return response()->json('added');
    }
}
