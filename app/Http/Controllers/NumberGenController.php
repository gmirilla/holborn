<?php

namespace App\Http\Controllers;

use App\Models\NumberGen;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class NumberGenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
          //Check if User has Authorization to view Page
          $user= User::find(Auth::id());
          if (str_contains($user->role,'ADMINISTRATOR')) {
              $allnumber=NumberGen::orderBy('created_at','desc')->orderBy('updated_at','desc')->paginate(25);
              return view('users.show-numbers' )->with('allnumber',$allnumber);
              
          }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $latest=NumberGen::orderBy('id', 'DESC')->first();

        //to do disable all Previous Numbering
        if ($request->padding=='on'){
            $padding=1;
        }
        $numberGen=new NumberGen();
        $numberGen->max=$request->max;
        $numberGen->min=$request->min;
        $numberGen->padding=$padding;
        $numberGen->last=$request->min;
        $numberGen->current=$request->min;
        $numberGen->step=1;
        $numberGen->active=1;
        //dd($curr);
        $numberGen->save();
        return redirect ('/usermgmt/numbering');

    }

    /**
     * Display the specified resource.
     */
    public function show(NumberGen $numberGen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NumberGen $numberGen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NumberGen $numberGen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NumberGen $numberGen)
    {
        //
    }
}
