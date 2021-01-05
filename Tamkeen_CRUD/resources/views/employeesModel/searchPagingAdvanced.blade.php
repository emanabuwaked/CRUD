@extends ("employeesModel.layout")
@section("title", "search-paging-employees")
@section ("content")

<div class="container-xl">
    <div class="table-responsive" style="
    width: 120%;">
        <div class="table-wrapper">
            <div class="table">
                <div class="row">
                    <div class="col-sm-20">
                        <h2>Manage Employees </h2>
                    </div>

                </div>
            </div>
            @if($employees->count()>0)
            <form class='row mb-3'>
                <div class='col-sm-4'>
                    <input name='q' value='{{request()->q}}' autofocus type="text" class='form-control'
                        placeholder="Enter your search ..." />
                </div>
                <div class='col-sm-2'>
                    <select name='gender' class='form-control'>
                        <option value=''>Any Gender</option>
                        <option {{ request()->gender=='M'?"selected":"" }} value='M'>Male</option>
                        <option {{ request()->gender=='F'?"selected":"" }} value='F'>Female</option>
                    </select>
                </div>
                <div class='col-sm-2'>
                    <select name='department' class='form-control'>
                        <option value=''>Department</option>
                        @foreach($departments as $row)
                        <option value='{{$row->id}}' {{request()->row==$row->id?"selected":""}}>
                            {{$row->name}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class='col-sm-1'>
                    <input type="submit" class='btn btn-primary' value='Search' />
                </div>
                <div class="col-sm-3">
                    <a href="{{asset ('employeesModel/create')}}" class=" btn btn-success">
                        <span>Add New Employees</span></a>
                </div>
            </form>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Department</th>
                        <th>Manager</th>
                        <th>Employee Number</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                    <tr>
                        <td>{{$employee -> id}}</td>
                        <td>{{$employee -> first_name}}</td>
                        <td>{{$employee -> last_name}}</td>
                        <td>{{$employee -> phone}}</td>
                        <td>{{$employee -> email}}</td>
                        <td>{{$employee -> gender=="m"?"Male": "Female"}}</td>
                        <td>{{$employee -> department->name??""}}</td>
                        <td>{{$employee -> department->management->manager??""}}</td>
                        <td>{{$employee -> employee_number}}</td>
                        <td>
                            <img style='max-width:50px' src="{{asset('storage/images/'.$employee->image)}}" />
                        </td>

                        <td width="40%">
                            <!-- <form method="post" action=" {{asset ('employees/'.$employee->id)}} ">
                                @csrf
                                @method("delete")
                                <input type='submit' onclick='return confirm("Are you sure?")' value='Delete'
                                    class='btn btn-danger ' />
                                <a href=" {{route ('employees.show',$employee->id)}} " class="btn btn-info">Show</a>
                                <a href=" {{route ('employees.edit',$employee->id)}} " class="btn btn-info">Edit</a>
                                <a href=" {{route ('employees.delete',$employee->id)}}" class="btn btn-info"
                                    onclick='return confirm("Do you want to delete the employee?")'>Delete</a>
                            </form> -->
                            <a href=" {{route ('employeesModel.show',$employee->id)}} " class="btn btn-info">Show</a>
                            <a href=" {{route ('employeesModel.edit',$employee->id)}} " class="btn btn-info">Edit</a>
                            <a href=" {{route ('employeesModel.delete',$employee->id)}}" class="btn btn-danger"
                                onclick='return confirm("Do you want to delete the employee?")'>Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
<div style="
    width: 65%;">
    {{$employees->links()}}
</div>
@else
<div class='alert alert-info'><b>Sorry!</b> there is no results to your search</div>
@endif
@endsection