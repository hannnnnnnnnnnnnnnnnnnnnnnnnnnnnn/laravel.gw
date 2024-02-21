<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class JurusanController extends Controller
{
    /**
     * Menampilkan daftar resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusan = Jurusan::all();
        return view('jurusan.index',compact('jurusan'));
    }

    /**
     * Menampilkan formulir untuk membuat resource baru.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jurusan.create');
    }

    /**
     * Menyimpan resource yang baru dibuat di penyimpanan.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_jurusan' => 'required|unique:jurusan,nama_jurusan',
            'singkatan' => 'required|unique:jurusan,singkatan',
        ],[
            'nama_jurusan.required' => 'Nama jurusan wajib diisi',
            'nama_jurusan.unique' => 'Nama jurusan yang diisikan sudah ada dalam database',
            'singkatan.required' => 'Singkatan harus diisi',
            'singkatan.unique' => 'Singkatan yang diisikan sudah ada dalam database',
        ]);

        $jurusan = new Jurusan();
        $jurusan->nama_jurusan = $request->input('nama_jurusan');
        $jurusan->singkatan = $request->input('singkatan');
        $jurusan->save();

        return redirect()->route('jurusan.index')->with('success', 'Jurusan berhasil ditambahkan');
    }

    /**
     * Menampilkan resource yang ditentukan.
     *
     * @param  \App\Models\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function show(Jurusan $jurusan)
    {
        //
    }

    /**
     * Menampilkan formulir untuk mengedit resource yang ditentukan.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jurusan = Jurusan::find($id);

        return view('jurusan.edit', [
            'jurusan'   => $jurusan,
        ]);
    }

    /**
     * Memperbarui resource yang ditentukan di penyimpanan.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jurusan $jurusan)
    {
        // Temukan Jurusan tertentu berdasarkan ID-nya
        $jurusan = Jurusan::find($jurusan->id);

        // Periksa apakah Jurusan ditemukan
        if (!$jurusan) {
            return redirect()->route('jurusan.index')->with('error', 'Jurusan tidak ditemukan');
        }

        $jurusan->nama_jurusan = $request->input('nama_jurusan');
        $jurusan->singkatan = $request->input('singkatan');
        $jurusan->save();

        return redirect()->route('jurusan.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Hapus resource yang ditentukan dari penyimpanan.
     *
     * @param  \App\Models\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jurusan $jurusan)
    {
        // Periksa apakah Jurusan ditemukan
        if (!$jurusan) {
            return redirect()->route('jurusan.index')->with('error', 'Jurusan tidak ditemukan');
        }

        $jurusan->delete();

        return redirect()->route('jurusan.index');
    }
}
