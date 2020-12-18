@extends('user-panel.layout')
@section('content')
    {{-- CONTENT --}}
    <div class="newEntry">
    <h1 class="newEntry-title">Add New Entry</h1>
        <div class="newEntry-page">
        <form action="{{route('addEntry')}}" method="POST" class="clearfix">
            @csrf
                <div class="profile-detail">
                    <label >Title </label>
                     <input name="title" type="text">
                </div>
                <div class="profile-detail">
                    <label >Entry </label>
                     <textarea name="entry" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="profile-detail">
                    <label >Category </label>
                     <select  name="category" id="">
                            @foreach ($category as $cat)
                     <option value="{{$cat->id}}">{{$cat->name}}</option> 
                            @endforeach
                     </select>
                </div>
                <div class="profile-detail" style="width:32%; margin:45px auto;">
                    <input type="submit" value="Add New Entry" class="btn btn-success btn-block"/>
                </div>
            </form>
        </div>
    </div>

@endsection
  