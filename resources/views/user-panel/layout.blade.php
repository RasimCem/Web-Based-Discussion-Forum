<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
    <link rel="stylesheet" href="../css/app.css">
    <link rel="stylesheet" href="/custom/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">
        <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link href="/css/app.css" rel="stylesheet"/>
    </head>
    <body>
        <div class="navbar">
            <div class="items">
            <a href="{{route('home')}}" class="item">Home </a>
                <div class="dropdown">
                    <a href="javascript:void(0)"  class="item">Categories <i class="fas fa-arrow-down"></i></a>
                    <div class="dropdowncontent" >
                        <ul>
                            <li style="text-align: center">
                                <i class="fas fa-arrow-down " style="color:#fff"></i>
                            </li>
                            @foreach ($allcategories as $item)
                                <li class="dropdownitem">
                                    <a href="{{route('goToCategory',$item['id'])}}">{{$item['name']}} <i class="{{$item['category_icon']}}"></i></a> 
                                </li>
                            @endforeach
                        </ul>                 
                    </div>
                </div>
                <div class="right">   
                    @if (Auth::user())
                <a href="{{route('showProfile')}}" class="item ">{{Str::limit(auth()->user()->name,1,".").Str::limit(auth()->user()->surname,6,'.')}}  <img class="user-img"
                    @if (Auth::user()->image)
                        src="{{url('/storage/images/'.Auth::user()->image)}}" 
                    @else 
                       src="{{url('/images/user-logo.png')}}"
                    @endif                      
                     alt=""></a>
                    <a href="{{route('newEntry')}}" class="item"><i class="fas fa-plus"></i></a> 
                    <a href="{{route('logout')}}" class="item"><i class="fas fa-sign-out-alt"></i></a> 
                    @else
                    <a href="#" id="signIn" class="item ">Sign In</a>
                    @endif
                    <a href="javascript:void(0)" class="item toggle"> <i class="fas fa-bars"></i>  </a>
                </div>
            </div>
        </div>
@yield('content')
      {{-- FOOTER --}}
        <div class="footer">
            <div class="footer-content">
                <div class="social">
                        <h3>Social Media Accounts</h3>
                       <a class="social-item" href="#"><i class="fab fa-facebook-f"></i></a>
                       <a class="social-item" href="#"><i class="fab fa-twitter"></i></a>
                       <a class="social-item" href="#"><i class="fab fa-youtube"></i></a>
                       <a class="social-item" href="#"><i class="fab fa-instagram"></i></a>
                 </div>
                <div class="footer-items">
                   <a href="">FAQ</a>
                   <a href="">Support</a>
                   <a href="">Contact</a>
                </div>
          </div>    
      </div>
      {{-- MODAL --}}
      <div class="myModal"i>
          <span class="exit-modal">&times</span>
        <div class="modal-selection">
            <button id="btnSignIn" class="btn btn-outline-success btn-lg" style="background-color: #2FA360;color:#fff">Sign In</button>
            <button id="btnSignUp" class="btn btn-outline-success btn-lg">Sign Up</button>
        </div><hr>
        <div class="modal-contents">
            <div class="signIn">
                <h2 style="text-align: center">Say Hi To The New World!</h2>
            <form action="{{route('login')}}" method="POST">
                @csrf
                    <div class="modal-form-input">
                        <label > Mail</label>
                         <input name="email" type="mail">
                    </div>
                    <div class="modal-form-input">
                        <label > Password </label>
                         <input name="password" type="password">
                    </div>
                        <input class="btn btn-success" value="Login" type="submit">
                 </form>
            </div>
            <div class="signUp" >
                <h2 style="text-align: center">Say Hi To The New World!</h2>
            <form action="{{route('signUp')}}" method="POST">
                @csrf
                    <div class="modal-form-input">
                        <label > Name</label>
                         <input name="name" type="text">
                    </div>
                    <div class="modal-form-input">
                        <label > Surname</label>
                         <input name="surname" type="text">
                    </div>
                    <div class="modal-form-input">
                        <label > Mail </label>
                         <input name="mail" type="mail">
                    </div>
                    <div class="modal-form-input">
                        <label > Password </label>
                         <input name="password" type="password">
                    </div>
                    <div class="modal-form-input">
                        <label > Password </label>
                         <input name="password2" type="password">
                    </div>
                    <input class="btn btn-success" value="Sign Up" type="submit">
                 </form>
            </div>
        </div>
      </div>
       {{-- Notifications and Errors --}}
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                       <script>
                            alertify.notify('{{$error}}', 'error'); 
                       </script>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session()->has('success'))
            <script>
                alertify.notify('{{session()->get('success')}}','success')
            </script>
        @endif
        @if (session()->has('error'))
        <script>
            alertify.notify('{{session()->get('error')}}','error')
        </script>
    @endif
        <script>
            // TOGGLE JS
            const toggle = document.querySelector(".toggle");
            const column = document.querySelector(".items");
            const item = document.querySelectorAll(".item");
            const right = document.querySelector(".right");
            toggle.addEventListener("click",() => {
                if(column.style.flexDirection=="column"){
                        item.forEach( i => {
                        i.style.display="none";
                    });
                    toggle.style.display="block";
                    column.style.flexDirection="row";
                    right.classList.add("right");
                }else{
                    item.forEach( i => {
                       i.style.display="block";
                   });
                   column.style.flexDirection="column";
                   right.classList.remove("right");
                }
            })
        </script>

        <script>
            // MODAL JS
            const signIn = document.getElementById("signIn");
            const modal = document.querySelector(".myModal");
            const exit = document.querySelector(".exit-modal");
            const signUpDiv = document.querySelector(".signUp");
            const signInDiv = document.querySelector(".signIn");
            const btnSignIn = document.querySelector("#btnSignIn");
            const btnSignUp = document.querySelector("#btnSignUp");
            signIn.addEventListener("click",()=>{
                 modal.style.display = "block";
                 modal.style.animation = "slow .2s ";
            });
            exit.addEventListener("click",()=>{
                modal.style.display="none";
            });    
            btnSignIn.addEventListener("click",()=>{
                signUpDiv.style.display="none";
                signInDiv.style.display="block";
                btnSignUp.style.backgroundColor = "#fff";
                btnSignUp.style.color = "green";
                btnSignIn.style.backgroundColor = "#2FA360";
                btnSignIn.style.color = "#fff";
            });
            btnSignUp.addEventListener("click",()=>{
                signInDiv.style.display = "none";
                signUpDiv.style.display = "block";
                btnSignIn.style.backgroundColor = "#fff";
                btnSignIn.style.color = "green";
                btnSignUp.style.backgroundColor = "#2FA360";
                btnSignUp.style.color = "#fff";
            });
        </script>
    </body>
</html>
