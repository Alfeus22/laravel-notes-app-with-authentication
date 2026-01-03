@extends('layouts.app')

@section('title', 'My Notes')

@section('content')
    <form method="POST" action="{{ route('notes.update', $note->id) }}">
        @csrf
        @method('PUT')

        <input type="text" name="title" value="{{ old('title', $note->title) }}" class="border p-2 w-full mb-3">
        @error('title')
            <p class="text-red-600 text-sm">{{ $message }}</p>
        @enderror

        <textarea name="content" class="border p-2 w-full h-32 mb-3">{{ old('content', $note->content) }}</textarea>
        @error('content')
            <p class="text-red-600 text-sm">{{ $message }}</p>
        @enderror

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
            Update
        </button>
    </form>
@endsection
