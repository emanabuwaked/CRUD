@extends ("users.layout")
@section("title", "index")
@section ("content")
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Manage <b>Users</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{asset ('users/create')}}" class=" btn btn-success"><i
                                class="material-icons">&#xE147;</i>
                            <span>Add New User</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th width="20%">Name</th>
                        <th width="20%">Email</th>
                        <th width="20%">Phone</th>
                        <th width="15%">Gender</th>
                        <th width="40%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td width=" 20%">Thomas Hardy</td>
                        <td width="20%">thomashardy@mail.com</td>
                        <td width="20%">(171) 555-2222</td>
                        <td width="15%">female</td>

                        <td width="40%">

                            <form method=" post" action=" {{asset ('users/$id')}} ">
                                @csrf
                                @method("delete")



                                <!-- <a href="{{asset ('users/$id')}}"><i type='submit' onclick='return confirm("Are you sure?")' class="Tiny material-icons">delete</i></a> -->
                                <input type='submit' onclick='return confirm("Are you sure?")' value='Delete'
                                    class='btn btn-info ' />
                                <a href=" {{route ('users.show',10)}} " class="btn btn-info">Show</a>
                                <a href=" {{route ('users.edit',10)}} " class="btn btn-info">Edit</a>

                            </form>


                        </td>
                    </tr>

                </tbody>

                <tbody>
                    <tr>
                        <td width=" 20%">Thomas Hardy</td>
                        <td width="20%">thomashardy@mail.com</td>
                        <td width="20%">(171) 555-2222</td>
                        <td width="15%">female</td>

                        <td width="40%">

                            <form method=" post" action=" {{asset ('users/$id')}} ">
                                @csrf
                                @method("delete")



                                <!-- <a href="{{asset ('users/$id')}}"><i type='submit' onclick='return confirm("Are you sure?")' class="Tiny material-icons">delete</i></a> -->
                                <input type='submit' onclick='return confirm("Are you sure?")' value='Delete'
                                    class='btn btn-info ' />
                                <a href=" {{route ('users.show',10)}} " class="btn btn-info">Show</a>
                                <a href=" {{route ('users.edit',10)}} " class="btn btn-info">Edit</a>

                            </form>


                        </td>
                    </tr>

                </tbody>
                <tbody>
                    <tr>
                        <td width=" 20%">Thomas Hardy</td>
                        <td width="20%">thomashardy@mail.com</td>
                        <td width="20%">(171) 555-2222</td>
                        <td width="15%">female</td>

                        <td width="40%">

                            <form method=" post" action=" {{asset ('users/$id')}} ">
                                @csrf
                                @method("delete")



                                <!-- <a href="{{asset ('users/$id')}}"><i type='submit' onclick='return confirm("Are you sure?")' class="Tiny material-icons">delete</i></a> -->
                                <input type='submit' onclick='return confirm("Are you sure?")' value='Delete'
                                    class='btn btn-info ' />
                                <a href=" {{route ('users.show',10)}} " class="btn btn-info">Show</a>
                                <a href=" {{route ('users.edit',10)}} " class="btn btn-info">Edit</a>

                            </form>


                        </td>
                    </tr>

                </tbody>
                <tbody>
                    <tr>
                        <td width=" 20%">Thomas Hardy</td>
                        <td width="20%">thomashardy@mail.com</td>
                        <td width="20%">(171) 555-2222</td>
                        <td width="15%">female</td>

                        <td width="40%">

                            <form method=" post" action=" {{asset ('users/$id')}} ">
                                @csrf
                                @method("delete")



                                <!-- <a href="{{asset ('users/$id')}}"><i type='submit' onclick='return confirm("Are you sure?")' class="Tiny material-icons">delete</i></a> -->
                                <input type='submit' onclick='return confirm("Are you sure?")' value='Delete'
                                    class='btn btn-info ' />
                                <a href=" {{route ('users.show',10)}} " class="btn btn-info">Show</a>
                                <a href=" {{route ('users.edit',10)}} " class="btn btn-info">Edit</a>

                            </form>


                        </td>
                    </tr>

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