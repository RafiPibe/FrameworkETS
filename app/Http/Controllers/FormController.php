<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\gems;
use App\Models\Mines;

class FormController extends Controller
{
    public function index() {
        $gems = gems::all();
        $mines = Mines::all();

        return view('form.index', ['gems' => $gems, 'mines' => $mines]);
    }

    public function create()
    {
        $mines = Mines::all();
        return view('form.index', compact('mines'));
    }

    public function show() {
        $gems = gems::all();
        $mines = Mines::all();

        return view('form.show', ['gems' => $gems]);
    }

    public function imageToBase64($imagePath) {
        try {
            $imageData = file_get_contents($imagePath);
            if ($imageData === false) {
                throw new Exception("Failed to read the image file.");
            }

            $base64Encoded = base64_encode($imageData);
            return $base64Encoded;
        } catch (Exception $e) {
            echo "An error occurred: " . $e->getMessage();
            return null;
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'gemName' => 'required|string',
            'rating' => 'required',
            'gemSize' => 'required|integer',
            // 'mines_id' => 'required',
            'gemImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'gemName.required' => 'Gem name can\'t be empty!',
            'rating.required' => 'Rating can\'t be empty!',
            'gemSize.required' => 'Gem Size can\'t be empty!',
            // 'mines_id.required' => 'Mines can\'t be empty!',
            'gemImage.required' => 'Image can\'t be empty!',
        ]);

        $image = $request->file('gemImage');
        $imageName = $image->getClientOriginalName();

        if ($image) {
            $imageBase64 = base64_encode(file_get_contents($image));
        } else {
            $imageBase64 = null; // or any default value you want to use
        }

        gems::create([
            'gemName' => $request->gemName,
            'rating' => $request->rating,
            'gemSize' => $request->gemSize,
            // 'mines_id' => $request->mines_id,
            'gemImage' => $imageBase64
        ]);

        return redirect('/show');
    }
}
