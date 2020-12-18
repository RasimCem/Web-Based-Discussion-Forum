@extends('user-panel.layout')
@section('content')
@section('title',"Home Page")

    {{-- CONTENT --}}
        <div class="content">
            <x-sidebar></x-sidebar>
            <div class="entries">
                <h2>Some Entries</h2>
                @foreach ($entries as $entry)
                    <div class="entry">
                        <a href="{{route('goToEntry',$entry->id)}}"> 
                            <h3>{{$entry->title}}</h3>
                            <p>{{$entry->entry}}<span>{{$entry->getCategory['name']}}</span>  </p>
                        </a>
                    </div> 
                @endforeach
            </div>
        </div>
@endsection
   