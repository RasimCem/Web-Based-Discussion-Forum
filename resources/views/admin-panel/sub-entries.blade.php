@extends('admin-panel.layout')
@section('content')
<main>
    <div class="container-fluid">
        <h2 class="mt-4">Sub Entries(Comments)</h2>
        <hr>
        <div class="card mb-4 mr-5">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Sub Entry Records
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @if (!empty($subEntries[0]))
                        <h3>{{$subEntries[0]->getEntry['title']}}</h3>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Sub Entry (Comment)</th>
                                    <th>Created By</th>
                                    <th>Created At</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subEntries as $entry)
                                        <tr>
                                            <td>{{$entry->entry}}</td>
                                            <td>{{$entry->getUser['email']}}</td>
                                           <td>{{$entry->created_at}}</td>
                                            <td><a href="{{route('deleteSubEntry',$entry->id)}}"><button class="btn btn-danger">Delete</button></a></td>
                                        </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <h3 class="text-danger">There is not any Sub Entry !</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
</main>
    @endsection
