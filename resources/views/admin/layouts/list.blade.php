@extends("layouts.app")

@section("title")
    {{ ucfirst($title)." list" }}
@endsection

@section("header-link")
    <link rel="stylesheet" href="/app/adminpanel.css">
@endsection

@section("main")
    <ul class="nav justify-content-center nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/panel/admin/{{ $title }}/all">All Categories</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/panel/admin/{{ $title }}/all/deleted">Deleted Categories</a>
        </li>
    </ul>

    <ul class="list-group list-group-flush">
        @foreach($items as $item)
            <li class="list-group-item model_btn">
                @isset($item->title)
                    <h3 class="item-title">{{ $item->title }}</h3>
                    <div class="space-x"></div>
                    <a type="button" class="btn btn-outline-secondary mr-2" href="/panel/admin/{{ $title }}/edit/{{ $item->id }}">Edit</a>
                    <a type="button" class="btn btn-outline-secondary mr-2" href="/panel/admin/{{ $title }}/more/{{ $item->id }}">More...</a>
                    <form method="post" action="/panel/admin/{{ $title }}/delete/{{ $item->id }}">
                        @csrf
                        @method("delete")
                        <button type="submit" class="btn btn-outline-danger">Soft Delete</button>
                    </form>
                @endisset

                @isset($item->name)
                    <h3 class="item-title">{{ $item->name }}</h3>
                    <div class="space-x"></div>
                    <a type="button" class="btn btn-outline-secondary mr-2" href="/panel/admin/{{ $title }}/profile/{{ $item->id }}">Profile</a>
                    <form method="post" action="/panel/admin/{{ $title }}/delete/{{ $item->id }}">
                        @csrf
                        @method("delete")
                        <button type="submit" class="btn btn-outline-danger">Soft Delete</button>
                    </form>
                @endisset


            </li>
        @endforeach
    </ul>
@endsection
