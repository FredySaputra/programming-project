<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

//import Http Request

class RegisterController extends Controller
{
    //
    public function index()
    {
        return view("registrasi.registrasi", [
            'title' => 'register',
            'active' => 'register',
        ]);

    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'nim_admin' => 'required|min:10|max:10|unique:admins',
            'nama' => 'required',
            'jabatan' => 'required',
            'password' => 'required|min:8',
        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);

        admin::create($validatedData);
        return redirect('login');
    }


}
