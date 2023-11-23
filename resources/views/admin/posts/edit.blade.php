@extends("layouts.app")

@section("title")
    Post Edit
@endsection

@section("main_noborder")

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <form method="POST">
                        @csrf

                        <h2 class="mb-3 text-lg font-medium text-gray-900">Edit Post</h2>

                        <div class="mb-3">
                            <lable class="form-label">Title</lable>
                            <input
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                                name="title" type="text" maxlength="100" value="{{ $post->title }}">
                            @if($errors->has("title"))
                                <span class="badge text-bg-danger">{{ $errors->first("title") }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <lable>Body</lable>
                            <textarea
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                                name="body" rows="10">{{ $post->body }}</textarea>
                            @if($errors->has("body"))
                                <span class="badge text-bg-danger">{{ $errors->first("body") }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <lable>Category</lable>

                            <select
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                                name="category_id">
                                <option disabled value> -- select an option -- </option>
                                @php
                                    $category = \App\Models\Category::find($post->category_id);
                                    if (isset($category->title))
                                        {
                                            $category_id = $category->title;
                                        }
                                    else
                                        {
                                            $category_id = null;
                                        }
                                @endphp
                                @foreach($categories as $category)

                                    @if($category_id == $category->title)
                                        <option selected value={{ $category->id }}>{{ $category->title }}</option>
                                    @else
                                        <option value={{ $category->id }}>{{ $category->title }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @if($errors->has("category_id"))
                                <span class="badge text-bg-danger">{{ $errors->first("category_id") }}</span>
                            @endif
                        </div>

                        <div>
                            <input
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                type="submit">
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
