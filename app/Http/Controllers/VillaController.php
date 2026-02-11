<?php

namespace App\Http\Controllers;

use App\Models\Villa;
use Illuminate\Http\Request;

class VillaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $villas = Villa::latest()->paginate(10);
        return view('villas.index', compact('villas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('villas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'price_per_night' => 'required|numeric|min:0',
            'capacity' => 'required|integer|min:1',
            'description' => 'nullable|string',
        ]);

        Villa::create($validated);

        return redirect()->route('villas.index')->with('success', 'Villa berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Villa $villa)
    {
        return view('villas.show', compact('villa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Villa $villa)
    {
        return view('villas.edit', compact('villa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Villa $villa)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'price_per_night' => 'required|numeric|min:0',
            'capacity' => 'required|integer|min:1',
            'description' => 'nullable|string',
        ]);

        $villa->update($validated);

        return redirect()->route('villas.index')->with('success', 'Villa berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Villa $villa)
    {
        $villa->delete();

        return redirect()->route('villas.index')->with('success', 'Villa berhasil dihapus!');
    }
}
