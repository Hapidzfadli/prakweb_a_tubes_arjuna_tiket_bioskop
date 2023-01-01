<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dashboard;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class PasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auth = auth()->user();

        if ($auth->is_admin) {
            $listnavitem = Dashboard::getNav();
            return view('dashboard.admin.password.index', [
                'title' => 'Change Password',
                'listnav' => $listnavitem,
                'auth' => $auth,
            ]);
        } else {
            $listnavitem = Dashboard::getNavUser();
            return view('dashboard.member.password.index', [
                'title' => 'Change Password',
                'listnav' => $listnavitem,
                'auth' => $auth,
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if (password_verify($request->oldpassword, auth()->user()->password)) {
            if ($request->newpassword == $request->repassword) {
                User::find(auth()->user()->id)->update(['password' => Hash::make($request->newpassword)]);
                return back()->with('messege', 'Password has been updated!');
            } else {
                return back()->with('messege', 'Confirm password invalid');
            }
        } else {
            return back()->with('messege', 'Password Invalid');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
