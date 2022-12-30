<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminCustomer extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listnavitem = Dashboard::getNav();
        $auth = auth()->user();
        $users = User::latest('created_at')->paginate(6);

        return view('dashboard.admin.customers.index', [
            'title' => 'Customers',
            'listnav' => $listnavitem,
            'auth' => $auth,
            'users' => $users,
        ]);
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
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function show(Dashboard $dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listnavitem = Dashboard::getNav();
        $auth = auth()->user();
        $user = User::where('id', '=', $id)->first();

        return view('dashboard.admin.customers.edit', [
            'title' => 'Edit Customer',
            'listnav' => $listnavitem,
            'auth' => $auth,
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, Dashboard $dashboard)
    {
        $user = User::where('id', '=', $id)->first();

        $data = $request->validate([
            'name' => 'required|max:255',
            'username' => ($request->username == $user->username) ?  'required|min:3|max:255' : 'required|min:3|max:255|unique:users',
            'email' => ($request->username == $user->username) ?  'required|email' : 'required|email|unique:users',
            'address' => 'nullable|max:255',
            'no_telphone' => 'nullable|max:255',
        ]);
        if ($request->file('image')) {
            $data['image'] = $request->file('image')->store('img', ['disk' => 'img']);
        }

        User::where('id', '=', $id)->update($data);

        return back()->with('messege', 'Customer has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Dashboard $dashboard)
    {
        $user = User::where('id', '=', $id)->first();
        User::destroy($user->id);

        return back()->with('messege', 'Customer has been deleted!');
    }
}
