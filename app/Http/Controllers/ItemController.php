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

    public function index()
    {
        return view('items.list');
    }

}