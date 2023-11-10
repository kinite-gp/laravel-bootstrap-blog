@extends("layouts.app")

@section("title")
    User Profile
@endsection

@section("main_noborder")

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h3 class="mb-3">id: {{ $user->id }}</h3>
                    <h3 class="mb-3">Username: {{ $user->name }}</h3>
                    <h3 class="mb-3">Email: {{ $user->email }}</h3>
                    <h3 class="mb-3">Create_at: {{ $user->created_at }}</h3>
                    <h3 class="mb-3">Updated_at: {{ $user->updated_at }}</h3>

                    <button type="button" class="btn btn-outline-secondary" onclick="history.back()">OK, Back</button>
                </div>
            </div>
        </div>
    </div>

@endsection
