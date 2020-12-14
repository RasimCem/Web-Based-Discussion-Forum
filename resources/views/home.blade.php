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
                <h2>Some Entries</h2>
                @foreach ($entries as $entry)
                    <div class="entry">
                        <a href="#"> 
                            <h3>{{$entry->title}}</h3>
                            <p>{{$entry->entry}}<span>{{$entry->getCategory}}</span>  </p>
                        </a>
                    </div> 
                @endforeach
            </div>
        </div>
@endsection
   