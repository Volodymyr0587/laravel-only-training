@foreach ($posts as $post)
    {{ $loop->iteration }} {{ $post->title }}
@endforeach
