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
            if (User::where('email', '=', 'admin@sellpro.com')->count('id') == 0) {
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
        $user->save();

        return redirect('/sellers');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('seller.show', [ 'seller' => $user ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('seller.edit', [ 'seller' => $user ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->has('password'))
            $user->password = $request->password;
        $user->update();
        return redirect('/sellers');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        return response()->json($user, ($user->delete() ? 200 : 404));
    }
}
