@extends('admin-panel.layout')
@section('content')
<main>
    <div class="container-fluid">
        <h2 class="mt-4">Category Page</h2>
        <hr>
        <div class="row">
            <div class="col-xl-10">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-area mr-1"></i>
                        Edit Category
                    </div>
                    <div class="card-body">
                        <form action="{{route('updateCategory',$category->id)}}" method="POST">
                          @method('PUT')
                            @csrf
                            <div class="form-group row">
                              <label for="inputPassword" class="col-sm-2 col-form-label"> Current Icon </label>
                              <div class="col-sm-10">
                                <i   class="{{$category->category_icon}} fa-2x"></i>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputPassword" class="col-sm-2 col-form-label">Category Name</label>
                              <div class="col-sm-10">
                                <input name="name" type="text" class="form-control" id="inputPassword" value="{{$category->name}}">
                              </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label"> Icon  Class Name</label>
                                <div class="col-sm-10">
                                  <input name="icon" type="text" class="form-control" id="inputPassword" value="{{$category->category_icon}}">
                                </div>
                              </div>
                              <div style="text-align: right">
                                <button class="btn btn-success">Confirm</button>
                              </div>                              
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
    @endsection
