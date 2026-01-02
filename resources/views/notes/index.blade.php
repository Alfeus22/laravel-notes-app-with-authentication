@extends('layouts.app')

@section('title', 'My Notes')

@section('content')
    <h2 class="text-2xl font-bold mb-4">My Notes</h2>

    <a href="{{ route('notes.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
        + New Note
    </a>

    <div class="mt-6 grid gap-4">
        @foreach ($notes as $note)
            <div class="bg-white p-4 rounded shadow">
                <h3 class="font-semibold">{{ $note->title }}</h3>
                <p class="text-gray-600">{{ $note->content }}</p>
            </div>
        @endforeach
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
    </div>
@endsection
