<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mines;

class MinesController extends Controller
{
    public function index() {
    $mines = Mines::all();

    return view('mines.index', ['mines' => $mines]);
    }

    function upload() {
        return view("mines.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'mineName' => 'required|string',
            'mineLocation' => 'required|string',
            'mineOwner' => 'required|string',
        ], [
            'gemName.required' => 'Gem name can\'t be empty!',
            'mineLocation.required' => 'Mine location can\'t be empty!',
            'mineOwner.required' => 'Mine owner can\'t be empty!',
        ]);

        mines::create([
            'mineName' => $request->mineName,
            'mineLocation' => $request->mineLocation,
            'mineOwner' => $request->mineOwner,
        ]);

        return redirect('/mines');
    }
}
