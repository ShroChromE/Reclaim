<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $totalItems = 28;
        $lostReports = 12;
        $foundItems = 14;
        $returnedItems = 8;

        $weeklyActivity = [20, 45, 65, 100, 15, 55, 70];

        $statusBarang = [
            'Belum Diklaim' => 10,
            'Belum Dikembalikan' => 8,
            'Sudah Kembali' => 8,
        ];

        return view('admin.dashboard', compact(
            'totalItems',
            'lostReports',
            'foundItems',
            'returnedItems',
            'weeklyActivity',
            'statusBarang'
        ));
    }
}