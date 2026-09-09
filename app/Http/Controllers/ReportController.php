<?php

namespace App\Http\Controllers;

class ReportController extends Controller
{
    public function index()
    {
        $totalReports = 4;
        $pendingReports = 2;
        $completedReports = 2;

        $reports = collect([
            (object) [
                'type' => 'Laporan Hilang',
                'item_name' => 'Dompet Hitam',
                'date' => '18 Mei',
                'status' => 'Belum Ditemukan',
            ],
            (object) [
                'type' => 'Laporan Ditemukan',
                'item_name' => 'Botol Minum',
                'date' => '17 Mei',
                'status' => 'Selesai',
            ],
            (object) [
                'type' => 'Klaim Barang',
                'item_name' => 'HP Samsung',
                'date' => '16 Mei',
                'status' => 'Diproses',
            ],
            (object) [
                'type' => 'Laporan Hilang',
                'item_name' => 'Tas Ransel',
                'date' => '15 Mei',
                'status' => 'Belum Ditemukan',
            ],
        ]);

        return view('reports.index', compact(
            'totalReports',
            'pendingReports',
            'completedReports',
            'reports'
        ));
    }
}