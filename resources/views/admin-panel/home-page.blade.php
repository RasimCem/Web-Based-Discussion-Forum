@extends('admin-panel.layout')
@section('content')
<main>
    <div class="container-fluid">
        <h2 class="mt-4">Home Page</h2>
        <hr>
        <div class="row">
            <div class="col-xl-10">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-area mr-1"></i>
                        ISTATISTICS
                    </div>
                    <div class="card-body">
                        <h2>Total Number Of Users: <span class="text-info">{{$countUser}}</span></h2><hr>
                        <h2>Total Number Of Entries: <span class="text-info">{{$countEntry}}</span></h2><hr>
                        <h2>Total Number Of Sub Entries: <span class="text-info">{{$countSubEntry}}</span></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
    @endsection
