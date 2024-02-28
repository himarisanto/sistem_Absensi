<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
</head>

<body>
    <nav class="bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('dashboard') }}">
                            <span class="block h-10 w-auto fill-current text-gray-600">Your Logo Here</span>
                        </a>
                    </div>

                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <a href="{{ route('dashboard') }}"
                            class="{{ (request()->routeIs('dashboard') ? 'active_class' : '') }}">
                            Dashboard
                        </a>
                    </div>
                </div>

                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <div class="dropdown">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700">
                            <div>{{ Auth::user()->name }}</div>
                        </button>

                        <div class="dropdown-content">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    Log Out
                                </a>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="-mr-2 flex items-center sm:hidden">
                    <button class="inline-flex items-center justify-center p-2 rounded-md text-gray-400">
                    </button>
                </div>
            </div>
        </div>

        <div class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <a href="{{ route('dashboard') }}"
                    class="{{ (request()->routeIs('dashboard') ? 'active_class' : '') }}">
                    Dashboard
                </a>
            </div>

            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            Log Out
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </nav>
</body>

</html>