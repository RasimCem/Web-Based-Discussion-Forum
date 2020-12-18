@extends('admin-panel.layout')
@section('content')
<main>
    <div class="container-fluid">
        <h2 class="mt-4">Admin Page</h2>
        <hr>
        <div class="row">
            <div class="col-xl-10">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-area mr-1"></i>
                        Add New Admin
                    </div>
                    <div class="card-body">
                        <form action="{{route('addNewCategory')}}" method="POST">
                            @csrf
                            <div class="form-group row">
                              <label for="inputPassword" class="col-sm-2 col-form-label">Category Name</label>
                              <div class="col-sm-10">
                                <input name="name" type="text" class="form-control" id="inputPassword" placeholder="Category Name">
                              </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label"> Icon  Class Name</label>
                                <div class="col-sm-10">
                                  <input name="icon" type="text" class="form-control" id="inputPassword" placeholder="Category Icon Class Name">
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
