@extends("layouts.app")

@section("title")
    Admin Panel
@endsection

@section("header-link")
    <link rel="stylesheet" href="/app/adminpanel.css">
@endsection

@section("main_noborder")
    <div class="pb-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="pb-6 text-gray-900">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                    Add Models
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body flex-row">
                                    <a type="button" class="btn btn-outline-primary" href="{{ route("admin_category_add") }}">Add Category</a>
                                    <a type="button" class="btn btn-outline-primary" href="{{ route("admin_post_add") }}">Add Post</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pb-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a class="model_btn" href="{{ route("admin_user_list") }}">
                        <h3>Users</h3>
                        <div class="space-x"></div>
                        <span class="badge rounded-pill text-bg-danger">{{ $users->count() }}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="pb-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a class="model_btn" href="{{ route("admin_category_list") }}">
                        <h3>Categories</h3>
                        <div class="space-x"></div>
                        <span class="badge rounded-pill text-bg-danger">{{ $categories->count() }}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="pb-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a class="model_btn" href="{{ route("admin_post_list") }}">
                        <h3>Posts</h3>
                        <div class="space-x"></div>
                        <span class="badge rounded-pill text-bg-danger">{{ $post->count() }}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
