<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees =DB::table("employees")->get();
        // dd($employees);
        return view ("employees.index")->with("employees",$employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ("employees.create");
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
            'first_name' =>'required |max:50',
            'last_name' =>'required |max:50',
            'phone' =>'required |max:50',
            'email' =>'required |max:50', 
            'gender' =>'required |max:1', 
            'employee_number' =>'required |max:50',           
        ]);
        //to store in database
        DB :: table ("employees")->insert([
            'first_name'=>$request ['first_name'],
            'last_name'=>$request ['last_name'],
            'phone'=>$request ['phone'],
            'email'=>$request ['email'],
            'gender'=>$request ['gender'],     
            'employee_number'=>$request ['employee_number'],     
        ]);
        //successfull msg
        Session::flash("msg","You have added new employee sucessfully");
        //to show the table
        return redirect (route("employees.index"));
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
        $employee =DB::table ("employees")->find($id);
        if (!$employee){
            Session::flash("msg","Invalid Employee");
            return redirect (route("employees.index"));
        }
        return view("employees.show")->with("employee",$employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee =DB::table ("employees")->find($id);
        if (!$employee){
            Session::flash("msg","Invalid employee");
            return redirect (route("employees.index"));
        }
        return view("employees.edit")->with("employee",$employee);
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
            'first_name' =>'required |max:50',
            'last_name' =>'required |max:50',
            'phone' =>'required |max:50',
            'email' =>'required |max:50', 
            'gender' =>'required |max:1', 
            'employee_number' =>'required |max:50',           
        ]);
        //to store in database
        DB :: table ("employees")->where("id",$id)->update([
            'first_name'=>$request ['first_name'],
            'last_name'=>$request ['last_name'],
            'phone'=>$request ['phone'],
            'email'=>$request ['email'],
            'gender'=>$request ['gender'],     
            'employee_number'=>$request ['employee_number'],     
        ]);
        //successfull msg
        Session::flash("msg","You have updated the employee sucessfully");
        //to show the table
        return redirect (route("employees.index"));
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
         DB :: table ("employees")->where("id",$id)->delete();
         //successfull msg
        Session::flash("msg","You have deleted the employee sucessfully");
        //to show the table
        return redirect (route("employees.index"));
    }
}