<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
    <link rel="stylesheet" href="../css/app.css">
    <link rel="stylesheet" href="/custom/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="navbar">
            <div class="items">
                <a href="" class="item">Home</a>
                <div class="dropdown">
                    <a href="javascript:void(0)"  class="item">Categories <i class="fas fa-arrow-down"></i></a>
                    <div class="dropdowncontent" >
                        <ul>
                            <li style="text-align: center">
                                <i class="fas fa-arrow-down " style="color:#fff"></i>
                            </li>
                            <li class="dropdownitem">
                                <a href="">New <i class="fab fa-hotjar dropicon"></i></a> 
                            </li>
                            <li class="dropdownitem">
                                <a href="">Sport <i class="fas fa-baseball-ball dropicon"></i></a>
                            </li>
                            <li class="dropdownitem">
                               <a href="">Hardware</a>
                            </li>
                            <li class="dropdownitem">
                                <a href="">Software</a>
                             </li>
                        </ul>                 
                    </div>
                </div>
                    <a href="" class="item right">Profile  <img class="user-img" src="{{url('/images/user-logo.png')}}" alt=""></a>
                    <a href="javascript:void(0)" class="item toggle"> <i class="fas fa-bars"></i>  </a>
            </div>
        </div>
        {{-- CONTENT --}}
        <div class="content">
            <div class="side-bar">
                <h2>Popular <i class="fab fa-hotjar dropicon"></i></h2>
                 <div class="titles">
                    <div class="title">
                        <a href=""> Entry Title <span class="entry-number">12</span></a>
                    </div>
                    <div class="title">
                        <a href=""> Entry Title <span class="entry-number">12312</span></a>
                    </div>
                 </div>
            </div>
            <div class="entries">
                <h2>Some Entries</h2>
                    <div class="entry">
                       <a href="#"> 
                           <h3>Title</h3>
                            <p>Lorem ipsum dolor sit amet.  lorem <span>sport</span>  </p>
                        </a>
                    </div>
                    <div class="entry">
                        <a href="#"> 
                            <h3>Title</h3>
                             <p>Lorem ipsum dolor sit amet.  lorem <span>sport</span>  </p>
                         </a>
                     </div>
                     <div class="entry">
                        <a href="#"> 
                            <h3>Title</h3>
                             <p>Lorem ipsum dolor sit amet.  lorem <span>sport</span>  </p>
                         </a>
                     </div>              <div class="entry">
                        <a href="#"> 
                            <h3>Title</h3>
                             <p>Lorem ipsum dolor sit amet.  lorem <span>sport</span>  </p>
                         </a>
                     </div>              <div class="entry">
                        <a href="#"> 
                            <h3>Title</h3>
                             <p>Lorem ipsum dolor sit amet.  lorem <span>sport</span>  </p>
                         </a>
                     </div>              <div class="entry">
                        <a href="#"> 
                            <h3>Title</h3>
                             <p>Lorem ipsum dolor sit amet.  lorem <span>sport</span>  </p>
                         </a>
                     </div>
                     <div class="entry">
                        <a href="#"> 
                            <h3>Title</h3>
                             <p>Lorem ipsum dolor sit amet.  lorem <span>sport</span>  </p>
                         </a>
                     </div>
                    <div class="entry">
                        <a href="#"> 
                            <h3>Title</h3>
                             <p>Lorem ipsum dolor sit amet.   <span>games</span> </p>
                         </a>
                     </div>
            </div>
        </div>
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
        {{-- <div id="app">
            <example-component></example-component>
        </div> --}}
        <script src="{{mix('js/app.js')}}"></script>
        <script>
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
    </body>
</html>
