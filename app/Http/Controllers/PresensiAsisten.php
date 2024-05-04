<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use DateTimeZone;
use App\Models\Asisten;
use Illuminate\Support\Facades\Auth;
use App\Models\Anggota;

class PresensiAsisten extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $presentasisten = Asisten::all();
        return view('dashboard.Asisten.presensi-asisten', compact('presentasisten'));
    }

    public function logout()
    {
        return view('dashboard.loginasisten.logout-asisten');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function presensikeluar(Request $request)
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

            $dt = [
                'jamkeluar' => $localtime,
                ['nim', '=', auth::guard('anggota')->user()->id],
            ];
            if ($presensi->jamkeluar == '') {
                $presensi->update($dt);
                return redirect("/dashboard/Asisten");
            } else {
                dd("Sudah ada");

            }

        }
        // return redirect('/');
        return back()->withError('Login Failed!');
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

        $presensi = Asisten::where([
            ['nim', '=', auth::guard('anggota')->user()->nim],
            ['jabatan', '=', 'Asisten', 'Supervisor'],
            ['tgl', '=', $tanggal],
        ])->first();
        if ($presensi) {
            dd("sudah ada", $presensi->nim);
        } else {
            Asisten::create([
                'nim' => auth::guard('anggota')->user()->nim,
                'tgl' => $tanggal,
                'jammasuk' => $localtime,
            ]);
        }

        return redirect('dashboard.Asisten.presensi-asisten');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
