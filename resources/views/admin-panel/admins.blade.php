@extends('admin-panel.layout')
@section('content')
<main>
    <div class="container-fluid">
        <h2 class="mt-4">Admins</h2>
        <hr>
        <div class="card mb-4 mr-5">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Admin Records
            </div>
            <div style="text-align: right" class="mt-2 mr-4">
                <a href="{{route('newAdmin')}}"><button class="btn btn-success">Add New Admin</button></a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Profile Image</th>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Mail</th>
                                <th>Joined At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                    <tr>
                                        <td><img width="70" height="70"
                                            @if ($user->image)
                                                src="{{url("/storage/images/".$user->image)}}"
                                            @else 
                                                src="{{url("/images/user-logo.png")}}"
                                            @endif
                                            alt="">
                                        </td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->surname}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->created_at}}</td>
                                    </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
    @endsection
