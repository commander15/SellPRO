<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Auth;

class SellerController extends Controller
{
    /**
     * Show login page
     */
    public function welcome(Request $request)
    {
        if ($request->user() == null) {
            if (User::count('id') == 0) {
                $admin = new User();
                $admin->name = 'Admin';
                $admin->email = 'admin@sellpro.com';
                $admin->password = '1234';
                $admin->admin = true;
                $admin->save();
            }

            return $this->view('seller.login');
        } else
            return redirect()->route('dashboard');
    }

    /**
     * Log in a user
     */
    public function logIn(Request $request)
    {
        if (Auth::attempt([ 'email' => $request->email, 'password' => $request->password ], $request->rememberMe))
            return redirect('/dashboard');
        else
            return redirect('/login');
    }

    /**
     * Log out user
     */

     public function logOut()
     {
        Auth::logout();
        return redirect('/login');
     }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $view = $this->view("seller.index", [ 'sellers' => User::all([ 'id', 'name', 'email' ]) ]);
        $this->errorMsg = null;
        return $view;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('seller.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        return $this->view('seller.index', [
            'sellers' => User::all([ 'id', 'name', 'email' ]),
            'save_error' => !$user->save()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if (!$user->delete())
            $this->errorMessage = 'Error during user deletion: ' . $user->name;
        return $this->index();
    }
}
