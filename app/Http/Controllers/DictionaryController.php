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
            'text_description' => ['required'],
            'image' => ['required', 'file', 'mimes:png,jpeg'],
        ]);

        $documentPath = $request->image->store('public/images');

        $data = Dictionary::create([
            'text_description' => $request->case_description,
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
    public function update(Request $request, Dictionary $dictionary)
    {
        $request->validate([
            'letter' => ['required'],
            'image' => ['required', 'mimes:png,jpeg'],
        ]);

        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($dictionary->image) {
                Storage::delete($dictionary->image);
            }

            // Store the new image
            $documentPath = $request->image->store('public/images');
        } else {
            // Use the existing image path
            $documentPath = $dictionary->image;
        }

        $dictionary->update([
            'letter' => $request->letter,
            'image_path' => $documentPath,
        ]);

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
