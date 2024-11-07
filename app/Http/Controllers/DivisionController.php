<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Division;

class DivisionController extends Controller
{
    public function index()
    {
        $divisions = Division::all();

        return view('divisions.index', compact('divisions'));
    }

    public function edit()
    {
        return view('divisions.edit');
    }

    public function update(Request $request)
    {
        return view('divisions.edit');
    }

    public function create()
    {
        $divisions = Division::all();

        return view('divisions.create', compact('divisions'));
    }
}
