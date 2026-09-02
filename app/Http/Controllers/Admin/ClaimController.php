<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClaimController extends Controller
{
    public function index()
    {
        return view('admin.claims.index');
    }

    public function update(string $item)
    {
        
    }
}
