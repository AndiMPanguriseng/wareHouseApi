<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Jam;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class JadwalController extends Controller
{
    public function exportPdf()
    {
        // Ambil semua data jadwal
        $records = Jadwal::with([
            'jamMulai',
            'jamSelesai',
            'hari',
            'ruangan',
            'dosenPj',
            'dosenAnggota1',
            'dosenAnggota2',
            'dosenAnggota3',
            'matkul'
        ])->get();

        // Ambil semua data jam
        $jamList = Jam::all();

        // Mengirim data ke view untuk rendering PDF
        return Pdf::loadView('pdf', compact('records', 'jamList'))
            ->setPaper('a4', 'landscape') // Mengatur ukuran kertas
            ->stream('jadwal.pdf'); // Mengirim PDF ke browser
    }
}
