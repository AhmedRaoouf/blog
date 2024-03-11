@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <h1>All Posts</h1>
                <a href="{{ route('posts.create') }}" class="btn btn-primary">Create Post</a>
                <br>
                @foreach ($posts as $post)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Title: {{ $post->title }}</h5>
                            <p class="card-text">Author: {{ $post->author }}</p>
                            <p class="card-text">Image Path:
                                {{ $post->image ? url('uploads') . '/' . $post->image : 'Not found' }}</p>
                            <p class="card-text">Content: {{ $post->content }}</p>
                            <p class="card-text">Date: {{ $post->created_at->format('M d, Y H:i:s') }}</p>
                            <div class="card mb-3">
                                <h5 class="card-title">Comments</h5>
                                @foreach ($post->comments as $comment)
                                    <p class="card-text">{{ $comment->user->name }}: {{ $comment->comment }}</p>
                                    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this comment?')">Delete
                                            Comment</button>
                                    </form>
                                    <br>
                                @endforeach
                                @include('inc.message')

                                <form action="{{ route('comments.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                    <div class="form-group">
                                        <label for="comment">Add Comment:</label>
                                        <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-sm btn-success">Submit</button>
                                </form>

                            </div>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit Post</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this post?')">Delete
                                    Post</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
