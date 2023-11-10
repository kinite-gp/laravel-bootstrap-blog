@extends("layouts.app")

@section("title")
    User's
@endsection

@section("header-link")
    <link rel="stylesheet" href="/app/adminpanel.css">
@endsection

@section("main")
    <ul class="nav justify-content-center nav-tabs">
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ route("admin_user_list") }}">All User's</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{ route("admin_deleted_user_list") }}">Deleted User's</a>
        </li>
    </ul>

    <ul class="list-group list-group-flush">
        @foreach($users as $user)
            <li class="list-group-item model_btn">
                <h3 class="item-title">{{ $user->name }}</h3>
                <div class="space-x"></div>
                <form method="post" action="/panel/admin/user/recover/{{ $user->id }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-secondary mr-2">Recover</button>
                </form>
                <form method="post" action="/panel/admin/user/delete/force/{{ $user->id }}">
                    @csrf
                    @method("delete")
                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
