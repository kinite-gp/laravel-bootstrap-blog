
{{--                    <x-slot name="content">--}}
{{--                        <x-dropdown-link :href="route('profile.edit')">--}}
{{--                            {{ __('Profile') }}--}}
{{--                        </x-dropdown-link>--}}

{{--                        <form method="POST" action="{{ route('logout') }}">--}}
{{--                            @csrf--}}

{{--                            <x-dropdown-link :href="route('logout')"--}}
{{--                                    onclick="event.preventDefault();--}}
{{--                                                this.closest('form').submit();">--}}
{{--                                {{ __('Log Out') }}--}}
{{--                            </x-dropdown-link>--}}


{{--                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>--}}
{{--                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>--}}



{{--                <form method="POST" action="{{ route('logout') }}">--}}
{{--                    @csrf--}}

{{--                    <x-responsive-nav-link :href="route('logout')"--}}
{{--                            onclick="event.preventDefault();--}}
{{--                                        this.closest('form').submit();">--}}
{{--                        {{ __('Log Out') }}--}}


<header class="p-3 text-bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="#" class="nav-link px-2 text-secondary">Home</a></li>
                <li><a href="#" class="nav-link px-2 text-white">Features</a></li>
                <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
                <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
                <li><a href="#" class="nav-link px-2 text-white">About</a></li>
            </ul>

            <div class="text-end">
                @if (Auth::check())
                    <form method="POST" action="{{ route('logout') }}" style="display: inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-light me-2" href="{{ route('logout') }}">Logout</button>
                    </form>
                    <a type="button" class="btn btn-outline-light me-2" href="{{ route('profile.edit') }}">Profile</a>

                    @if (\App\Models\User::find(auth()->user()->id)->role->admin == 1)
                        <a type="button" class="btn btn-outline-info " href="{{ route("admin_panel") }}">Admin Panel</a>
                    @endif

                @else
                    <a type="button" class="btn btn-outline-light me-2" href="{{ route('login') }}">Login</a>
                    <a type="button" class="btn btn-outline-light me-2" href="{{ route('register') }}">Register</a>
                @endif
            </div>

        </div>
    </div>
</header>
