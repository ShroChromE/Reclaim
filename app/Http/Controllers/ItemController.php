<?php

namespace App\Http\Controllers;

class ItemController extends Controller
{
    public function homepage()
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('items.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('items.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('items.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
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