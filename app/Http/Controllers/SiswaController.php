<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    public function index()
    {
        // untuk memunculkan yang sedang login atau sudah ter authenticate
        $user = Auth::user();

        $siswa = Siswa::all();
        return view('siswa.index', compact('siswa', 'user'));
    }

    // Menampilkan form untuk membuat siswa baru
    public function create()
    {
        $jurusan = Jurusan::all();
        return view('siswa.create', compact('jurusan'));
    }

    // Menyimpan data siswa baru ke database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required',
            'nis' => 'required|unique:siswa,nis',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'jurusan_id' => 'required|exists:jurusan,id',
        ], [
            // Pesan kesalahan kustom
            'nama.required' => 'Nama harus diisi.',
            'nis.required' => 'NIS harus diisi.',
            'nis.unique' => 'NIS sudah ada di database.',
            'jenis_kelamin.required' => 'Jenis kelamin harus diisi.',
            'jenis_kelamin.in' => 'Pilih jenis kelamin yang valid.',
            'jurusan_id.required' => 'Jurusan harus dipilih.',
        ]);

        // Membuat instansi siswa baru
        $siswa = new Siswa([
            'nama' => $request->input('nama'),
            'nis' => $request->input('nis'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'jurusan_id' => $request->input('jurusan_id'),
        ]);

        // Menyimpan instansi siswa ke database
        $siswa->save();

        // Mengarahkan dengan pesan sukses
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan');
    }

    // Menampilkan form untuk mengedit siswa
    public function edit(Siswa $siswa)
    {
        $jurusan = Jurusan::all();
        return view('siswa.edit', compact('siswa', 'jurusan'));
    }

    // Memperbarui data siswa di database
    public function update(Request $request, $id)
    {
        // Validasi input untuk update
        $request->validate([
            'nama' => 'required',
            'nis' => 'required|unique:siswa,nis,' . $id,
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'jurusan_id' => 'required|exists:jurusan,id',
        ], [
            // Pesan kesalahan kustom
            'nama.required' => 'Nama harus diisi.',
            'nis.required' => 'NIS harus diisi.',
            'nis.unique' => 'NIS sudah ada di database.',
            'jenis_kelamin.required' => 'Jenis kelamin harus diisi.',
            'jenis_kelamin.in' => 'Pilih jenis kelamin yang valid.',
            'jurusan_id.required' => 'Jurusan harus dipilih.',
        ]);

        // Menemukan instansi siswa berdasarkan ID
        $siswa = Siswa::find($id);

        // Memeriksa apakah instansi siswa ada
        if (!$siswa) {
            return redirect()->route('siswa.index')->with('error', 'Siswa tidak ditemukan');
        }

        // Memperbarui instansi siswa
        $siswa->nama = $request->input('nama');
        $siswa->nis = $request->input('nis');
        $siswa->jenis_kelamin = $request->input('jenis_kelamin');
        $siswa->jurusan_id = $request->input('jurusan_id');
        $siswa->save();

        // Mengarahkan dengan pesan sukses
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diperbarui');
    }

    // Menghapus siswa dari database
    public function destroy($id)
    {
        // Menemukan instansi siswa berdasarkan ID
        $siswa = Siswa::find($id);

        // Memeriksa apakah instansi siswa ada
        if (!$siswa) {
            return redirect()->route('siswa.index')->with('error', 'Siswa not found');
        }

        // Menghapus instansi siswa
        $siswa->delete();

        // Mengarahkan dengan pesan sukses
        return redirect()->route('siswa.index');
    }
}
