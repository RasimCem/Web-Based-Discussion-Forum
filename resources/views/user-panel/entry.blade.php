@extends('user-panel.layout')
@section('content')
@section('title',"Entry")
    {{-- CONTENT --}}
        <div class="content">
             {{-- SIDEBAR --}}
            <x-sidebar ></x-sidebar>
            <div class="entry-container">
                <h2>{{$entry->title}}</h2>
                <div class="entry-box clearfix"> 
                    <div class="left">
                        <img class="user-img" 
                        @if ($entry->getUser['image'])
                                src="{{url('/storage/images/'.$entry->getUser['image'])}}"
                        @else
                                src="{{url('/images/user-logo.png')}}"
                        @endif
                        >
                        <div class="entry-author">{{Str::limit($entry->getUser['name'],1,'.')}} {{Str::limit($entry->getUser['surname'],6,'.')}}</div>
                        <small class="entry-date">{{Str::limit($entry->created_at,10,'')}}</small>
                    </div>
                    <div style="margin:auto auto;width:90%;margin-left:60px;">
                        <p class="entry-content">{{$entry->entry}}</p>
                    </div>
                </div>
                @foreach ($entry->getSubEntries as $sub)
                    <div class="entry-box clearfix">
                        @if (Auth::user() && $sub->getUser['id'] == Auth::user()->id)
                            <div style="text-align:right !important;">
                                <a style="font-size: 18px" class="text-danger" href="{{route('deleteMySubEntry',$sub['id'])}}">
                                    <i class="fas fa-minus-square"></i>
                                </a>
                            </div>
                        @endif
                        <div class="left">
                            <img class="user-img" 
                            @if ($sub->getUser['image'])
                                 src="{{url('/storage/images/'.$sub->getUser['image'])}}"
                            @else
                                 src="{{url('/images/user-logo.png')}}"
                            @endif
                             alt="">
                            <div class="entry-author">{{Str::limit($sub->getUser['name'],1,'.')}} {{Str::limit($sub->getUser['surname'],5,'.')}}</div>
                            <small class="entry-date">{{Str::limit($sub['created_at'],10,'')}}</small>
                        </div>
                        <div style="margin:auto auto;width:90%;margin-left:60px;">
                            <p class="entry-content">{{$sub['entry']}}</p>
                        </div>
                    </div>
                @endforeach
                <form action="{{route('newSub',$entry->id)}}" method="POST">
                    @csrf
                    <div class="subentry-box clearfix">
                                <textarea name="entry" id="" placeholder="Type Your Toughts..." cols="30" rows="5"></textarea>
                                <input type="submit" value="Send" class="btn btn-success btn-lg"/>
                    </div>
                </form>
            </div>
        </div>
@endsection
<style>
    .subentry-box{
        display: block;
        padding: 2px;
        width: 100%;
        margin-top:35px;
        text-align: right;
    }
    .subentry-box textarea{
        width: 100%;
        margin-left: auto;
        margin:15px 2px;
    }
</style>