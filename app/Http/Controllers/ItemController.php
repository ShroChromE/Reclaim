<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $allItems = collect([
            (object) [
                'id' => 1,
                'name' => 'Dompet Kulit Coklat',
                'type' => 'lost',
                'location' => 'Perpustakaan Lantai 2',
                'date' => Carbon::parse('2026-09-01'),
                'status_label' => 'Belum Ditemukan',
            ],
            (object) [
                'id' => 2,
                'name' => 'Kunci Motor Honda',
                'type' => 'found',
                'location' => 'Parkiran Gedung A',
                'date' => Carbon::parse('2026-09-03'),
                'status_label' => 'Menunggu Diambil',
            ],
            (object) [
                'id' => 3,
                'name' => 'Tas Ransel Hitam',
                'type' => 'lost',
                'location' => 'Kantin Kampus',
                'date' => Carbon::parse('2026-09-05'),
                'status_label' => 'Dalam Pencarian',
            ],
            (object) [
                'id' => 4,
                'name' => 'Handphone Samsung',
                'type' => 'found',
                'location' => 'Ruang Kelas 301',
                'date' => Carbon::parse('2026-09-06'),
                'status_label' => 'Sudah Dikembalikan',
            ],
        ]);

        $perPage = 10;
        $page = $request->get('page', 1);

        $items = new LengthAwarePaginator(
            $allItems->forPage($page, $perPage),
            $allItems->count(),
            $perPage,
            $page,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        $totalEntries = 4;
        $lostItems = 1;
        $foundItems = 2;
        $returnedItems = 1;

        return view('items.index', compact(
            'items',
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

        return view('items.show', compact('item'));
    }
}