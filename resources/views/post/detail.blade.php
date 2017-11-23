@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><strong>{{ $post->title }}</strong></div>
                    <div class="panel-body">{{ $post->content }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection