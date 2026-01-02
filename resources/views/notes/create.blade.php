@extends('layouts.app')

@section('title', 'Create Note')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Create Note</h2>

    <form method="POST" action="{{ route('notes.store') }}" class="bg-white p-6 rounded shadow max-w-lg">
        @csrf

        <input type="text" name="title" placeholder="Title" class="w-full mb-3 border p-2 rounded">

        <textarea name="content" placeholder="Content" class="w-full mb-3 border p-2 rounded"></textarea>

        <button class="bg-green-500 text-white px-4 py-2 rounded">
            Save
        </button>
       
    </form>
@endsection
