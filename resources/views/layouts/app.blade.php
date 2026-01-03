<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Notes App')</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-gray-100">

    <nav class="bg-white shadow mb-6">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between">
            <h1 class="font-bold">Notes App</h1>

            <div class="flex gap-4">
                <a href="{{ route('notes.index') }}">Notes</a>
                <a href="{{ route('notes.create') }}">Create</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button>Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-6">
        @yield('content')
    </main>

</body>

</html>
