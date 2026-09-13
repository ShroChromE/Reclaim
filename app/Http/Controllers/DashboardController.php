<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $totalItems = 28;
        $lostItems = 12;
        $foundItems = 14;
        $returnedItems = 8;

        $categories = [
            [
                'name' => 'Tas',
                'total' => 9,
            ],
            [
                'name' => 'Dompet',
                'total' => 6,
            ],
            [
                'name' => 'Botol Minum',
                'total' => 5,
            ],
            [
                'name' => 'HP',
                'total' => 4,
            ],
            [
                'name' => 'Buku',
                'total' => 3,
            ],
        ];

        $latestItems = [
            [
                'name' => 'Dompet Hitam',
                'status' => 'Hilang',
                'date' => '18 Mei',
            ],
            [
                'name' => 'Botol Minum',
                'status' => 'Ditemukan',
                'date' => '17 Mei',
            ],
            [
                'name' => 'Tas Ransel',
                'status' => 'Hilang',
                'date' => '16 Mei',
            ],
        ];

       return view('reports.dashboard', compact(
    'totalItems',
    'lostItems',
    'foundItems',
    'returnedItems',
    'categories',
    'latestItems'
        ));

    }
}