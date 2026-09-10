<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManageController extends Controller
{
    public function index(Request $request)
    {
        $allItems = collect([
            (object) [
                'id' => 1,
                'name' => 'Dompet Hitam',
                'type' => 'lost',
                'reporter' => 'William T.',
                'date' => '18 Mei',
                'status_label' => 'Belum Ditemukan',
                'claims_count' => 0,
            ],
            (object) [
                'id' => 2,
                'name' => 'Botol Minum',
                'type' => 'found',
                'reporter' => 'Admin',
                'date' => '17 Mei',
                'status_label' => 'Belum Diklaim',
                'claims_count' => 1,
            ],
            (object) [
                'id' => 3,
                'name' => 'Tas Ransel',
                'type' => 'lost',
                'reporter' => 'Ananda S.',
                'date' => '16 Mei',
                'status_label' => 'Belum Ditemukan',
                'claims_count' => 0,
            ],
            (object) [
                'id' => 4,
                'name' => 'HP Samsung',
                'type' => 'found',
                'reporter' => 'Petugas',
                'date' => '15 Mei',
                'status_label' => 'Belum Diklaim',
                'claims_count' => 2,
            ],
            (object) [
                'id' => 5,
                'name' => 'Kunci Sepeda',
                'type' => 'found',
                'reporter' => 'Petugas',
                'date' => '14 Mei',
                'status_label' => 'Sudah Diklaim',
                'claims_count' => 1,
            ],
        ]);

        $tab = $request->get('tab', 'all');

        $items = match ($tab) {
            'lost' => $allItems->where('type', 'lost')->values(),
            'found' => $allItems->where('type', 'found')->values(),
            'claims' => $allItems->where('claims_count', '>', 0)->values(),
            default => $allItems,
        };

        return view('admin.items.index', compact('items', 'tab'));
    }
}