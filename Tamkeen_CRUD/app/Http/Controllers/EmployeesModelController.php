<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Employee;
use App\Models\Department;
use App\Http\Requests\EmployeeRequest;


class EmployeesModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $employees = Employee::get();
        return view ("employeesModel.index")->with("employees",$employees);
    }
        public function paging()
    {
        $employees = Employee::orderBy("id")->paginate(7);
        return view ("employeesModel.paging")->with("employees",$employees);
    }
    
    public function search(Request $request)
    {
        $q = '';
        if($request->q){
            $q = $request->q;
        }
        
        $employees = Employee::where("first_name","like","%$q%")
                ->orWhere("email","like","%$q%")
                ->get();
        return view("employeesModel.search")->with('employees',$employees);
    }
    
    public function searchPaging(Request $request)
    {
        $q = '';
        if($request->q){
            $q = $request->q;
        }
        
        $employees = Employee::where("first_name","like","%$q%")
                ->orWhere("email","like","%$q%")
                ->paginate(7)
                ->appends(["q"=>$q]);
                
        return view("employeesModel.searchPaging")->with('employees',$employees);
    }

    public function searchPagingAdvanced(Request $request)
    {
        $q = $request->q;
        $gender = $request->gender;
        $department = $request->department;
        
        $query = Employee::where('id','>',0);
        
        if($gender){
            $query->where('gender',$gender);
        }
        
        if($department){
            $query->where('department_id',$department);
        }
        
        if($q){

            $query->whereRaw('(first_name like ? or email like ? or phone like?)',["%$q%","%$q%","%$q%"]);
        }
        
        $employees = $query->paginate(10)
            ->appends([
                'q'     =>$q,
                'gender'=>$gender,
                'department'=>$department
                
            ]);

        $departments = Department::get();
        
        return view("employeesModel.searchPagingAdvanced",compact('employees','departments'));
    }


    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {
        $departments = Department::get();
        
        return view ("employeesModel.create")->with("departments",$departments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        // dd($request->all());
        $requestData = $request->all();
        
        if($request->image){
            $fileName = $request->image->store("public/images");
            $imageName = $request->image->hashName();
            $requestData['image'] = $imageName;
        }
        Employee :: create($requestData);
        
        Session::flash("msg","s: You have added new employee sucessfully");
        
        return redirect (route("employeesModel.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function show($id)
    {
        $employee= Employee:: find($id);
        
        if (!$employee){
            Session::flash("msg","Invalid Employee");
            return redirect (route("employeesModel.index"));
        }
       
        $departments = department::get();
        
        return view("employeesModel.show",compact('employee','departments'))->with("employee",$employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id)
    {
        $employee= Employee:: find($id);
      
        if (!$employee){
            Session::flash("msg","Invalid employee");
            return redirect (route("employeesModel.index"));
        }
        
        $departments = department::get();
        
        return view("employeesModel.edit",compact('employee','departments'))->with("employee",$employee);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(EmployeeRequest $request, $id)
    {
        $employee= Employee:: find($id);
        
        $requestData = $request->all();
        
        if($request->image){
            $fileName = $request->image->store("public/images");
            $imageName = $request->image->hashName();
            $requestData['image'] = $imageName;
        }
        
        $employee->update($requestData);
        
        Session::flash("msg","i: You have updated the employee sucessfully");
        
        return redirect (route("employeesModel.index"));
       
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id)
    {
        $employee= Employee:: find($id);
        
        $employee->delete();

        Session::flash("msg","s: You have deleted the employee sucessfully");

        return redirect (route("employeesModel.index"));
    }
}