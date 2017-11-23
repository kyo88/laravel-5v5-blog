@extends('layouts.main')

@section('content')
    @if (!empty(session('errors')))
        <div class="alert alert-danger">
            <ul>
            @foreach( session('errors')->all() as $error)
                <li>{{$error}}</li>
            @endforeach
            </ul>
        </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h3>Add new Post</h3>
                <form method="POST" action="{{ route('post.confirm')  }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="postTitle">Post's title</label>
                        <input name="title" type="text" class="form-control" id="postTitle" placeholder="Title" value="{{ old('title', null)}} ">
                    </div>
                    <div class="form-group">
                        <label for="postContent">Content</label>
                        {{--<input type="textarea" class="form-control" id="postContent" placeholder="Content">--}}
                        <textarea name="content" rows="4" cols="50" class="form-control" id="postContent" placeholder="Content">{{ old('content', '')}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
