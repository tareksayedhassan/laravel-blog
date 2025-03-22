@extends('Layout.app')

@section('title', 'Edit Post')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h3 class="text-center mb-4">Edit Post</h3>
            <form action="{{ route('posts.update', $post->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title"
                        value="{{ old('title', $post->title) }}" required>
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Description</label>
                    <textarea class="form-control" id="content" name="description" rows="4" required>{{ old('description', $post->description) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="creator" class="form-label">Post Creator</label>
                    <select class="form-select" id="creator" name="post_creator" required>
                        @foreach ($users as $user)
                            <option @if ($user->id == $post->user_id) selected @endif value="{{ $user->id }}">
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <hr>
                <button type="submit" class="btn btn-secondary w-100">Update</button>
            </form>
        </div>
    </div>
@endsection
