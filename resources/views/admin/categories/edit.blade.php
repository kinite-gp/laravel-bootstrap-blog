@extends("layouts.app")

@section("title")
    Category More
@endsection

@section("main")

    <div class="max-w-xl">
        <form method="post">
            @csrf
            <div class="mb-3">
                <lable class="form-label">Title</lable>
                <input
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                    type="text" name="title" maxlength="100" value="{{ $category->title }}">
            </div>

            <div class="mb-3">
                <lable class="form-label">Icon</lable>
                <input
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                    type="text" name="icon" maxlength="100" value="{{ $category->icon }}">
            </div>

            <div class="mb-3">
                <lable>Description</lable>
                <textarea
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                    name="description" maxlength="300" rows="10">{{ $category->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-outline-secondary">Edit</button>
        </form>
    </div>

@endsection
