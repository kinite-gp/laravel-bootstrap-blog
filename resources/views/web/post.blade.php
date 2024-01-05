@extends("layouts.app")

@section("title")
    {{ $post->title }}
@endsection

@section("header-link")
    <link rel="stylesheet" href="/app/web.css">
@endsection

@section("main_noborder")
    <div class="card post-card" style="width: calc(18rem + 18rem + 24px + 18rem + 18rem + 24px)">
        <h3 class="post-title">{{ $post->title }}</h3>

        <h4 class="post-user"><span class="badge text-bg-dark">{{ $post->category->title }}</span>  {{ $post->user->name }}</h4>


        <div class="post-body">
        <div class='hr'></div>

@php
$post->body = str_replace( "[x]", "✅" ,$post->body);    
$post->body = str_replace("[ ]", "❎",$post->body); 
@endphp

@markdown
{!! $post->body !!}
@endmarkdown
        <div class='hr'></div>
        </div>

        <div class="date">
            created at: <span class="badge text-bg-secondary">{{ $post->created_at }}</span>
        </div>
        <div class="date">
            updated at: <span class="badge text-bg-secondary">{{ $post->updated_at }}</span>
        </div>
    </div>
@endsection
