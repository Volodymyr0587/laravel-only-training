<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
</head>
<body class="bg-slate-400">
    <h1 class="text-2xl font-bold">Products</h1>

    <a href="{{ route('products.create') }}" class="text-blue-500 font-bold hover:underline">Create Product</a>
    @foreach ($products as $product)
        <div>
            <p>Name: {{ $product->name }}</p>
            <p>Slug: {{ $product->slug }}</p>
            <p>Price: {{ $product->price }}</p>
            <p>Quantity: {{ $product->quantity }}</p>

        </div>
    @endforeach
</body>
</html>
