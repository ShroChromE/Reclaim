<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Claim;
use App\Models\Item;

class DashboardController extends Controller
{
    public function index()
    {
        $totalItems    = Item::count();
        $lostReports   = Item::where('type', 'lost')->where('status', '!=', 'resolved')->count();
        $foundItems    = Item::where('type', 'found')->whereIn('status', ['reported', 'matched'])->count();
        $returnedItems = Item::where('status', 'resolved')->count();
        $pendingClaims = Claim::where('status', 'pending')->count();

        $recent = Item::where('created_at', '>=', now()->subDays(6)->startOfDay())
            ->get(['type', 'created_at'])
            ->groupBy(fn ($item) => $item->created_at->format('Y-m-d'));

        $labels = [];
        $lost   = [];
        $found  = [];

        for ($i = 6; $i >= 0; $i--) {
            $day  = now()->subDays($i);
            $rows = $recent->get($day->format('Y-m-d'), collect());

            $labels[] = $day->format('d M');
            $lost[]   = $rows->where('type', 'lost')->count();
            $found[]  = $rows->where('type', 'found')->count();
        }

        $reportsChart = compact('labels', 'lost', 'found');

        $statusCounts = Item::selectRaw('status, count(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status');

        $statusBarang = collect(Item::STATUS_LABELS)
            ->mapWithKeys(fn ($label, $status) => [$label => $statusCounts->get($status, 0)])
            ->all();

        $latestClaims = Claim::with(['item', 'user'])
            ->where('status', 'pending')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalItems', 'lostReports', 'foundItems', 'returnedItems', 'pendingClaims',
            'reportsChart', 'statusBarang', 'latestClaims'
        ));
    }
}