<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use DateTimeZone;
use App\Models\Calas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\View;

class CalasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $presentcalas = Calas::all();
        return view('dashboard.Calas.presensi-calas', compact('presentcalas'));
    }

    public function formlogout()
    {
        return view('dashboard.logincalas.logout-calas');
    }
    public function logout(Request $request)
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

            $dt = [
                'jamkeluar' => $localtime,

            ];
            if ($presensi->jamkeluar == '') {
                $presensi->update($dt);
                return redirect("/dashboard/Calas");
            } else {
                dd("Sudah ada");

            }

        }
        // return redirect('/');
        return back()->withError('Login Failed!');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('Y-m-d');
        $localtime = $date->format('H:i:s');
        // $nim = $request->input('nim');

        $presensi = Calas::where([
            ['nim', '=', auth::guard('anggota')->user()->nim],
            ['jabatan', '=', 'Calas'],
            ['tgl', '=', $tanggal],
        ])->first();
        if ($presensi) {
            dd("sudah ada", $presensi->nim);
        } else {
            Calas::create([
                'nim' => auth::guard('anggota')->user()->nim,
                'tgl' => $tanggal,
                'jammasuk' => $localtime,
            ]);

        }

        /**
         * Display the specified resource.
         */
        // public function show(string $id)
        // {
        //     //
        // }

        // /**
        //  * Show the form for editing the specified resource.
        //  */
        // public function edit(string $id)
        // {
        //     //
        // }

        // /**
        //  * Update the specified resource in storage.
        //  */
        // public function update(Request $request, string $id)
        // {
        //     //
        // }

        // /**
        //  * Remove the specified resource from storage.
        //  */
        // public function destroy(string $id)
        // {
        //     //
        // }
    }
}