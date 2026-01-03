@extends('layouts.app')

@section('title', 'My Notes')

@section('content')
    <h2 class="text-2xl font-bold mb-4">My Notes</h2>

    <a href="{{ route('notes.create') }}" class="bg-blue-500  text-white px-4 py-2 rounded">
        + New Note
    </a>
    <form method="GET" class="mb-4 mt-4 flex gap-2">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari catatan..."
            class="border rounded px-3 py-2 w-full">
        <button class="bg-blue-500 text-white px-4 rounded">
            Cari
        </button>
    </form>


    <div class="mt-6 grid gap-4">
        @foreach ($notes as $note)
            <div class="bg-white p-4 rounded shadow flex justify-between items-start">
                <!-- Kiri: Konten -->
                <div>
                    <h3 class="font-semibold text-lg">{{ $note->title }}</h3>
                    <p class="text-gray-600 text-sm mt-1">
                        {{ $note->content }}
                    </p>
                </div>

                <!-- Kanan: Aksi -->
                <div class="flex gap-3">
                    <!-- Edit -->
                    <a href="{{ route('notes.edit', $note->id) }}" class="p-2 rounded hover:bg-yellow-100 transition">
                        <i class="fa-solid fa-pen text-yellow-500"></i>
                    </a>

                    <!-- Delete -->
                    <form action="{{ route('notes.destroy', $note->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-2 rounded hover:bg-red-100 transition">
                            <i class="fa-solid fa-trash text-red-600"></i>
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif


    </div>
@endsection
