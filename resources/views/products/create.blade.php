<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Product</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-400">
    <form action="{{ route('products.store') }}" method="POST"
    class="m-4">
        @csrf
        <label for="name">Name:</label><br>
        <input class="rounded" type="text" id="name" name="name" value="{{ old('name') }}"><br>
        @error('name')
            <p>{{ $message }}</p>
        @enderror
        <label for="price">Price:</label><br>
        <input class="rounded" type="text" id="price" name="price" value="{{ old('price') }}"><br>
        @error('price')
            <p>{{ $message }}</p>
        @enderror
        <label for="quantity">Quantity:</label><br>
        <input class="rounded" type="text" id="quantity" name="quantity" value="{{ old('quantity') }}">
        @error('quantity')
            <p>{{ $message }}</p>
        @enderror

        <button class="p-1 bg-green-500 rounded" type="submit">Create</button>
      </form>
</body>
</html>
