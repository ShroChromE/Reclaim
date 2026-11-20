<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClaimRequest;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class ItemClaimController extends Controller
{
    public function store(StoreClaimRequest $request, Item $item)
    {
        $item->claims()->create([
            'user_id' => Auth::id(),
            'proof'   => $request->validated('proof'),
        ]);

        return redirect()
            ->route('items.show', $item)
            ->with('success', 'Klaim berhasil diajukan. Menunggu verifikasi admin.');
    }
}