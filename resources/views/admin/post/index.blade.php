@extends('layouts.app')


@section('content')
    <div class="mt-3 container">
        @if (session('create'))
            <div class="alert alert-success">
                {{ session('create') }} : questo elemento è stato creato corettamente
            </div>
        @endif
        @if (session('delete'))
            <div class="alert alert-danger">
                {{ session('delete') }} : questo elemento è stato eliminato corettamente
            </div>
        @endif
        INDEX POSTS
        <table class="table table-dark table-striped">
            <thead>
                <th>ID</th>
                <th>AUTHOR</th>
                <th>TITLE</th>
                <th>DESCRIPTION</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->user->name }}</td>
                        <td>
                            <a href="{{ route('admin.post.show', $post->id) }}">
                                {{ $post->title }}
                            </a>
                        </td>
                        <td>{{ $post->description }}</td>
                        <td>
                            <a class="btn btn-success" href="{{ route('admin.post.edit', $post->id) }}">
                                Edit
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('admin.post.destroy', $post->id) }}" class="delete-method" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger" type="submit">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Non ci sono post da visualizzare</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
