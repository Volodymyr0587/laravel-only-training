<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ app()->version() }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-200">
    <div class="m-10 grid grid-cols-1 gap-4">
        <ul>
            <li>PHP: {{ phpversion() }}</li>
            <li>Laravel: {{ app()->version() }}</li>
        </ul>
        @if (auth()->check())
            <p>Welcome, {{ auth()->user()->name }}</p>
            <form action="{{ route('logoutUser') }}" method="POST">
                @csrf
                <button type="submit">LOGOUT</button>
            </form>
        @else
            <a href="{{ route('registerUser') }}">REGISTER</a>
            <a href="{{ route('loginUser') }}">LOGIN</a>
        @endif

        <h1 class="text-rose-600">HOME PAGE. FOR EXPERIMENTS 🤪</h1>

        <div>
            <a href="{{ route('livewire') }}" class="p-2 m-2 border rounded-2xl bg-indigo-500">Livewire experiments >>></a>
        </div>


        <div>
            <h4 class="m-4 font-bold ">Pluralize</h4>
            @foreach (['apple', 'city', 'pond', 'level', 'field', 'car', 'task'] as $word)
                <p>{{ $word }} => {{ Str::plural($word) }}</p>
            @endforeach
        </div>

        <div>
            <h4 class="m-4 font-bold ">$loop variable in foreach</h4>
            @foreach (['apple', 'city', 'pond', 'level', 'field', 'car', 'task'] as $word)
                <p>{{ $loop->iteration }}. {{ $word }} => {{ Str::plural($word) }}</p>
            @endforeach
        </div>

        <div>
            <h4 class="m-4 font-bold ">Accessor</h4>
            @foreach ( App\Models\Product::all() as $product)
                <p>{{ $product->price }}</p>
            @endforeach
        </div>

        <div>
            <h4 class="m-4 font-bold ">Mutator</h4>
            @foreach ( App\Models\Product::all() as $product)
                <p>{{ $product->name }}</p>
            @endforeach
        </div>

        <div>
            <h4 class="m-4 font-bold ">All Users</h4>
            @foreach ( App\Models\User::all() as $user)
                <p>{{ $user->name }}</p>
            @endforeach
        </div>

        <div>
            <h4 class="m-4 font-bold ">Active Users</h4>
            @foreach ( App\Models\User::active()->get() as $user)
                <p>{{ $user->name }}</p>
            @endforeach
        </div>

        <div>
            <h4 class="m-4 font-bold ">Authors and their books</h4>
            @foreach ( App\Models\Author::all() as $author)
                <p class="text-green-600">Author: {{ $author->name }}</p>
                <span>Books ({{ $author->books->count() }})</span>
                <ul>
                    @foreach ($author->books as $book)
                        <li class="pl-4">{{ $loop->iteration }}. {{ $book->title }}</li>
                    @endforeach
                </ul>
            @endforeach
        </div>

        <div>
            <h4 class="m-4 font-bold ">Str::mask</h4>
            @foreach ( App\Models\User::all() as $user)
                <p>{{ Str::mask($user->name, '*', 3) }}</p>
            @endforeach
        </div>

        <div>
            <h4 class="m-4 font-bold ">Custom helper function</h4>
            {!! generateList([1, 2 , 3]) !!}

            {{ helloWorld() }}
        </div>

        <div>
            <h4 class="m-4 font-bold ">Number format</h4>
           
            @php
                $numbers = [123432432, 433123422345, 1223423234, 999324672740, 234873243, 2343242465, 2092137623];
            @endphp
            @foreach ($numbers as $number)
                <p>{{ Number::format($number) }} - {{ Number::forHumans($number) }}</p>
            @endforeach
            
        </div>


    </div>
</body>

</html>
