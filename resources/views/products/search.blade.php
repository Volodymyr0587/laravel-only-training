<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-400">
    <h1 class="text-2xl font-bold">Products</h1>


    @foreach ($products as $product)
        <div>
            <p>Name: <a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a></p>
            <p>Slug: {{ $product->slug }}</p>
            <p>Price: {{ $product->price }}</p>
            <p>Quantity: {{ $product->quantity }}</p>
            <p class="pt-2 text-green-700">
                <a href="{{ route('products.edit', $product->id) }}">Edit</a>
            </p>
            <form class="pt-2 text-red-500" action="{{ route('products.destroy', $product->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                onclick="return confirm('Are you sure you want to delete this item?')">
                Delete</button>
            </form>

        </div>
    @endforeach
</body>
</html>
