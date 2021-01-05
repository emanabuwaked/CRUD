@extends ("users.layout")
@section("title", "Create")
@section ("content")

<form method="post" action=" {{route ('users.index')}} " style="
    width: 1000px;
    height: 500px;
    margin-top: 70px;
    margin-left: 280px;
">
    @csrf
    <div class=" form-group row">
        <label for="amen" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input type="text" value="name" class="form-control" id="n" name="name" placeholder="name">
        </div>
    </div>
    <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="email" value="email" class="form-control" id="email" name="email" placeholder="email">
        </div>
    </div>
    <div class="form-group row">
        <label for="phone" class="col-sm-2 col-form-label">Phone</label>
        <div class="col-sm-10">
            <input type="integer" value="phone" class="form-control" id="phone" name="phone" placeholder="phone">
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
                            <input {{old('gender')=='m'?"checked":""}} type="radio" value='m' name="gender" />
                            Male
                        </label>
                        <label>
                            <input {{old('gender')=='f'?"checked":""}} type="radio" value='f' name="gender" />
                            Female
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </fieldset>

    <div class="form-group row">
        <div class="col-sm-10">
            <button type="" class="btn btn-primary">Create</button>
            <a class='btn btn-primary' href='{{route("users.index")}}'>Cancel</a>
        </div>
    </div>
</form>
@endsection