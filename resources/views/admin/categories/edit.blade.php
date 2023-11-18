@extends("layouts.app")

@section("title")
    Category Edit
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
                @if($errors->has("title"))
                    <span class="badge text-bg-danger">{{ $errors->first("title") }}</span>
                @endif
            </div>

            <div class="mb-3">
                <lable>Description</lable>
                <textarea
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                    name="description" maxlength="300" rows="10">{{ $category->description }}</textarea>
                @if($errors->has("description"))
                    <span class="badge text-bg-danger">{{ $errors->first("description") }}</span>
                @endif
            </div>

            <div class="mb-3">
                <lable class="form-label">Icon</lable>
                <input
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                    type="text" name="icon" maxlength="100" value="{{ $category->icon }}">
                @if($errors->has("icon"))
                    <span class="badge text-bg-danger">{{ $errors->first("icon") }}</span>
                @endif
            </div>

            <button type="submit" class="btn btn-outline-secondary">Edit</button>
        </form>
    </div>

@endsection
