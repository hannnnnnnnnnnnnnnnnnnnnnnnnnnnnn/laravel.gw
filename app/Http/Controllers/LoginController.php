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
    $logintype = filter_var($request->input('email_or_username'), FILTER_VALIDATE_EMAIL)? 'email' : 'username';


    $request->validate([
        'email_or_username' => 'required|string|max:255',
        'password' => 'required|string|min:6',
    ]);

        $infologin = [
            $logintype => $request->input('email_or_username'),
            'password' => $request->input('password')
        ];
        // Metode ini menangani proses login. Pertama, validasi dilakukan terhadap input email dan password. Jika validasi berhasil, Auth::attempt() digunakan untuk mencoba proses otentikasi. Jika otentikasi berhasil, user diarahkan ke halaman '/siswa',
        if(Auth::attempt($infologin)){
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
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:6'
        ], [
            'name.required' => 'Nama wajib diisi',
            'username.required' => 'Username wajib diisi',
            'username.unique' => 'Username ini sudah ada',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email ini sudah ada',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal harus 6 karakter',
        ]);
    
        // Buat data user baru, yang diambil dari form registrasi.
        $data = [
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];
    
        // Bikin user baru dan disimpan ke database.
        User::create($data);
    
        // Diarahkan ke halaman 'siswa' dengan pesan sukses.
        return redirect('siswa')->with('success', 'Data berhasil ditambahkan');
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
