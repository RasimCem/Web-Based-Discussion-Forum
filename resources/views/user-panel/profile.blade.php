@extends('user-panel.layout')
@section('content')
@section('title',"Profile Page")
    {{-- CONTENT --}}
    <div class="profile">
    <h1 class="profile-title">Profile</h1>
        <div class="profile-page">
            <form action="{{route('updateProfile')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <img  class="profile-img"
                @if ($user->image)
                    src="{{url("/storage/images/".$user->image)}}"
                @else
                     src="{{url('/images/user-logo.png')}}" 
                @endif
                alt="">
                <div class="profile-detail">
                    <label >User Mail </label>
                     <input name="mail" value="{{$user->email}}" type="mail">
                </div>
                <div class="profile-detail">
                    <label >User  Name </label>
                     <input name="name" value="{{$user->name}} " type="mail">
                </div>
                <div class="profile-detail">
                    <label >User SurName </label>
                     <input name="surname" value="{{$user->surname}}" type="mail">
                </div>
                <div class="profile-detail">
                    <label >Select Profile Picture </label>
                     <input name="pic" type="file">
                </div>
                <input type="hidden" value="{{$user->id}}" name="id">
                <input class="btn btn-success btn-lg" value="Save the Changes" type="submit">
            </form>
        </div>
    </div>
    <div class="profile">
        <h1 class="profile-title">My  Latest Entries</h1>
            <table class="table">
                <tr>
                    <th>Date</th>
                    <th>Title</th>
                    <th>My Entry</th>
                    <th> Operations </th>
                </tr>
                @foreach ($entries as $entry)
                    <tr>
                        <td>{{$entry->created_at}}</td> 
                        <td>{{Str::substr($entry->title,0,8)}}...</td>
                        <td> {{Str::substr($entry->entry,0,30)}}...</td>
                        <td>
                            <a class="text-info m-2" href="{{route('goToEntry',$entry->id)}}"><i style="font-size:20px;" class="fas fa-arrow-right"></i></a>
                            <a class="text-danger m-2" href="{{route('deleteMyEntry',$entry->id)}}"><i style="font-size:20px;" class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="profile-extra">
             <a id="pass">Change My Password</a>
        </div>

           {{-- MODAL --}}
      <div class="myModal"i>
        <span class="exit-modal">&times</span>
      <div class="modal-contents">
          <div class="signIn">
              <h2 style="text-align: center">Change Password</h2><hr>
              <form action="{{route('passUpdate')}}" method="POST">
                @csrf
                  <div class="modal-form-input">
                      <label > Current Pass.</label>
                       <input name="oldpass" id="focus" type="password">
                  </div>
                  <div class="modal-form-input">
                    <label > New Pass.</label>
                     <input name="newpass" id="focus" type="password">
                </div>
                <div class="modal-form-input">
                    <label > New Pass.</label>
                     <input  name="newpass2" id="focus" type="password">
                </div>
                      <input class="btn btn-success" value="Login" type="submit">
               </form>
          </div>
      </div>
    </div>

    <script>
          const modal = document.querySelector(".myModal");
          const pass = document.querySelector("#pass");
          const exit = document.querySelector(".exit-modal");
          pass.addEventListener("click", ()=>{
                 modal.style.display = "block";
                 modal.style.animation = "slow .2s ";
                 document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
          });
          exit.addEventListener("click",()=>{
                modal.style.display="none";
            });    
    </script>
@endsection
  