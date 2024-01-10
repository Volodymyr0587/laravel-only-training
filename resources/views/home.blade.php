<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="m-2 flex justify-center items-center">

        <div>
            <h1>HOME PAGE</h1>
            <h3>FOR EXPERIMENTS 🤪</h3>

            <h4 class="m-4 font-bold ">Pluralize</h4>
            @foreach (['apple', 'pond', 'level', 'field', 'car', 'task'] as $word)
                <p>{{ $word }} => {{ Str::plural($word) }}</p>
            @endforeach
        </div>

    </div>
</body>

</html>
