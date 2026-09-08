<?php

namespace App\Http\Controllers;
use App\Models\Item;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome()
    {
        $totalEntries = 0;
        $lostItems    = 0;
        $foundItems   = 0;
        $returnedItems = 0;

        return view('welcome', compact('totalEntries', 'lostItems', 'foundItems', 'returnedItems'));
    }
}