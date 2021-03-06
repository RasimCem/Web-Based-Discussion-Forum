@extends('admin-panel.layout')
@section('content')
<main>
    <div class="container-fluid">
        <h2 class="mt-4">Categories</h2>
        <hr>
        <div class="card mb-4 mr-5">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Category Records
            </div>
            <div style="text-align: right" class="mt-2 mr-4">
                <a href="{{route('newCategory')}}"><button class="btn btn-success">Add New Category</button></a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Category #id</th>
                                <th>Name</th>
                                <th>Icon</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->name}}</td>
                                        <td><i class="{{$category->category_icon}} fa-2x"></i></td>
                                        <td><a href="{{route('editCategory',$category->id)}}"><button class="btn btn-success">Go</button></a></td>
                                        <td><a href="{{route('deleteCategory',$category->id)}}"><button class="btn btn-danger">Delete</button></a></td>
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
