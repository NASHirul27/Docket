
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <!-- Page Heading -->
            <nav class="dark:bg-gray-800 p-4">
                <div class="container mx-auto flex justify-between items-center">
                    <div class="text-white font-semibold text-lg"><a href="#">Admin Page</a></div>
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                    <div>{{ Auth::user()->name }}</div>

                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content" class="text-white">
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>
                    
                
            </nav>

            <!-- Page Content -->
            <main>
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900 dark:text-gray-100">
                                {{ __("Welcome admin!") }}
                            </div>
                        </div>
                        <div class="container mx-auto p-8">
                        <h1 class="text-3xl font-bold text-white mb-5">List Of User</h1>
                        <table class="table-auto border-collapse w-full">
                            <thead>
                                <tr>
                                    <th class="border px-4 py-2 text-white">No</th>
                                    <th class="border px-4 py-2 text-white">Name</th>
                                    <th class="border px-4 py-2 text-white">Email</th>
                                    <th class="border px-4 py-2 text-white">Role</th>
                                    <th class="border px-4 py-2 text-white">Created At</th>    
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td class="border px-4 py-2 text-white">{{ $loop->iteration }}</td>
                                        <td class="border px-4 py-2 text-white">{{ $user->name }}</td>
                                        <td class="border px-4 py-2 text-white">{{ $user->email }}</td>
                                        <td class="border px-4 py-2 text-white">{{ $user->role }}</td>
                                        <td class="border px-4 py-2 text-white">{{ $user->created_at }}</td>
                                    </tr>
                                    @empty
                                        <h3 class="text-white">There is No User</h3>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $users->links() }}
                    </div>     
                    
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                    <script>
                        //message with sweetalert
                        @if(session('success'))
                            Swal.fire({
                                icon: "success",
                                title: "SUCCESS!",
                                text: "{{ session('success') }}",
                                background: "rgb(31 41 55)",
                                color: "#716add",
                                showConfirmButton: false,
                                timer: 2000
                            });
                        @elseif(session('error'))
                            Swal.fire({
                                icon: "error",
                                title: "FAILED!",
                                text: "{{ session('error') }}",
                                background: "rgb(31 41 55)",
                                color: "#716add",
                                showConfirmButton: false,
                                timer: 2000
                            });
                        @endif
                    </script>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>
