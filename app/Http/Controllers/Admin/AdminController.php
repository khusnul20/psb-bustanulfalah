<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bukti;
use App\Models\Kelas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{

    public function home()
    {
        $data = Admin::all();


        $jumlah = User::count();
        $jumlahKelas = Kelas::count();
        $jumlahBuktitf = Bukti::count();
        // dd($jumlahBuktitf);
        return view('dashboard.admin.home', compact('jumlah', 'jumlahKelas', 'data', 'jumlahBuktitf'));
    }


    public function create(Request $request) //Register
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|min:5|max:8',
        ]);

        $image = time() . '-' . $request->image->getClientOriginalName();
        $request->image->move('upload/admin', $image);

        Admin::create([
            'name' => request('name'),
            'image' => $image,
            'email' => request('email'),
            'password' => Hash::make($request->password),

        ]);
        if ($request) {
            return redirect()->route('admin.login')->with('success', 'Proses register berhasil! Silahkan login');
        } else {
            return redirect()->back()->with('fail', 'Something went worng, failed to register');
        }
    }

    public function check(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|min:5|max:30',
        ]);

        $creds = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($creds)) {
            Alert::success('Berhasil Login', 'Selamat Datang di Dashboard Admin');
            return redirect()->route('admin.home');
        } else {
            return redirect()->route('admin.login')->with('fail', 'Login Gagal!');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }



    public function profile()
    {
        return view('dashboard.admin.profile');
    }
}
