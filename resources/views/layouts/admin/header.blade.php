<header class="h-full w-full flex items-center justify-between px-6 text-white">

    <div>
        <nav class="text-sm mb-1 opacity-80">
    </div>

    <div class="flex items-center gap-4">
        <!-- tombol / icon di sini -->
    </div>

    <div class="flex items-center gap-4">

        {{-- SEARCH --}}
        <div class="relative">
            <input
                class="rounded-xl py-2 pl-4 pr-10 text-gray-900 w-52 outline-none"
                type="text" placeholder="Search..." style="background:white;">
            <i class="ni ni-zoom-split-in absolute right-3 top-2.5 text-gray-400 text-lg"></i>
        </div>

        {{-- USER DROPDOWN --}}
        <div class="relative group">
            <button class="flex items-center gap-2 focus:outline-none">

                {{-- Avatar --}}
              <img
                    src="{{ Auth::user()->profile_picture
                        ? asset('storage/' . Auth::user()->profile_picture)
                        : asset('assets-admin/img/team/profile-picture-3.jpg') }}"
                    class="w-10 h-10 rounded-full border-2 border-white object-cover"
                />


                {{-- Name --}}
                <span class="font-semibold text-white hidden md:block">
                    {{ Auth::user()->name ?? 'User' }}
                </span>

            </button>

            <!-- Dropdown -->
            <div
                class="absolute right-0 mt-2 w-52 bg-white text-gray-800 rounded-xl shadow-xl hidden group-hover:block z-50">

                <!-- PROFILE -->
                <a href="#"
                    class="flex items-center gap-2 px-4 py-2 hover:bg-gray-100 rounded-t-xl">
                    <!-- User Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500"
                        viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 2a4 4 0 110 8 4 4 0 010-8zm-7 14a7 7 0 0114 0H3z"
                            clip-rule="evenodd" />
                    </svg>
                    Profile
                </a>

                <!-- SETTINGS -->
                <a href="#" class="flex items-center gap-2 px-4 py-2 hover:bg-gray-100">
                    <!-- Settings Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500"
                        viewBox="0 0 20 20" fill="currentColor">
                        <path
                            d="M11.3 1.046a1 1 0 00-2.6 0L7.83 3.02a1 1 0 01-.77.54l-2.18.2a1 1 0 00-.56 1.7l1.62 1.62a1 1 0 01.27.88l-.41 2.13a1 1 0 001.45 1.06l1.94-.97a1 1 0 01.94 0l1.94.97a1 1 0 001.45-1.06l-.41-2.13a1 1 0 01.27-.88l1.62-1.62a1 1 0 00-.56-1.7l-2.18-.2a1 1 0 01-.77-.54L11.3 1.046z" />
                        <path
                            d="M10 13a3 3 0 100 6 3 3 0 000-6z" />
                    </svg>
                    Settings
                </a>

                <!-- LAST LOGIN -->
                @if (session('last_login'))
                    <div class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700">
                        <!-- Clock Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm.75-12a.75.75 0 00-1.5 0v4a.75.75 0 00.33.62l3 2a.75.75 0 10.84-1.24L10.75 9.6V6z"
                                clip-rule="evenodd" />
                        </svg>
                        <div>
                            <span class="font-semibold">Last Login:</span><br>
                            {{ \Carbon\Carbon::parse(session('last_login'))->format('Y-m-d H:i:s') }}
                        </div>
                    </div>
                @endif

                <!-- LOGOUT -->
                <a href="{{ route('auth.logout') }}"
                    class="flex items-center gap-2 px-4 py-2 text-red-600 hover:bg-gray-100 rounded-b-xl">
                    <!-- Logout Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                        viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M3 4.5A1.5 1.5 0 014.5 3h5a1.5 1.5 0 010 3h-5A1.5 1.5 0 013 4.5zm9.854 4.646a.5.5 0 00-.708.708L14.293 12l-2.147 2.146a.5.5 0 00.708.708l2.5-2.5a.5.5 0 000-.708l-2.5-2.5z"
                            clip-rule="evenodd" />
                        <path
                            d="M11 12a.5.5 0 000-1H6a.5.5 0 000 1h5z" />
                    </svg>
                    Logout
                </a>

            </div>

        </div>

    </div>

</header>
