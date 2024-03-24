<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class usermgmtController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user= User::find(Auth::id());

        if(str_contains($user->role, 'ADMINISTRATOR')){
            $allusers=User::get();

            return view ('users.view-allusers',compact('allusers'));


        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $user= User::find(Auth::id());

        if(str_contains($user->role, 'ADMINISTRATOR')){
            $showuser=User::find($request->id);

            return view ('users.view-user',compact('showuser'));


        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        //
        $user=User::find($request->id);
        $roles="";
        if($request->login=='on'){
            $roles=$roles.'0';
        }
        if($request->btrans=='on'){
            $roles=$roles.', BTRANS';
        }
        if($request->validator=='on'){
            $roles=$roles.', VALIDATOR';
        }
        if($request->approver=='on'){
            $roles=$roles.', APPROVER';
        }
        if($request->suser=='on'){
            $roles=$roles.', SUPERUSER';
        }
        if($request->admin=='on'){
            $roles=$roles.', ADMINISTRATOR';
        }

        $user->role=$roles;
        $user->save();

     return redirect('/usermgmt/getuser?id='.$user->id);
    }

        /**
     * Update the specified resource in storage.
     */
    public function editprofile(Request $request)
    {
        //
        
        $user=User::find($request->id);
        $validate=$request->validate(['name'=>'required',
        'email'=>'email'] );
        $user->name=$request->name;
        $user->email=$request->email;
        $user->save();
        return redirect('/usermgmt/getuser?id='.$user->id);

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //

        $user=User::find($request->id);
        $user->delete();

        $allusers=User::get();

        return view ('users.view-allusers',compact('allusers'));


    }
}
