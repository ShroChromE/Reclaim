<?php

namespace App\Http\Controllers;

class ItemController extends Controller
{
    public function homepage()
    {
        $totalEntries = 4;
        $lostItems = 1;
        $foundItems = 2;
        $returnedItems = 1;

        return view('items.homepage', compact(
            'totalEntries',
            'lostItems',
            'foundItems',
            'returnedItems'
        ));
    }
}