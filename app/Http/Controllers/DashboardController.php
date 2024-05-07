<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Anggota;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class DashboardController extends Controller
{
    //
    public function index()
    {

        return view("RegistUser.registuser");
    }

    public function home()
    {
        $dataanggota = Anggota::all();
        return view('dashboard.index', compact('dataanggota'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'nim' => 'required|min:10|max:10',
            'nama' => 'required|',
            'jabatan' => 'required',
            'nomortelepon' => 'required',
            'password' => 'required|min:8',
        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);

        Anggota::create($validatedData);
        return redirect('/dashboard');
    }


}
