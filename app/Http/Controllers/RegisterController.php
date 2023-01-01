<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request)
    {
        $img = ['img/man.png', 'img/man1.png', 'img/man2.png', 'img/woman.png'];
        $rand = mt_rand(0, 3);
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        $validateData['password'] = Hash::make($validateData['password']);
        $validateData['image'] = $img[$rand];
        user::create($validateData);

        return redirect('/login')->with('success', 'Registration successfull! please Login');
    }
}
