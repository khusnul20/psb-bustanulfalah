<?php

namespace App\Http\Controllers\Pengurus;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Pengurus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;


class PengurusController extends Controller
{
    public function home()
    {
        $jumlah = User::count();
        $jumlahKelas = Kelas::count();
        return view('dashboard.pengurus.home', compact('jumlah', 'jumlahKelas'));
    }

    public function create(Request $request) //Register
    {
        $request->validate([
            'name' => 'required',
            'jabatan' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png',
            'email' => 'required|email|unique:penguruses,email',
            'password' => 'required|min:5|max:30',
        ]);

        $image = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move('upload/pengurus', $image);

        Pengurus::create([
            'name' => request('name'),
            'jabatan' => request('jabatan'),
            'image' => $image,
            'email' => request('email'),
            'password' => Hash::make($request->password),

        ]);
        if ($request) {
            return redirect()->route('pengurus.login')->with('success', 'Proses register berhasil! Silahkan login');
        } else {
            return redirect()->back()->with('fail', 'Something went worng, failed to register');
        }
    }

    public function check(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:penguruses,email',
            'password' => 'required|min:5|max:30',
        ]);

        $creds = $request->only('email', 'password');
        if (Auth::guard('pengurus')->attempt($creds)) {
            Alert::success('Berhasil Login', 'Selamat Datang di Dashboard Panitia PSB Buffa');
            return redirect()->route('pengurus.home');
        } else {
            return redirect()->route('pengurus.login')->with('fail', 'Login Gagal!');
        }
    }

    public function logout()
    {
        Auth::guard('pengurus')->logout();
        return redirect('/');
    }
}
