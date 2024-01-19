<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-400">
    <h1 class="text-2xl font-bold">Product {{ $product->name }}</h1>

        <div>
            <p>Name: {{ $product->name }}</p>
            <p>Slug: {{ $product->slug }}</p>
            <p>Price: {{ $product->price }}</p>
            <p>Quantity: {{ $product->quantity }}</p>

        </div>

</body>
</html>
