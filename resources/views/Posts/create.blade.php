@extends('Layout.app')

@section('content')



    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h3 class="text-center mb-4">Create New Post</h3>
            <form action="{{ route('posts.store') }}" method="post">
                @csrf

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Description</label>
                    <textarea class="form-control" id="content" name="description" rows="4" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="creator" class="form-label">Post Creator</label>
                    <select class="form-select" id="creator" name="post_creator" required>
                        @foreach ($Users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

                <hr>
                <button type="submit" class="btn btn-secondary w-100">Submit</button>
            </form>
        </div>
    </div>
@endsection
