@extends ("employeesModel.layout")
@section("title", "show employees")
@section ("content")

<div style="
    width: 1000px;
    height: 500px;
    margin-top: 70px;
    margin-left: 280px;">
    <div class=" form-group row">
        <label for="first_name" class="col-sm-2 col-form-label">First Name</label>
        <div class="col-sm-10">
            <input readonly type="text" autofocus="true" value="{{$employee->first_name}}" class="form-control"
                id="first_name" name="first_name" placeholder="first_name">
        </div>
    </div>
    <div class=" form-group row">
        <label for="last_name" class="col-sm-2 col-form-label">Last Name</label>
        <div class="col-sm-10">
            <input readonly type="text" autofocus="true" value="{{$employee->last_name}}" class="form-control"
                id="last_name" name="last_name" placeholder="last_name">
        </div>
    </div>
    <div class="form-group row">
        <label for="phone" class="col-sm-2 col-form-label">Phone</label>
        <div class="col-sm-10">
            <input readonly type="integer" value="{{$employee->phone}}" class="form-control" id="phone" name="phone"
                placeholder="phone">
        </div>
    </div>
    <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input readonly type="email" value="{{$employee->email}}" class="form-control" id="email" name="email"
                placeholder="email">
        </div>
    </div>
    <div class="form-group row">
        <label for="employee_number" class="col-sm-2 col-form-label">Employee Number</label>
        <div class="col-sm-10">
            <input readonly type="integer" class="form-control" id="employee_number" name="employee_number"
                value="{{$employee->employee_number}}" placeholder="employee_number">
        </div>
    </div>
    <div class="form-group row">
        <label for="department" class="col-sm-2 col-form-label">Department</label>
        <div class="col-sm-10">
            <input readonly type="text" value='{{ $employee->department->name??"" }}' class="form-control"
                placeholder="department Name">
        </div>
    </div>
    <div class="form-group row">
        <label for="manager" class="col-sm-2 col-form-label">Manager</label>
        <div class="col-sm-10">
            <input readonly type="text" value='{{ $employee -> department->management->manager??"" }}'
                class="form-control" placeholder="manager Name">
        </div>
    </div>
    <fieldset class="form-group">
        <div class="form-group row">
            <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
            <div class="col-sm-10">
                <div class="form-group row">
                    <div class="col-md-6 mb-3">
                        <label>
                            <input disabled {{$employee->gender=="m"?"checked":""}} type="radio" value="m"
                                name="gender" />
                            Male
                        </label>
                        <label>
                            <input disabled {{$employee->gender=="f"?"checked":""}} type="radio" value="f"
                                name=" gender" />
                            Female
                        </label>
                    </div>
                </div>

            </div>
        </div>
    </fieldset>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="image">Image</label>
            @if($employee->image)
            <hr>
            <img style='max-width:200px' src='{{asset("storage/images/$employee->image")}}' />
            @else
            <span>There is no image</span>
            @endif
        </div>
    </div>
    <div class="col-sm-10">
        <!-- <button type="" class="btn btn-primary">Create</button> -->
        <a class='btn btn-primary' href='{{route("employeesModel.index")}}'>Cancel</a>
    </div>
</div>
@endsection