<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users =\DB::table("users")->get();
        // dd($users);
        return view ("contact.index")->with("users",$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view ("contact.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //to fill the inputs
        $request-> validate([
            'name' =>'required |max:50',
            'email' =>'required |max:50',
            'phone' =>'required |max:50',
            'gendar' =>'required |max:50',            
        ]);
        //to store in database
        \DB :: table ("users")->insert([
            'name'=>$request ['name'],
            'email'=>$request ['email'],
            'phone'=>$request ['phone'],
            'gendar'=>$request ['gendar'],         
        ]);
        //successfull msg
        \Session::flash("msg","s: You have added new user sucessfully");
        //to show the table
        return redirect (route("contact.index"));
        // dd ($request-> all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //find just use primary key
        //return only one item or null
        $user =\DB::table ("users")->find($id);
        if (!$user){
            \Session::flash("msg","e:Invalid User");
            return redirect (route("contact.index"));
        }
        return view("contact.show")->with("user",$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user =\DB::table ("users")->find($id);
        if (!$user){
            \Session::flash("msg","e:Invalid User");
            return redirect (route("contact.index"));
        }
        return view("contact.edit")->with("user",$user);
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
        //to fill the inputs
        $request-> validate([
            'name' =>'required |max:50',
            'email' =>'required |max:50',
            'phone' =>'required |max:50',
            'gendar' =>'required |max:50',            
        ]);
        //to update in database
        \DB :: table ("users")->where("id",$id)->update([
            'name'=>$request ['name'],
            'email'=>$request ['email'],
            'phone'=>$request ['phone'],
            'gendar'=>$request ['gendar'],         
        ]);
        //successfull msg
        \Session::flash("msg","i: You have update the user sucessfully");
        //to show the table
        return redirect (route("contact.index"));
        // dd ($request-> all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete user
        \DB :: table ("users")->where("id",$id)->delete();
        //successfull msg
        \Session::flash("msg","w:You have delete the user sucessfully");
        //to show the table
        return redirect (route("contact.index"));
        // dd ($request-> all());
        
    }
}