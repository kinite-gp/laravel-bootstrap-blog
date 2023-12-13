@extends("layouts.app")

@section("title")
    {{ ucfirst($title)." list (Deleted)" }}
@endsection

@section("header-link")
    <link rel="stylesheet" href="/app/adminpanel.css">
@endsection

@section("main")
    <ul class="nav justify-content-center nav-tabs">
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/panel/admin/{{ $title }}/all">All Categories</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="/panel/admin/{{ $title }}/all/deleted">Deleted Categories</a>
        </li>
    </ul>

    <ul class="list-group list-group-flush">
        @foreach($items as $item)
            <li class="list-group-item model_btn">
                @isset($item->title)


                    @if(isset($item->comment))
                        <h3 class="item-title">{{ $item->title }}</h3>
                        <div class="space-x"></div>
                        <form method="post" action="/panel/admin/{{ $title }}/recover/{{ $item->id }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-secondary mr-2">Recover</button>
                        </form>
                        <form method="post" action="/panel/admin/{{ $title }}/delete/force/{{ $item->id }}">
                            @csrf
                            @method("delete")
                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                        </form>
                    @else

                    <h3 class="item-title">{{ $item->title }}</h3>
                    <div class="space-x"></div>

                    @if(isset($item->category))
                        <form method="post" action="/panel/admin/{{ $title }}/recover/{{ $item->id }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-secondary mr-2">Recover</button>
                        </form>
                    @else
                        <a type="button" class="btn btn-outline-secondary mr-2" href="/panel/admin/{{ $title }}/edit/{{ $item->id }}">Edit</a>
                        <a type="button" class="btn btn-outline-secondary mr-2" href="/panel/admin/{{ $title }}/more/{{ $item->id }}">More...</a>
                    @endif


                    <form method="post" action="/panel/admin/{{ $title }}/delete/force/{{ $item->id }}">
                        @csrf
                        @method("delete")
                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                    </form>

                    @endif
                @endisset()

                @isset($item->name)


                        <h3 class="item-title">{{ $item->name }}</h3>
                        <div class="space-x"></div>
                        <form method="post" action="/panel/admin/{{ $title }}/recover/{{ $item->id }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-secondary mr-2">Recover</button>
                        </form>
                        <form method="post" action="/panel/admin/{{ $title }}/delete/force/{{ $item->id }}">
                            @csrf
                            @method("delete")
                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                        </form>


                @endisset

            </li>
        @endforeach
    </ul>
@endsection