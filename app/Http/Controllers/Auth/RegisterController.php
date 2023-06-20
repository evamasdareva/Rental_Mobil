<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
     //memanggil halaman register
     function index()
     {
         return view('pages.auth.register');
     }
 
     //memproses login
     function register(Request $request)
     {
         //validasi input
         $validatedUser = $request->validate([
             'name' => 'required',
             'email' => 'required|unique:Users',
             'contact' => 'required',
             'password' => 'required',
         ]);
         
         //simpan ke database
         $userData = new User;
         $userData->name = $request->name;
         $userData->email = $request->email;
         $userData->contact = $request->contact; 
         $userData->password = bcrypt($request->password);  // 12345 -> askljduy321
         $userData->save();

         //redirect
         return redirect()->to('/login')->with('success', 'Berhasil register');
     }
}
