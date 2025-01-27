@extends ("employeesModel.layout")
@section("title", "Edit employees")
@section ("content")

<form method="post" action=" {{asset ('employeesModel/'.$employee->id)}}" style="
    width: 1000px;
    height: 500px;
    margin-top: 70px;
    margin-left: 280px;">

    @csrf
    @method("put")

    <div class=" form-group row">
        <label for="first_name" class="col-sm-2 col-form-label">First Name</label>
        <div class="col-sm-10">
            <input type="text" autofocus="true" value="{{old ('first_name',$employee->first_name)}}"
                class="form-control" id="first_name" name="first_name" placeholder="first_name">
        </div>
    </div>
    <div class=" form-group row">
        <label for="last_name" class="col-sm-2 col-form-label">Last Name</label>
        <div class="col-sm-10">
            <input type="text" autofocus="true" value="{{old ('last_name',$employee->last_name)}}" class="form-control"
                id="last_name" name="last_name" placeholder="last_name">
        </div>
    </div>

    <div class="form-group row">
        <label for="phone" class="col-sm-2 col-form-label">Phone</label>
        <div class="col-sm-10">
            <input type="integer" value="{{old ('phone',$employee->phone)}}" class="form-control" id="phone"
                name="phone" placeholder="phone">
        </div>
    </div>
    <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="email" value="{{old ('email',$employee->email)}}" class="form-control" id="email" name="email"
                placeholder="email">
        </div>
    </div>

    <fieldset class="form-group">
        <div class="row">
            <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
            <div class="col-sm-10">
                <!-- <div class="form-check">
                    <input class="form-check-input" type="radio" name="female" id="female" value="option1" checked>
                    <label class="form-check-label" for="female">
                        Female
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="male" id="male" value="option2">
                    <label class="form-check-label" for="male">
                        Male
                    </label>
                </div> -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>
                            <input {{$employee->gender=="m"?"checked":""}} type="radio" value="m" name="gender" />
                            Male
                        </label>
                        <label>
                            <input {{$employee->gender=="f"?"checked":""}} type="radio" value="f" name=" gender" />
                            Female
                        </label>
                    </div>
                </div>

            </div>
        </div>
    </fieldset>
    <div class="form-group row">
        <label for="employee_number" class="col-sm-2 col-form-label">Employee Number</label>
        <div class="col-sm-10">
            <input type="integer" class="form-control" id="employee_number" name="employee_number"
                value="{{old ('employee_number',$employee->employee_number)}}" placeholder="employee_number">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="department_id">Department</label>
            <select class="Row-control" name="department_id" id="department_id">
                <option value="">Select Department</option>
                @foreach($departments as $department)
                <!-- <option
                    {{old('$department_id',$employee->department_id)==$department->id?'selected':''}}value="{{$department->id}}">
                    {{$department->name}}
                </option> -->
                <option {{old('department_id',$employee->department_id)==$department->id?'selected':''}}
                    value='{{$department->id}}'>
                    {{$department->name}}
                </option>
                @endforeach
            </select>

        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="image">Image</label>
            <input type='file' class="form-control" name="image" id="image" />
            @if($employee->image)
            <hr>
            <img style='max-width:200px' src='{{asset("storage/images/$employee->image")}}' />
            @endif
        </div>
    </div>

    <div class="col-sm-10">
        <button type="" class="btn btn-primary">Update</button>
        <a class='btn btn-primary' href='{{route("employeesModel.index")}}'>Cancel</a>
    </div>

</form>
@endsection