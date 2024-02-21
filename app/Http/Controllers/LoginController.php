<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    function index()
    {
        return view('login.index');
    }


    function login(Request $request)
{
    $login = $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);
        // Metode ini menangani proses login. Pertama, validasi dilakukan terhadap input email dan password. Jika validasi berhasil, Auth::attempt() digunakan untuk mencoba proses otentikasi. Jika otentikasi berhasil, user diarahkan ke halaman '/siswa',
        if(Auth::attempt($login) ){
            $request->session()->regenerate();
            return redirect()->intended('/siswa')->with('success', 'Anda berhasil login');
        }
        // dan jika otentikasi gagal, user dikembalikan ke halaman sebelumnya dengan pesan kesalahan.
        return back()->with('loginError', 'login valid!!');
}

    public function register(Request $request)
    {
          // Fungsi ini buat nampilin form registrasi.
        return view('login.register');
    }

    function create(Request $request)
    {
         // Nah, fungsi ini nangani proses bikin user baru (registrasi).

          // Validasi dulu input dari form registrasi.
        $request->validate([
            'name'=>'required',
            'username'=>'required|unique:users,username',
            'password'=>'required|min:6'
        ],[
            'name.required'=>'nama wajib diisi',
            'username.required'=>'username wajib diisi',
            'username.unique'=>'username ini sudah adaa',
            'password.required'=>'Password wajib diisi',
            'password.min' => 'password yang di perbolehkan hanya 6 karakter',
        ]);

         // buat data user baru, yang diambil dari form registrasi.
        $data = [
            'name' => $request->name,
            'username' => $request->username,
            'password' =>Hash::make($request->password)
        ];
          // Bikin user baru dan disimpen ke database.
        User::create($data);

          // Diarahin ke halaman 'siswa' dengan pesan sukses.
        return redirect('siswa')->with('success', 'Data berhasil di tambah kan');
    }

    public function logout(Request $request)
    {
        // Fungsi ini digunakan untuk melakukan proses logout dari aplikasi. Dengan panggilan ini, sistem akan menghapus informasi otentikasi yang terkait dengan user yang sedang login.
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/login')->with('success', 'Berhasil logout');
    }
}
