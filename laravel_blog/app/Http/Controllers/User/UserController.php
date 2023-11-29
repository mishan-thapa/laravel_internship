<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserStoreRequest;
use App\Http\Controllers\PostController;

class UserController extends Controller
{
    public function index()
    {
        return view("users.login");
    }

    public function create()
    {
        return view("users.register");
    }

    public function store(UserStoreRequest $request)
    {
        // Retrieve the validated input data...
        $validated = $request->validated();
        User::create($validated);
        return redirect()->back()->with('success','User Registration Success');
    }

    public function delete(string $id){
        $user = User::where('id','=',$id);//->get();
        $user->delete();
        $this->logout();
        return redirect(route('blog.index'));
    }

    public function login(UserLoginRequest $request)
    {
        //user authentication
        if (Auth::attempt($request->only("email", "password"))) {
            return redirect()->route("blog.index");
        }
        return redirect(route("users.index"))->withError(
            "Login details are not valid"
        );
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route("blog.index"));
    }


}