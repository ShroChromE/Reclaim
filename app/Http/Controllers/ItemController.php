<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display the public homepage.
     */
    public function homepage()
    {
        $totalEntries = 4;
        $lostItems = 1;
        $foundItems = 2;
        $returnedItems = 1;

        return view('items.index', compact(
            'totalEntries',
            'lostItems',
            'foundItems',
            'returnedItems'
        ));
    }

     public function detail()
    {
        $item = [
            'name' => 'Dompet Hitam',
            'status' => 'Hilang',
            'category' => 'Dompet',
            'location' => 'Kelas XII TKJ 3',
            'date' => '18 Mei 2024',
            'time' => '10:30 WIB',
            'reporter' => 'William T.',
        ];

        return view('items.detail', compact('item'));
    }

    public function index()
    {
        return view('items.list');
    }

}