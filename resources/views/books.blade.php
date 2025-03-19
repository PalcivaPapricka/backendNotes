<div>

<ul>
    @foreach($books as $book)
        <li>{{ $book['id'] }}. <strong>{{$book['title']}}</strong> - {{$book['autor'] }}</li>

    @endforeach
</ul>



</div>
