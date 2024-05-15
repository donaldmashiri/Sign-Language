<?php

namespace App\Http\Controllers;

use App\Models\Dictionary;
use Illuminate\Http\Request;

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
            'image' => ['required', 'file', 'mimes:pdf,doc,docx'],
        ]);

        $documentPath = $request->case_document->store('public/documents');

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dictionary $dictionary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dictionary $dictionary)
    {
        //
    }
}
