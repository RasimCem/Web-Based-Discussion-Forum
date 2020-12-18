@extends('admin-panel.layout')
@section('content')
<main>
    <div class="container-fluid">
        <h2 class="mt-4">Entries(Topics)</h2>
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
                                <th>Title-Topic</th>
                                <th>Entry</th>
                                <th>Created By</th>
                                <th>Created At</th>
                                <th>Go To Sub Entries</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($entries as $entry)
                                    <tr>
                                        <td>{{$entry->title}}</td>
                                        <td>{{$entry->entry}}</td>
                                        <td>{{$entry->getUser['email']}}</td>
                                       <td>{{$entry->created_at}}</td>
                                        <td><a href="{{route('goToSubEntry',$entry->id)}}"><button class="btn btn-success">Go To Comments</button></a></td>
                                        <td><a href="{{route('deleteEntry',$entry->id)}}"><button class="btn btn-danger">Delete</button></a></td>
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
