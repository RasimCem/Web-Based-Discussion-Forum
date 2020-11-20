@extends('layout')
@section('content')
    {{-- CONTENT --}}
    <div class="profile">
    <h1 class="profile-title">Profile</h1>
        <div class="profile-page">
                <img  class="profile-img" src="{{url('/images/user-logo.png')}}" alt="">
                <div class="profile-detail">
                    <label >User Mail </label>
                     <input type="mail">
                </div>
                <div class="profile-detail">
                    <label >User Full Name </label>
                     <input type="mail">
                </div>
        </div>
    </div>
    <div class="profile">
        <h1 class="profile-title">My  Latest Entries</h1>
            <table class="table">
                <tr>
                    <th>Date</th>
                    <th>Title</th>
                    <th>My Entry</th>
                    <th>View </th>
                </tr>
                <tr>
                    <td>12.03.2020</td>
                    <td>Basbakanin Bakani</td>
                    <td>Bakanin bakani olmaz!</td>
                    <td>
                        <input class="btn btn-info" type="submit" value=" Go To Entry">
                    </td>
                </tr>
                <tr>
                    <td>12.03.2020</td>
                    <td>Basbakanin Bakani</td>
                    <td>Bakanin bakani olmaz!</td>
                    <td>
                        <input class="btn btn-info" type="submit" value="Go To Entry">
                    </td>
                </tr>
                <tr>
                    <td>12.03.2020</td>
                    <td>Basbakanin Bakani</td>
                    <td>Bakanin bakani olmaz!</td>
                    <td>
                        <input class="btn btn-info" type="submit" value="Go To Entry">
                    </td>
                </tr>
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
              <form action="" method="POST">
                  <div class="modal-form-input">
                      <label > Current Pass.</label>
                       <input id="focus" type="password">
                  </div>
                  <div class="modal-form-input">
                    <label > New Pass.</label>
                     <input id="focus" type="password">
                </div>
                <div class="modal-form-input">
                    <label > New Pass.</label>
                     <input id="focus" type="password">
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
  