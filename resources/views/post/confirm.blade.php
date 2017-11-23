@extends('layouts.main')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h3>Confirm post data</h3>
                <form method="POST" action="{{ route('post.postAdd')  }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="postTitle">Post's title</label>
                        <input  type="text" class="form-control" id="postTitle" placeholder="Title" value="{{ $data['title'] }}" disabled>
                        <input type="hidden"  name="title" value="{{ $data['title'] }}">
                    </div>
                    <div class="form-group">
                        <label for="postContent">Content</label>
                        {{--<input type="textarea" class="form-control" id="postContent" placeholder="Content">--}}
                        <textarea  rows="4" cols="50" class="form-control" id="postContent" placeholder="Content" disabled>{{ $data['content'] }}</textarea>
                        <input type="hidden"  name="content" value="{{ $data['content'] }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </form>
            </div>
        </div>
    </div>
@endsection
