<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Pengumuman;
use Barryvdh\DomPDF\Facade\PDF;
use App\Http\Controllers\Controller;

class CetakFormulirController extends Controller
{
    public function index()
    {
        $jumlah_pengumuman = Pengumuman::where('tutup', 1)->latest()->count();
        $pengumuman = Pengumuman::all();
        return view('dashboard.user.cetakFormulir', compact('jumlah_pengumuman', 'pengumuman'));
    }

    public function cetakformulir()
    {
        $data = User::all();
        // return view('dashboard.user.downloadPDF', compact('data'));
        view()->share('data', $data);
        $pdf = PDF::loadView('dashboard.user.downloadPDF', compact('data'));
        $pdf->setPaper('A4', 'potrait');
        return $pdf->stream();
    }
}
