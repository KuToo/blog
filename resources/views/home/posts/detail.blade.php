@extends('home.layout.main')
@section('title', 'Page Title')
@section('content')
    <div class="col-sm-8 blog-main">
        <div class="blog-post">
            <div style="">
                <h2 class="blog-post-title">{{$post->title}}</h2>
                @can('update',$post)
                <a style="" href="/postedit/{{$post->id}}">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                </a>
                @endcan
                @can('delete',$post)
                <a style="" href="/postdel/{{$post->id}}">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </a>
                @endcan
                <p calss="blog-post-meta"> {{$post->created_at->toFormattedDateString()}}  <a href="">作者</a> </p>
                <p>{{$post->content}}</p>
                <div>
                    <a href="postzan/{{$post->id}}" type="button" class="btn btn-primary btn-lg">赞</a>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">评论</div>
                <ul class="list-group">
                </ul>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">发表评论</div>
                <ul class="list-group">
                </ul>
            </div>
        </div>
    </div><!-- /.blog-main -->
@endsection

