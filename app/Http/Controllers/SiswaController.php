<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswas = siswa::latest()->paginate(5);

        return view('siswa.index', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate ([
            'NIS' => 'required|unique:siswas,NIS|min:5|max:5',
            'Nama' => 'required',
            'kelas_jurusan' => 'required'
        ],[
            'NIS.required' => 'NIS Wajib Diisi',
            'NIS.unique' => 'NIS Sudah Tersedia',
            'NIS.min' => 'NIS Mininal 5 Angka',
            'NIS.max' => 'NIS Maksimal 5 Angka',
            'Nama.required' => 'Nama Wajib Diisi',
            'kelas_jurusan' => 'Kelas & Jurusan Wajib Diisi' 
        ]);
        siswa::create($request->all());

        return redirect()->route('siswa.index')->with('success','Data Siswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        return view('siswa.show', compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        return view('siswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        $request->validate ([
            'NIS' => 'required',
            'Nama' => 'required',
            'kelas_jurusan' => 'required'
        ]);
        $siswa->update($request->all());

        return redirect()->route('siswa.index')->with('success','Data Siswa Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();

        return redirect()->route('siswa.index')->with('success','Data Siswa Berhasil Dihapus');
    }
}
