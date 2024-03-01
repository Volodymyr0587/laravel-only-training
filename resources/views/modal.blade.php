<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ __("Alpine.js Modal with Dialog") }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.5/dist/cdn.min.js"></script>
    </head>

    <body class="antialiased">
        <div class="max-w-6xl mx-auto mt-4 sm:px-6 lg:px-8" x-data="{
            close() { $refs.dialogRef.close() },
            closeFromEvent(event) {
                if (event.currentTarget === event.target) {
                    $refs.dialogRef.close()
                }
            }
         }">
            <button @click="$refs.dialogRef.showModal()" class="px-3 py-2 bg-blue-500 text-white rounded-md">Open
                Dialog</button>
            <dialog @click="closeFromEvent(event)" x-ref="dialogRef" class="bg-white rounded-lg shadow-lg p-4">
                <h1 class="text-4xl font-bold text-center">Hello from AlpineJS Modal!</h1>

                <button @click="close()" class="px-3 py-2 bg-blue-500 text-white rounded-md">Close Dialog</button>

            </dialog>
        </div>
    </body>

</html>