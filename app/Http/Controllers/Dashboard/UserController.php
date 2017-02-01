<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveUserRequest;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('name')->paginate(5);
        return view('dashboard.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SaveUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveUserRequest $request)
    {
        $data = [
            "name"          => $request->get("name"),
            "last_name"     => $request->get("last_name"),
            "email"         => $request->get("email"),
            "password"      => $request->get("password"),
            "type"          => $request->get("type"),
            "active"        => $request->has("active") ? 1 : 0,
            "address"       => $request->get("address")
        ];

        $user = User::create($data);
        $message = $user ? "usuario agregado correctamente." : "el usuario no pudo agregarse!";
        
        return redirect()->route("user.index")->with("message", $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view("dashboard.user.edit", compact("user"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $data = [
            "name"          => "required|max:100",
            "last_name"     => "required|max:100",
            "email"         => "required|email",
            "password"      => ($request->get("password") != "") ? "required|confirmed" : "",
            "type"          => "required|in:user,admin"
        ];

        $user->name = $request->get("name");
        $user->last_name = $request->get("last_name");
        $user->email = $request->get("email");
        $user->type = $request->get("type");
        $user->address = $request->get("address");
        $user->active = $request->has("active") ? 1 : 0;
        if($request->get("password") != "") $user->password = $request->get("password");   

        $updated = $user->save();
        
        $message = $updated ? "usuario actualizado correctamente." : "el usuario no pudo actualizarse.";
        
        return redirect()->route("user.index")->with("message", $message);        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $deleted = $user->delete();
        $message = $deleted ? "usuario eliminado correctamente." : "el usuario no pudo eliminarse.";

        return redirect()->route("user.index")->with("message", $message);
    }
}
