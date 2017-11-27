@extends('layouts.main')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h3>List of posts</h3>
                {{--<h3> Test webhook</h3>--}}
                @foreach( $posts as $post)
                    <div class="panel panel-default">
                        <div class="panel-heading"><a href="{{ route('post.detail', $post->id)  }}"><strong>{{ $post->title }}</strong></a> </div>
                        <div class="panel-body">{{ $post->content }}</div>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
@endsection
