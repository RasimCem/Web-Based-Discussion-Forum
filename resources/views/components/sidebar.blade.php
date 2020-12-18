
    <div class="side-bar">
        <h2>Popular <i class="fab fa-hotjar dropicon"></i></h2>
        <div class="titles">
            @foreach ($entry as $item)
            <div class="title">
                <a href="{{route('goToEntry',$item->id)}}"> {{$item['title']}}  <span class="entry-number">{{$item->countSubEntries()}}</span></a>
            </div>
            @endforeach
        </div>
    </div>
