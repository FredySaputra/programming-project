<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DateTime;
use DateTimeZone;
use App\Models\Asisten;
use App\Models\Calas;

class LoginController extends Controller
{
    //  
    public function index()
    {
        return view('login.login', [
            'title' => 'login',
            'active' => 'login'
        ]);
    }


    public function authenticate(Request $request)
    {
        $request->validate([
            'nim' => 'required',
            'password' => 'required',
        ]);

        if (auth::guard('admin')->attempt(['nim_admin' => $request->nim, 'password' => $request->password])) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }
        // return redirect('/');
        return back()->with('loginError', 'Login Failed!');

    }

    public function OtentikasiAsisten(Request $request)
    {
        $request->validate([
            'nim' => 'required',
            'password' => 'required',
        ]);

        if (auth::guard('anggota')->attempt(['nim' => $request->nim, 'password' => $request->password])) {
            $request->session()->regenerate();
            $timezone = 'Asia/Jakarta';
            $date = new DateTime('now', new DateTimeZone($timezone));
            $tanggal = $date->format('Y-m-d');
            $localtime = $date->format('H:i:s');
            // $nim = $request->input('nim');

            $presensi = Asisten::where([
                ['nim', '=', auth::guard('anggota')->user()->nim],
                ['tgl', '=', $tanggal],
            ])->first();
            if ($presensi) {
                dd("sudah ada", $presensi->nim);
            } else {
                Asisten::create([
                    'nim' => auth::guard('anggota')->user()->nim,
                    'nama' => auth::guard('anggota')->user()->nama,
                    'jabatan' => auth::guard('anggota')->user()->jabatan,
                    'id' => auth::guard('anggota')->user()->id,
                    'tgl' => $tanggal,
                    'jammasuk' => $localtime,
                ]);
            }


            return redirect()->intended('/dashboard/Asisten');
        }
        // return redirect('/');
        return back()->withError('Login Failed!');

    }
    public function OtentikasiCalas(Request $request)
    {
        $request->validate([
            'nim' => 'required',
            'password' => 'required',
        ]);

        if (auth::guard('anggota')->attempt(['nim' => $request->nim, 'password' => $request->password])) {
            $request->session()->regenerate();
            $timezone = 'Asia/Jakarta';
            $date = new DateTime('now', new DateTimeZone($timezone));
            $tanggal = $date->format('Y-m-d');
            $localtime = $date->format('H:i:s');
            // $nim = $request->input('nim');

            $presensi = Calas::where([
                ['nim', '=', auth::guard('anggota')->user()->nim],
                ['tgl', '=', $tanggal],
            ])->first();
            if ($presensi) {
                dd("sudah ada", $presensi->nim);
            } else {
                Calas::create([
                    'nim' => auth::guard('anggota')->user()->nim,
                    'nama' => auth::guard('anggota')->user()->nama,
                    'jabatan' => auth::guard('anggota')->user()->jabatan,
                    'id' => auth::guard('anggota')->user()->id,
                    'tgl' => $tanggal,
                    'jammasuk' => $localtime,
                ]);
            }


            return redirect()->intended('/dashboard/Calas');
        }
        // return redirect('/');
        return back()->withError('Login Failed!');
    }

    public function logoutcalas()
    {
        return view('dashboard.logincalas.logout-calas');
    }
}
