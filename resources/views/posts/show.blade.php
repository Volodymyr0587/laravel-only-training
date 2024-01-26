<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel Post View Count Tutorial - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5" >

    <h1>{{ $post->title }} - ItSolutionStuff.com</h1>

    <strong class="text-danger">Total Views: {{ $post->viewer }}</strong>

    <p>{!! $post->body !!}</p>

</div>

</body>
</html>
