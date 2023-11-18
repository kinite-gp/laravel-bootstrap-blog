@extends("layouts.app")

@section("title")
    Post's
@endsection

@section("header-link")
    <link rel="stylesheet" href="/app/adminpanel.css">
@endsection

@section("main")
    <ul class="nav justify-content-center nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route("admin_post_list") }}">All Categories</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route("admin_deleted_post_list") }}">Deleted Categories</a>
        </li>
    </ul>

    <ul class="list-group list-group-flush">
        @foreach($posts as $post)
            <li class="list-group-item model_btn">
                <h3 class="item-title">{{ $post->title }}</h3>
                <div class="space-x"></div>
                <a type="button" class="btn btn-outline-secondary mr-2" href="/panel/admin/post/edit/{{ $post->id }}">Edit</a>
                <a type="button" class="btn btn-outline-secondary mr-2" href="/panel/admin/post/more/{{ $post->id }}">More...</a>
                <form method="post" action="/panel/admin/post/delete/{{ $post->id }}">
                    @csrf
                    @method("delete")
                    <button type="submit" class="btn btn-outline-danger">Soft Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
