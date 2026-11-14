<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Item;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreItemRequest;


class ItemController extends Controller
{
    public function index(Request $request)
    {
        $items = Item::latest('date')
            ->latest('id')
            ->paginate(10)
            ->withQueryString();

        $totalEntries  = Item::count();
        $lostItems     = Item::where('type', 'lost')->count();
        $foundItems    = Item::where('type', 'found')->count();
        $returnedItems = Item::where('status', 'resolved')->count();

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
        $item = (object) [
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

    public function create(Request $request)
    {
        $type = in_array($request->query('type'), Item::TYPES)
            ? $request->query('type')
            : 'lost';

        return view('items.create', [
            'type'       => $type,
            'categories' => Item::CATEGORIES,
        ]);
    }

    public function store(StoreItemRequest $request)
    {
        $data = $request->validated();

        DB::transaction(function () use ($request, $data) {
            $imagePath = $request->hasFile('image')
                ? $request->file('image')->store('items', 'public')
                : null;

            $item = Item::create([
                'user_id'     => Auth::id(),
                'type'        => $data['type'],
                'title'       => $data['title'],
                'description' => $data['description'],
                'category'    => $data['category'],
                'location'    => $data['location'],
                'date'        => $data['date'],
                'image_path'  => $imagePath,
                'status'      => 'reported',
            ]);

            $item->statusLogs()->create([
                'status'     => 'reported',
                'changed_by' => Auth::id(),
                'note'       => 'Laporan dibuat',
            ]);
        });

        return redirect()
            ->route('items.index')
            ->with('success', 'Laporan berhasil dibuat.');
    }
    public function edit(string $id)
    {
        return view('items.edit');
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}