<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Currency;
use Illuminate\Support\Facades\Auth;

class currencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Check if User has Authorization to view Page
        $user= User::find(Auth::id());
        if (str_contains($user->role,'ADMINISTRATOR')) {
            $allcurr=Currency::orderBy('created_at','desc')->orderBy('updated_at','desc')->paginate(25);
            return view('users.show-currency')->with('allcurr',$allcurr);
            
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
        // create a new currency record and redirect
        $latest=Currency::orderBy('id', 'DESC')->first();

        //dd($request);
    
        $curr=new Currency();
        $curr->name=$request->curr_name;
        $curr->abbr=$request->curr_abbr;
        $curr->symbol=$request->curr_symbol;
        //dd($curr);
        $curr->save();
        return redirect ('/usermgmt/currency');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        //
        $curr=Currency::find($request->ecurr_id);
        $curr->name=$request->ecurr_name;
        $curr->abbr=$request->ecurr_abbr;
        $curr->symbol=$request->ecurr_symbol;
        $curr->save();
        return redirect ('/usermgmt/currency');
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
    public function destroy(string $id)
    {
        //
    }
}
