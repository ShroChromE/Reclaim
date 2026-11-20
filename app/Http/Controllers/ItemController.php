<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemStatusRequest;


class ItemController extends Controller
{
    public function index(Request $request)
    {
        $items = Item::query()
            ->when($request->filled('search'), function ($query) use ($request) {
                $search = $request->search;

                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                    ->orWhere('location', 'like', "%{$search}%")
                    ->orWhere('category', 'like', "%{$search}%");
                });
            })

            ->when($request->filled('category'), function ($query) use ($request) {
                $query->where('category', $request->category);
            })
            
            ->when($request->filled('status'), function ($query) use ($request) {
                if (in_array($request->status, Item::TYPES)) {
                    $query->where('type', $request->status);
                } elseif ($request->status === 'returned') {
                    $query->where('status', 'resolved');
                }
            })
            ->latest('date')
            ->latest('id')
            ->paginate(10)
            ->withQueryString();
        
        $topCategories = Item::select('category', DB::raw('count(*) as total'))
            ->groupBy('category')
            ->orderByDesc('total')
            ->limit(5)
            ->get();

        return view('items.index', [
            'items'         => $items,
            'categories'    => Item::CATEGORIES,
            'topCategories' => $topCategories,
            'totalEntries'  => Item::count(),
            'lostItems'     => Item::where('type', 'lost')->count(),
            'foundItems'    => Item::where('type', 'found')->count(),
            'returnedItems' => Item::where('status', 'resolved')->count(),
        ]);
    }

    public function detail(Item $item)
    {
        $item->load(['user', 'statusLogs.changedBy']);

        $myClaim = Auth::check()
            ? $item->claims()->where('user_id', Auth::id())->first()
            : null;

        return view('items.show', compact('item', 'myClaim'));
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

    public function updateStatus(UpdateItemStatusRequest $request, Item $item)
    {
        $data = $request->validated();

        DB::transaction(function () use ($item, $data) {
            $item->update(['status' => $data['status']]);

            $item->statusLogs()->create([
                'status'     => $data['status'],
                'changed_by' => Auth::id(),
                'note'       => $data['note'] ?? null,
            ]);
        });

        return redirect()
            ->route('items.show', $item)
            ->with('success', 'Status berhasil diperbarui.');
    }
}