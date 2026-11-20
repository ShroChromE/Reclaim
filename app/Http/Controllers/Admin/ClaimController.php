<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewClaimRequest;
use App\Models\Claim;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClaimController extends Controller
{
    public function update(ReviewClaimRequest $request, Claim $claim)
    {
        $data = $request->validated();
        $approved = $data['decision'] === 'approve';

        DB::transaction(function () use ($claim, $data, $approved) {
            $claim->update([
                'status'      => $approved ? 'approved' : 'rejected',
                'reviewed_by' => Auth::id(),
                'admin_note'  => $data['admin_note'] ?? null,
            ]);

            if ($approved) {
                $item = $claim->item;

                $item->update(['status' => 'claimed']);

                $item->statusLogs()->create([
                    'status'     => 'claimed',
                    'changed_by' => Auth::id(),
                    'note'       => 'Klaim dari ' . $claim->user->name . ' disetujui',
                ]);

                $item->claims()
                    ->where('id', '!=', $claim->id)
                    ->where('status', 'pending')
                    ->update([
                        'status'      => 'rejected',
                        'reviewed_by' => Auth::id(),
                        'admin_note'  => 'Barang sudah diklaim oleh pengguna lain.',
                    ]);
            }
        });

        return back()->with('success', $approved ? 'Klaim disetujui.' : 'Klaim ditolak.');
    }
}