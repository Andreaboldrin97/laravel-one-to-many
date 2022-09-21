@extends('layouts.app')


@section('content')
    <form class="col-8  offset-2 bg-dark p-4 rounded" method="POST" action="{{ $route }}">
        @method($method)
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label text-white">TITLE</label>
            @error('title')
                <p class="text-danger fs-6">
                    {{ $message }}
                </p>
            @enderror
            <input type="text" name="title" class="form-control" required value="{{ old('title', $post->title) }}"
                id="title">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label text-white">DESCRIPTION</label>
            @error('description')
                <p class="text-danger fs-6">
                    {{ $message }}
                </p>
            @enderror
            <textarea class="form-control" name="description" id="description" rows="3" required>
            {{ old('description', $post->description) }}
        </textarea>
        </div>
        <div class="mb-3">
            <label for="image_url" class="form-label text-white">IMAGE_URL</label>
            @error('image_url')
                <p class="text-danger fs-6">
                    {{ $message }}
                </p>
            @enderror
            <input type="text" name="image_url" class="form-control" id="image_url" required
                value="{{ old('image_url', $post->image_url) }}">
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
    </form>
@endsection
