@extends('layout')
@section('content')
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
                <h2>Selected Category Entries</h2>
                    <div class="entry">
                       <a href="#"> 
                           <h3>Title</h3>
                            <p>Lorem ipsum dolor sit amet.  lorem lorem lorem<div style="color: green"><img style="margin-right:5px" class="user-img" src="{{url('/images/user-logo.png')}}" alt=""> RasimCem Aytan</div>  <small>date : 10-12/2020</small></p>
                        </a>
                    </div>
                    <div class="entry">
                        <a href="#"> 
                            <h3>Title</h3>
                             <p>Lorem ipsum dolor sit amet.  lorem lorem lorem<div style="color: green"><img style="margin-right:5px" class="user-img" src="{{url('/images/user-logo.png')}}" alt=""> RasimCem Aytan</div>  <small>date : 10-12/2020</small></p>
                         </a>
                     </div>
                     <div class="entry">
                        <a href="#"> 
                            <h3>Title</h3>
                             <p>Lorem ipsum dolor sit amet.  lorem lorem lorem<div style="color: green"><img style="margin-right:5px" class="user-img" src="{{url('/images/user-logo.png')}}" alt=""> RasimCem Aytan</div>  <small>date : 10-12/2020</small></p>
                         </a>
                     </div>
                     <div class="entry">
                        <a href="#"> 
                            <h3>Title</h3>
                             <p>Lorem ipsum dolor sit amet.  lorem lorem lorem<div style="color: green"><img style="margin-right:5px" class="user-img" src="{{url('/images/user-logo.png')}}" alt=""> RasimCem Aytan</div>  <small>date : 10-12/2020</small></p>
                         </a>
                     </div>
                     <div class="entry">
                        <a href="#"> 
                            <h3>Title</h3>
                             <p>Lorem ipsum dolor sit amet.  lorem lorem lorem<div style="color: green"><img style="margin-right:5px" class="user-img" src="{{url('/images/user-logo.png')}}" alt=""> RasimCem Aytan</div>  <small>date : 10-12/2020</small></p>
                         </a>
                     </div>
            </div>
        </div>
            
@endsection
   