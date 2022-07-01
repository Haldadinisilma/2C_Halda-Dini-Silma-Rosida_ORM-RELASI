<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $mahasiswa = Mahasiswa::with('kelas')->latest('nim')->paginate(3);
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all();
        return view('mahasiswa.create',['kelas' => $kelas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mahasiswa = Mahasiswa::create(
            [
                'nim' => $request->Nim,
                'nama' => $request->Nama,
                'kelas_id' => $request->Kelas,
                'jurusan' => $request->Jurusan,
                'email' => $request->Email,
                'alamat' => $request->Alamat,
                'tl' => $request->tl,
            ]);
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($Nim)
    {
        $Mahasiswa = Mahasiswa::where('nim',$Nim)->with('kelas')->first();
        return view('mahasiswa.detail', compact('Mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($Nim)
    {
        $Mahasiswa = Mahasiswa::where('nim',$Nim)->with('kelas')->first();
        $kelas = Kelas::all();
        return view('mahasiswa.edit', compact('Mahasiswa','kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Nim)
    {
        // dd($request);
        $Mahasiswa = Mahasiswa::where('nim',$Nim)->first();
        $Mahasiswa->update(
            [
                'nim' => $request->Nim,
                'nama' => $request->Nama,
                'kelas_id' => $request->Kelas,
                'jurusan' => $request->Jurusan,
                'email' => $request->Email,
                'alamat' => $request->Alamat,
                'tl' => $request->tl,
            ]);
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa Berhasil Diubah');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($Nim)
    {
        // dd($Nim);
        $Mahasiswa = Mahasiswa::where('nim',$Nim)->first();
        $Mahasiswa->delete();
        return redirect()->route('mahasiswa.index')-> with('success', 'Mahasiswa Berhasil Dihapus');
    }

    public function search(Request $request)
    {
        $mahasiswa = Mahasiswa::where('nama', 'like', '%' . $request->search . '%')->with('kelas')->paginate(3);
        return view('mahasiswa.index', compact('mahasiswa'));
    }

}
