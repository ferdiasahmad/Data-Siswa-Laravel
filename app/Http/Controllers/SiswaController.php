<?php

namespace App\Http\Controllers;

use App\Models\jurusan;
use App\Models\kelas;
use App\Models\SiswaModel;
use Alert;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = SiswaModel::with(['kelas','jurusan'])->get();
        return view ('siswa.index',compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas = kelas::all();
        $jurusan = jurusan::all();
        return view ('siswa.create',compact('kelas','jurusan'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $siswa = New SiswaModel();

        $siswa->nama_siswa = $request->nama_siswa;
        $siswa->kelas_id = $request->kelas;
        $siswa->jurusan_id = $request->jurusan;

        $siswa->save();
        Alert::success('berhasil','Data berhasil ditambahkan!');
        return redirect('/siswa');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $siswa = SiswaModel::findOrFail($id);
        $kelas = kelas::all();
        $jurusan = jurusan::all();

        return view('siswa.edit',compact('siswa','kelas','jurusan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $siswa = SiswaModel::findOrFail($id);

        $siswa->nama_siswa = $request->nama_siswa;
        $siswa->kelas_id =$request->kelas;
        $siswa->jurusan_id =$request->jurusan;

        $siswa->save();

        Alert::success('berhasil','Data berhasil diedit!');
        return redirect('/siswa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $siswa = SiswaModel::findOrFail($id);

        $siswa->delete();
        Alert::success('berhasil','Data berhasil dihapus!');
        return redirect('/siswa');
    }
}
