@extends('user-panel.layout')
@section('content')
@section('title',"Categorical Entries")
    {{-- CONTENT --}}
        <div class="content">
            <x-sidebar></x-sidebar>
            <div class="entries">
                <h2>{{$catName[0]['name']}}</h2>
               @foreach ($entries as $entry)
                    <div class="entry">
                        <a href="{{route('goToEntry',$entry['id'])}}"> 
                            <h3>{{$entry->title}}</h3>
                            <p>{{$entry->entry}}<div style="color: green"><img style="margin-right:5px" class="user-img" src="{{url('/images/user-logo.png')}}" alt=""> RasimCem Aytan</div>  <small>date : 10-12/2020</small></p>
                        </a>
                    </div>
               @endforeach
            </div>
        </div>
            
@endsection
   