<x-app-layout>
    <form method="POST" action="{{ route('notes.update', $note) }}">
        @csrf
        @method('PUT')

        <input type="text" name="title" value="{{ $note->title }}">
        <textarea name="content">{{ $note->content }}</textarea>

        <button type="submit">Update</button>
    </form>

</x-app-layout>
