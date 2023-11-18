@extends("layouts.app")

@section("title")
    Post More
@endsection

@section("main")

    <div class="max-w-xl">
        <div class="mb-3">
            <lable class="form-label">ID</lable>
            <input
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                type="text" maxlength="100" readonly value="{{ $post->id }}">
        </div>

        <div class="mb-3">
            <lable class="form-label">Category</lable>
            <input
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                type="text" maxlength="100" readonly value="{{ $post->category->title }}">
        </div>

        <div class="mb-3">
            <lable class="form-label">Title</lable>
            <input
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                type="text" maxlength="100" readonly value="{{ $post->title }}">
        </div>

        <div class="mb-3">
            <lable>Body</lable>
            <textarea
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                name="description" maxlength="300" rows="10" readonly>{{ $post->body }}</textarea>
        </div>

        <div class="mb-3">
            <lable class="form-label">Create_at</lable>
            <input
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                type="text" maxlength="100" readonly value="{{ $post->created_at }}">
        </div>

        <div class="mb-3">
            <lable class="form-label">Updated_at</lable>
            <input
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                type="text" maxlength="100" readonly value="{{ $post->updated_at }}">
        </div>


        <button type="button" class="btn btn-outline-secondary" onclick="history.back()">OK, Back</button>
    </div>

@endsection
