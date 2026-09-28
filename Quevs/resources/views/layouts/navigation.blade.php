<nav x-data="{ open: false }" class="bg-white border-b border-slate-200/80 sticky top-0 z-50 backdrop-blur-md bg-white/95">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center gap-6">

                <div class="shrink-0 flex items-center">
                    <a href="{{ route('posts.index') }}" class="flex items-center gap-2 group transition-all">
                        <div class="bg-gradient-to-tr from-indigo-600 to-violet-500 text-white p-2 rounded-xl shadow-md shadow-indigo-200 group-hover:scale-105 transition-transform">
                            <i class="fa-solid fa-comments text-base"></i>
                        </div>
                        <span class="font-bold text-lg text-slate-900 tracking-tight group-hover:text-indigo-600 transition-colors">
                            Quevs<span class="text-indigo-600">Talks</span>
                        </span>
                    </a>
                </div>

                <!-- Desktop Navigation Links -->
                <div class="hidden sm:flex sm:items-center sm:gap-1 h-full pt-1">
                    <a href="{{ route('posts.index') }}"
                       class="flex items-center gap-2 px-4 py-2 rounded-lg text-sm font-medium transition-all {{ request()->routeIs('posts.index') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                        <i class="fa-solid fa-house-text text-xs opacity-70"></i>
                        <span>Feed</span>
                    </a>

                    <a href="{{ route('message.index') }}"
                       class="flex items-center gap-2 px-4 py-2 rounded-lg text-sm font-medium transition-all {{ request()->routeIs('message.index') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                        <i class="fa-solid fa-paper-plane text-xs opacity-70"></i>
                        <span>Messenger</span>
                    </a>

                    <a href="{{ route('dashboard') }}"
                       class="flex items-center gap-2 px-4 py-2 rounded-lg text-sm font-medium transition-all {{ request()->routeIs('dashboard') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                        <i class="fa-solid fa-chart-simple text-xs opacity-70"></i>
                        <span>Dashboard</span>
                    </a>
                </div>
            </div>

            <!-- Settings Dropdown (Desktop) -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center gap-2 px-3 py-1.5 border border-slate-200 hover:border-slate-300 text-sm font-medium rounded-full text-slate-700 bg-slate-50 hover:bg-white hover:shadow-sm focus:outline-none transition-all duration-150 cursor-pointer">
                            <!-- Mini Avatar Initials -->
                            <div class="w-6 h-6 rounded-full bg-indigo-600 text-white text-[10px] font-bold flex items-center justify-center uppercase">
                                {{ substr(Auth::user()->name, 0, 2) }}
                            </div>
                            <span>{{ Auth::user()->name }}</span>
                            <i class="fa-solid fa-chevron-down text-[10px] text-slate-400 transition-transform duration-200" :class="{'rotate-180': open}"></i>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="px-4 py-2 border-b border-slate-100">
                            <p class="text-xs text-slate-400 font-medium">Signed in as</p>
                            <p class="text-sm font-semibold text-slate-700 truncate">{{ Auth::user()->email }}</p>
                        </div>

                        <x-dropdown-link :href="route('profile.edit')" class="flex items-center gap-2 text-slate-600">
                            <i class="fa-regular fa-user text-xs opacity-70"></i> {{ __('Profile Settings') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    class="flex items-center gap-2 text-rose-600 hover:bg-rose-50"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="fa-solid fa-arrow-right-from-bracket text-xs opacity-70"></i> {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger Button (Mobile) -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-xl text-slate-500 hover:text-slate-700 hover:bg-slate-100 focus:outline-none focus:bg-slate-100 focus:text-slate-700 transition duration-150 ease-in-out">
                    <svg class="h-5 w-5" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden border-t border-slate-100 bg-white">
        <div class="pt-2 pb-3 space-y-1 px-2">
            <a href="{{ route('posts.index') }}"
               class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-base font-medium {{ request()->routeIs('posts.index') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-600 hover:bg-slate-50' }}">
                <i class="fa-solid fa-house-text w-5 opacity-70"></i> Feed
            </a>

            <a href="{{ route('message.index') }}"
               class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-base font-medium {{ request()->routeIs('message.index') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-600 hover:bg-slate-50' }}">
                <i class="fa-solid fa-paper-plane w-5 opacity-70"></i> Messenger
            </a>

            <a href="{{ route('dashboard') }}"
               class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-base font-medium {{ request()->routeIs('dashboard') ? 'bg-indigo-50 text-indigo-600' : 'text-slate-600 hover:bg-slate-50' }}">
                <i class="fa-solid fa-chart-simple w-5 opacity-70"></i> Dashboard
            </a>
        </div>

        <!-- Mobile Profile Options -->
        <div class="pt-4 pb-4 border-t border-slate-100 bg-slate-50/50 px-4">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-9 h-9 rounded-full bg-indigo-600 text-white text-xs font-bold flex items-center justify-center uppercase">
                    {{ substr(Auth::user()->name, 0, 2) }}
                </div>
                <div>
                    <div class="font-semibold text-sm text-slate-800">{{ Auth::user()->name }}</div>
                    <div class="text-xs text-slate-500 truncate max-w-[200px]">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="rounded-xl flex items-center gap-2 text-slate-600">
                    <i class="fa-regular fa-user text-xs opacity-70"></i> {{ __('Profile Settings') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            class="rounded-xl text-rose-600 hover:bg-rose-50 flex items-center gap-2"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class="fa-solid fa-arrow-right-from-bracket text-xs opacity-70"></i> {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
