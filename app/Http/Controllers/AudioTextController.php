<?php

namespace App\Http\Controllers;

use App\Models\AudioText;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class AudioTextController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('audios.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        $user = User::findorfail($id);
        $messages = AudioText::where('receiver_id', $user->id)
            ->where('sender_id', Auth::user()->id)
            ->orWhere('sender_id', $user->id)
            ->where('receiver_id', Auth::user()->id)
            ->orderBy('created_at', 'asc')
            ->get();
        return view('audios.show', compact('user', 'messages'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AudioText $audioText)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AudioText $audioText)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AudioText $audioText)
    {
        //
    }
}
