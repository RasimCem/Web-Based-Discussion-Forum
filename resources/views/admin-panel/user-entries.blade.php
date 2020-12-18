@extends('admin-panel.layout')
@section('content')
<main>
    <div class="container-fluid">
        <h3 class="mt-4">{{$user->name}} {{$user->surname}}' Entries(Topics)</h3>
        <hr>
        <div class="card mb-4 mr-5">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Entry Records
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#Id</th>
                                <th>Title-Topic</th>
                                <th>Entry</th>
                                <th>Created At</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($entries as $entry)
                                    <tr>
                                        <td>{{$entry->id}}</td>
                                        <td>{{$entry->title}}</td>
                                        <td>{{$entry->entry}}</td>
                                       <td>{{$entry->created_at}}</td>
                                        <td><a href="{{route('deleteEntry',$entry->id)}}"><button class="btn btn-danger">Delete</button></a></td>
                                    </tr>
                            @endforeach
                        </tbody> 
                    </table>
                </div>
            </div>
        </div>
    </div>
        <div class="container-fluid">
            <h3 class="mt-4">{{$user->name}} {{$user->surname}}' Subentries(Comments)</h3>
            <hr>
            <div class="card mb-4 mr-5">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Entry Records
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#Id</th>
                                    <th>Title-Topic(Comment To)</th>
                                    <th>Comment</th>
                                    <th>Created At</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subEntries as $subEntry)
                                        <tr>
                                            <td>{{$subEntry->id}}</td>
                                            <td>{{$subEntry->getEntry['title']}}</td>
                                            <td>{{$subEntry->entry}}</td>
                                            <td>{{$subEntry->created_at}}</td>
                                            <td><a href="{{route('deleteSubEntry',$subEntry->id)}}"><button class="btn btn-danger">Delete</button></a></td>
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
