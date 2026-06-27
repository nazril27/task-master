<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $semuaTugas = Tugas::orderBy('deadline', 'asc')->paginate(5);

        return view('tugas.index', compact('semuaTugas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tugas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'mata_kuliah' => 'required|string|max:255',
            'judul_tugas' => 'required|string|max:255',
            'deadline'    => 'required|date',
        ]);

        Tugas::create($request->all());

        return redirect()->route('tugas.index')->with('success', 'Tugas berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tugas $tugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tugas = Tugas::findOrFail($id);
        
        return view('tugas.edit', compact('tugas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'mata_kuliah' => 'required|string|max:255',
            'judul_tugas' => 'required|string|max:255',
            'deadline'    => 'required|date',
            'status'      => 'required|in:Belum Selesai,Selesai'
        ]);

        $tugas = Tugas::findOrFail($id);
        $tugas->update($request->all());

        return redirect()->route('tugas.index')->with('success', 'Tugas berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tugas = Tugas::findOrFail($id);
        $tugas->delete();

        return redirect()->route('tugas.index')->with('success', 'Tugas berhasil dihapus!');
    }
}
