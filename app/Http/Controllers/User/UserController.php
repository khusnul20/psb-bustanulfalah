<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Tahunajaran;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade\PDF;


class UserController extends Controller
{

    public function register()
    {
        // Nomer pendaftaran Otomatis
        $user = User::all();
        $now = Carbon::now();
        $thnBulan = $now->year . $now->month;
        $cek = User::count();
        $ambil = 1001;
        $urut = $ambil + $cek;
        $nomer = $thnBulan . $urut;

        $tahunAjaran = Tahunajaran::all();
        return view('dashboard.user.register', compact('user', 'nomer', 'tahunAjaran'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'no_pend' => 'required',
            'nisn' => 'required|unique:users,nisn',
            'tahun_ajaran' => 'required',
            'name' => 'required|unique:users,name',
            'tanggalLahir' => 'required',
            'tempatLahir' => 'required|max:20',
            'anakKe' => 'required|max:5',
            'jumlahSaudara' => 'required|max:5',
            'image' => 'required|mimes:jpg,jpeg,png',
            'image' => 'required|mimes:jpg,jpeg,png',
            'foto_kk' => 'required|mimes:jpg,jpeg,png',
            'jenisKelamin' => 'required',
            'nameAyah' => 'required|max:225',
            'pekerjaanAyah' => 'required',
            'penghasilanAyah' => 'required',
            'noAyah' => 'required|max:13',
            'alamatAyah' => 'required',
            'nameIbu' => 'required|max:225',
            'pekerjaanIbu' => 'required',
            'penghasilanIbu' => 'required|max:25',
            'noIbu' => 'required|max:13',
            'alamatIbu' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5|max:30',
        ]);
        $image = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move('upload/image', $image);

        $foto_kk = time() . '.' . $request->foto_kk->getClientOriginalExtension();
        $request->foto_kk->move('upload/FotoKK', $foto_kk);

        $kelas = Kelas::all()->first();
        User::create([
            'id_kelas' => $kelas->id,
            'no_pend' => request('no_pend'),
            'nisn' => request('nisn'),
            'name' => request('name'),
            'tahunajaran_id' => request('tahun_ajaran'),
            'tanggalLahir' => request('tanggalLahir'),
            'tempatLahir' => request('tempatLahir'),
            'anakKe' => request('anakKe'),
            'jumlahSaudara' => request('jumlahSaudara'),
            'image' => $image,
            'foto_kk' => $foto_kk,
            'jenisKelamin' => request('jenisKelamin'),
            'nameAyah' => request('nameAyah'),
            'pekerjaanAyah' => request('pekerjaanAyah'),
            'penghasilanAyah' => request('penghasilanAyah'),
            'noAyah' => request('noAyah'),
            'alamatAyah' => request('alamatAyah'),
            'nameIbu' => request('nameIbu'),
            'pekerjaanIbu' => request('pekerjaanIbu'),
            'penghasilanIbu' => request('penghasilanIbu'),
            'noIbu' => request('noIbu'),
            'alamatIbu' => request('alamatIbu'),
            'email' => request('email'),
            'password' => Hash::make($request->password),
        ]);
        if ($request) {
            return redirect()->route('user.login')->with('success', 'Proses register berhasil! Silahkan login');
        } else {
            return redirect()->back()->with('fail', 'Something went worng, failed to register');
        }
    }

    public function login()
    {
        return view('dashboard.user.login');
    }

    public function check(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:5|max:30',
        ]);

        $creds = $request->only('email', 'password');
        if (Auth::guard('web')->attempt($creds)) {
            Alert::success('Berhasil Login', 'Selamat Datang di Dashboard Santri');
            return redirect()->route('user.home');
        } else {
            return redirect()->route('user.login')->with('fail', 'Login Gagal!');
        }
    }

    // public $jumlah = 0;

    public function home()
    {
        $user = User::all();
        $pengumuman = Pengumuman::all();
        $jumlah_pengumuman = Pengumuman::where('tutup', 1)->latest()->count();
        return view('dashboard.user.home', compact('user', 'pengumuman', 'jumlah_pengumuman'));
    }


    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }
}
