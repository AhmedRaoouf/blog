<!-- resources/views/posts/create.blade.php -->

@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>Update Post</h1>
                @include('inc.message')

                <form action="{{ route('posts.update',$post->id) }}" method="post" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf()

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" value="{{$post->title}}" id="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="author">Author</label>
                        <input type="text" name="author" id="author" value="{{$post->author}}"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name="content" id="content" class="form-control">{{$post->content}}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image">
                    </div>
                    <!-- Add other fields as needed -->
                    <button type="submit" class="btn btn-primary">Create Post</button>
                </form>
            </div>
        </div>
    </div>
@endsection
