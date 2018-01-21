<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('users.index', ['users' => User::paginate(10)]);
    }

    public function edit($id)
    {

        return view('users.edit', ['user' => User::findOrFail($id)]);
    }

    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'phone_number' => 'required|string|max:255',
        'company' => 'string|max:255',
        'birthdate' => 'required|string|max:255|date'
      ]);

      $user = User::findOrFail($id);
      $user->phone_number = $request->phone_number;
      $user->company = $request->company;
      $user->birthdate = $request->birthdate;
      $user->save();

      return redirect('/home')->with('success','User updated successfully');
    }

    public function delete($id)
    {
        $user = User::find($id);

        $user->delete();
        return redirect('/home')->with('success','User deleted successfully');
    }

}
