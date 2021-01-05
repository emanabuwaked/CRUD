@extends ("contact.layout")
@section("title", "Show")
@section ("content")

<div>

    <div class=" form-group row">
        <label for="name" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input type="text" readonly value="{{$user->name}}" class="form-control" id="name" name="name"
                placeholder="name">
        </div>
    </div>
    <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="email" readonly value="{{$user->email}}" class="form-control" id="email" name="email"
                placeholder="email">
        </div>
    </div>
    <div class="form-group row">
        <label for="phone" class="col-sm-2 col-form-label">Phone</label>
        <div class="col-sm-10">
            <input type="integer" readonly value="{{$user->phone}}" class="form-control" id="phone" name="phone"
                placeholder="phone">
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
                            <input type="radio" readonly value="{{$user->gendar}}" name="gendar" />
                            Male
                        </label>
                        <label>
                            <input type="radio" readonly value="{{$user->gendar}}" name="gendar" />
                            Female
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </fieldset>


    <div class="col-sm-10">

        <a class='btn btn-primary' href='{{route("contact.index")}}'>Cancel</a>
    </div>

</div>
@endsection