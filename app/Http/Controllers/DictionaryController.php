<?php

namespace App\Http\Controllers;

use App\Models\Dictionary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DictionaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dictionaries = Dictionary::all();
        return view('dictionaries.index', compact('dictionaries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dictionaries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'letter' => ['required'],
            'description' => ['required'],
            'image' => ['required', 'file', 'mimes:png,jpeg'],
        ]);

        $extension = $request->image->getClientOriginalExtension();
        $imageName = $request->letter . '.' . $extension;
        $documentPath = $request->image->storeAs('public/images', $imageName);

        $data = Dictionary::create([
            'letter' => $request->letter,
            'description' => $request->description,
            'image' => $documentPath,
        ]);

        return redirect()->back()->with('success', 'Dictionary Added Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dictionary $dictionary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dictionary $dictionary)
    {
        return view('dictionaries.edit', compact('dictionary'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $dictionary = Dictionary::findOrFail($id);

        $request->validate([
            'letter' => ['required'],
            'description' => ['required'],
            'image' => ['nullable', 'file', 'mimes:png,jpeg'],
        ]);

        // Update the dictionary fields
        $dictionary->letter = $request->letter;
        $dictionary->description = $request->description;

        // If a new image was uploaded, update the image_path
        if ($request->hasFile('image')) {
            // Delete the old image
            Storage::delete($dictionary->image);

            $extension = $request->image->getClientOriginalExtension();
            $imageName = $request->letter . '.' . $extension;
            $imagePath = $request->image->storeAs('public/images', $imageName);

            $dictionary->image = $imagePath;
        }

        $dictionary->save();

        return redirect()->back()->with('success', 'Dictionary Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dictionary $dictionary)
    {
        //
    }
}
