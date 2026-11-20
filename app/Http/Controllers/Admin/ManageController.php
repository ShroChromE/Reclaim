<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Claim;
use App\Models\Item;
use Illuminate\Http\Request;

class ManageController extends Controller
{
    public function index(Request $request)
    {
        $tab = in_array($request->query('tab'), ['all', 'lost', 'found', 'claims'])
            ? $request->query('tab')
            : 'all';

        $search = $request->query('search');
        $pendingClaims = Claim::where('status', 'pending')->count();

        if ($tab === 'claims') {
            $claims = Claim::with(['item', 'user', 'reviewer'])
                ->when($search, function ($query) use ($search) {
                    $query->whereHas('item', fn ($q) => $q->where('title', 'like', "%{$search}%"));
                })
                ->orderByRaw("status = 'pending' desc") // pending claims first
                ->latest()
                ->paginate(10)
                ->withQueryString();

            return view('admin.items.index', compact('tab', 'search', 'pendingClaims', 'claims'));
        }

        $items = Item::with('user')
            ->withCount([
                'claims',
                'claims as pending_claims_count' => fn ($q) => $q->where('status', 'pending'),
            ])
            ->when(in_array($tab, Item::TYPES), fn ($q) => $q->where('type', $tab))
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                      ->orWhere('location', 'like', "%{$search}%")
                      ->orWhere('category', 'like', "%{$search}%");
                });
            })
            ->latest('date')
            ->latest('id')
            ->paginate(10)
            ->withQueryString();

        return view('admin.items.index', compact('tab', 'search', 'pendingClaims', 'items'));
    }
}