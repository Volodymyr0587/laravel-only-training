<h1>Products {{ $category }}</h1>

<ul>
    @foreach ($items as $item)
        <li>{{ $item }}</li>
    @endforeach
</ul>
