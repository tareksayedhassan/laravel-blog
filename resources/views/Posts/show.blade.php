@extends('Layout.app')
@section('content')
@section('title')
    show post
@endsection
<div class="container custom-container mt-5 mx-auto">
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    Post
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <h5>Title: {{ $post->title }}</h5>
                    <h5>description: {{ $post->description }}</h5>
                    <hr>
                    Creator by: {{ $post->postedby }}
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Post creator info
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <strong> Creator by: {{ $post->user ? $post->user->name : 'not found' }}</strong>
                    <hr>
                    <strong>Created_at: {{ $post->user ? $post->user->created_at : 'not found' }}</strong>
                </div>
            </div>
        </div>
    </div>
@endsection
