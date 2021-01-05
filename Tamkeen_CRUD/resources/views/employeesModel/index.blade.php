@extends ("employeesModel.layout")
@section("title", "index of employees")
@section ("content")
<div class="container-xl">
    <div class="table-responsive" style="
  
    width: 120%;">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Manage <b>Employees</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{asset ('employeesModel/create')}}" class=" btn btn-success"><i
                                class="material-icons">&#xE147;</i>
                            <span>Add New Employees</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th width="1%">ID</th>
                        <th width="4%">First Name</th>
                        <th width="4%">Last Name</th>
                        <th width="4%">Phone</th>
                        <th width="4%">Email</th>
                        <th width="4%">Gender</th>
                        <th width="4%">Department</th>
                        <th width="4%">Manager</th>
                        <th width="4%">Employee Number</th>
                        <th width="40%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                    <tr>
                        <td width=" 1%">{{$employee -> id}}</td>
                        <td width=" 4%">{{$employee -> first_name}}</td>
                        <td width=" 4%">{{$employee -> last_name}}</td>
                        <td width="4%">{{$employee -> phone}}</td>
                        <td width="4%">{{$employee -> email}}</td>
                        <td width="4%">{{$employee -> gender=="m"?"Male": "Female"}}</td>
                        <td width="4%">{{$employee -> department->name??""}}</td>
                        <td width="4%">{{$employee -> department->management->manager??""}}</td>
                        <td width="4%">{{$employee -> employee_number}}</td>

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
            <!-- <div class="clearfix">
                    <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                    <ul class="pagination">
                        <li class="page-item disabled"><a href="#">Previous</a></li>
                        <li class="page-item"><a href="#" class="page-link">1</a></li>
                        <li class="page-item"><a href="#" class="page-link">2</a></li>
                        <li class="page-item active"><a href="#" class="page-link">3</a></li>
                        <li class="page-item"><a href="#" class="page-link">4</a></li>
                        <li class="page-item"><a href="#" class="page-link">5</a></li>
                        <li class="page-item"><a href="#" class="page-link">Next</a></li>
                    </ul>
                </div> -->
        </div>
    </div>
</div>
@endsection