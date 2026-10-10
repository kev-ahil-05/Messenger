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
   <script src="https://tailwindcss.com"></script>
   <!-- Scripts -->
   @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
   <header class="fixed top-0 left-0 w-full z-50">
      
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

   </header>
   <aside
      class="bg-white dark:bg-neutral-900 border-r border-slate-300 dark:border-neutral-700 w-full h-full fixed top-0 left-0 max-w-[264px] py-6 px-4 overflow-auto">

      <div class="min-w-9 mb-8 px-3">
         <img src="https://readymadeui.com/logo-alt.svg" alt="Company logo" class="h-9 w-auto" />
      </div>

      <nav aria-label="Primary sidebar navigation">
         <ul class="space-y-1 text-sm text-slate-800 dark:text-slate-400 font-medium">
            <li>
               {{-- <a href="#" aria-current="page"
                  class="flex items-center gap-2.5 hover:text-slate-900 dark:hover:text-slate-50 hover:bg-slate-100 dark:hover:bg-neutral-800 rounded-md px-3 py-2 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500">
                  <svg xmlns="http://www.w3.org/2000/svg" class="size-[18px] fill-current overflow-visible"
                     viewBox="0 0 512 512" aria-hidden="true">
                     <path
                        d="M426 495.983H86c-25.364 0-46-20.635-46-46v-242.02c0-8.836 7.163-16 16-16s16 7.164 16 16v242.02c0 7.72 6.28 14 14 14h340c7.72 0 14-6.28 14-14v-242.02c0-8.836 7.163-16 16-16s16 7.164 16 16v242.02c0 25.364-20.635 46-46 46"
                        data-original="#000000" />
                     <path
                        d="M496 263.958a15.95 15.95 0 0 1-11.313-4.687L285.698 60.284c-16.375-16.376-43.02-16.376-59.396 0L27.314 259.272c-6.248 6.249-16.379 6.249-22.627 0-6.249-6.248-6.249-16.379 0-22.627L203.675 37.656c28.852-28.852 75.799-28.852 104.65 0l198.988 198.988c6.249 6.249 6.249 16.379 0 22.627A15.94 15.94 0 0 1 496 263.958M320 495.983H192c-8.837 0-16-7.164-16-16v-142c0-27.57 22.43-50 50-50h60c27.57 0 50 22.43 50 50v142c0 8.836-7.163 16-16 16m-112-32h96v-126c0-9.925-8.075-18-18-18h-60c-9.925 0-18 8.075-18 18z"
                        data-original="#000000" />
                  </svg>
                  Dashboard

               </a> --}}
               <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 text-sm font-semibold rounded-xl transition-all duration-200 bg-indigo-600 text-white shadow-lg shadow-indigo-600/10">
            <!-- Icon Dashboard -->
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V16zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V16z"/></svg>
            Dashboard
        </a>
            </li>
         </ul>

         <div class="mt-6">
            <div class="text-blue-700 dark:text-slate-50 text-sm font-semibold px-3">Information</div>
            <ul class="mt-3 space-y-1 text-sm text-slate-800 dark:text-slate-400 font-medium">
               <li>
                  <a href="{{ route('message.index') }}"
                     class="flex items-center gap-2.5 hover:text-slate-900 dark:hover:text-slate-50 hover:bg-slate-100 dark:hover:bg-neutral-800 rounded-md px-3 py-2 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500">
                     <svg xmlns="http://www.w3.org/2000/svg" class="size-[18px] fill-current overflow-visible"
                        viewBox="0 0 512 512" aria-hidden="true">
                        <path
                           d="M253.414 103.434c48.556 0 87.919 40.52 87.919 90.505s-39.363 90.505-87.919 90.505-87.919-40.521-87.919-90.505 39.363-90.505 87.919-90.505m0 36.202c-28.324 0-51.717 24.081-51.717 54.303s23.393 54.303 51.717 54.303 51.717-24.081 51.717-54.303-23.393-54.303-51.717-54.303"
                           data-original="#000000" />
                        <path
                           d="M253.414 0c139.957 0 253.414 113.457 253.414 253.414 0 94.285-51.491 176.544-127.886 220.19-35.728 20.575-77.036 32.582-121.104 33.199l-4.423.025C113.457 506.828 0 393.371 0 253.414S113.457 0 253.414 0m-23.676 346.505c-46.331 0-87.479 29.378-102.607 73.008l-2.339 7.571c35.919 27.232 80.165 42.893 126.504 43.522l5.709-.009c38.24-.62 74.079-11.122 105.072-29.064l19.977-13.243-2.237-6.866c-14.371-44.046-55.062-74.052-101.239-74.901zm23.676-310.303c-119.963 0-217.212 97.249-217.212 217.212 0 57.493 22.337 109.77 58.807 148.624 21.668-55.072 74.965-91.735 134.73-91.735h46.831c59.905 0 113.311 36.835 134.885 92.121 36.686-38.892 59.172-91.325 59.172-149.01-.001-119.963-97.25-217.212-217.213-217.212"
                           data-original="#000000" />
                     </svg>
                     Messenger
                  </a>
               </li>
               <li>
                  <a href="{{ route('posts.index') }}"
                     class="flex items-center gap-2.5 hover:text-slate-900 dark:hover:text-slate-50 hover:bg-slate-100 dark:hover:bg-neutral-800 rounded-md px-3 py-2 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500">
                     <svg xmlns="http://www.w3.org/2000/svg" class="size-[18px] fill-current overflow-visible"
                        viewBox="0 0 28 28" aria-hidden="true">
                        <switch transform="translate(-1.68 -1.68)scale(1.12)">
                           <g>
                              <path
                                 d="M20 26H8c-3.3 0-6-2.7-6-6V8c0-3.3 2.7-6 6-6h12c3.3 0 6 2.7 6 6v12c0 3.3-2.7 6-6 6M8 4C5.8 4 4 5.8 4 8v12c0 2.2 1.8 4 4 4h12c2.2 0 4-1.8 4-4V8c0-2.2-1.8-4-4-4zm6 16c-.6 0-1-.4-1-1v-4H9c-.6 0-1-.4-1-1s.4-1 1-1h4V9c0-.6.4-1 1-1s1 .4 1 1v4h4c.6 0 1 .4 1 1s-.4 1-1 1h-4v4c0 .6-.4 1-1 1"
                                 data-original="#000000" />
                           </g>
                        </switch>
                     </svg>
                     News Feeds
                  </a>
               </li>
                {{-- <a href="{{ route('posts.index') }}"
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
            </a> --}}
               <li>
                  <a href="#"
                     class="flex items-center gap-2.5 hover:text-slate-900 dark:hover:text-slate-50 hover:bg-slate-100 dark:hover:bg-neutral-800 rounded-md px-3 py-2 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500">
                     <svg xmlns="http://www.w3.org/2000/svg" class="size-[18px] fill-current overflow-visible"
                        viewBox="0 0 512 512" aria-hidden="true">
                        <path
                           d="m347.216 301.211-71.387-53.54V138.609c0-10.966-8.864-19.83-19.83-19.83s-19.83 8.864-19.83 19.83v118.978c0 6.246 2.935 12.136 7.932 15.864l79.318 59.489a19.7 19.7 0 0 0 11.878 3.966c6.048 0 11.997-2.717 15.884-7.952 6.585-8.746 4.8-21.179-3.965-27.743"
                           data-original="#000000" />
                        <path
                           d="M256 0C114.833 0 0 114.833 0 256s114.833 256 256 256 256-114.833 256-256S397.167 0 256 0m0 472.341c-119.275 0-216.341-97.066-216.341-216.341S136.725 39.659 256 39.659c119.295 0 216.341 97.066 216.341 216.341S375.275 472.341 256 472.341"
                           data-original="#000000" />
                     </svg>
                     Schedules
                  </a>
               </li>
            </ul>
         </div>

         <div class="mt-6">
            <div class="text-blue-700 dark:text-slate-50 text-sm font-semibold px-3">Income</div>
            <ul class="mt-3 space-y-1 text-sm text-slate-800 dark:text-slate-400 font-medium">
               <li>
                  <a href="#"
                     class="flex items-center gap-2.5 hover:text-slate-900 dark:hover:text-slate-50 hover:bg-slate-100 dark:hover:bg-neutral-800 rounded-md px-3 py-2 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500">
                     <svg xmlns="http://www.w3.org/2000/svg" class="size-[18px] fill-current overflow-visible"
                        viewBox="0 0 512 512" aria-hidden="true">
                        <path fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="40"
                           d="M492 256c0 130.339-105.661 236-236 236S20 386.339 20 256 125.661 20 256 20s236 105.661 236 236zm-166-50c0-27.614-22.386-50-50-50h-40c-27.614 0-50 22.386-50 50s22.386 50 50 50h40c27.614 0 50 22.386 50 50s-22.386 50-50 50h-40c-27.614 0-50-22.386-50-50m70-150V96m0 320v-60"
                           data-original="#000000" />
                     </svg>
                     Earnings and taxes
                  </a>
               </li>
               <li>
                  <a href="#"
                     class="flex items-center gap-2.5 hover:text-slate-900 dark:hover:text-slate-50 hover:bg-slate-100 dark:hover:bg-neutral-800 rounded-md px-3 py-2 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500">
                     <svg xmlns="http://www.w3.org/2000/svg" class="size-[18px] fill-current overflow-visible"
                        viewBox="0 0 64 64" aria-hidden="true">
                        <path fill-rule="evenodd"
                           d="M14.6 6.688c-7.29 0-13.2 5.862-13.2 13.092V41.6c0 7.23 5.91 13.092 13.2 13.092h24.2a2.2 2.182 0 1 0 0-4.364H14.6A8.8 8.728 0 0 1 5.8 41.6V24.144h52.8v7.637a2.2 2.182 0 1 0 4.4 0V19.78c0-7.23-5.91-13.092-13.2-13.092zm44 13.092H5.8a8.8 8.728 0 0 1 8.8-8.728h35.2a8.8 8.728 0 0 1 8.8 8.728"
                           clip-rule="evenodd" data-original="#000000" />
                        <path
                           d="M63 45.964a8.8 8.728 0 0 0-8.8-8.728H38.8a2.2 2.182 0 1 0 0 4.364h15.4a4.4 4.364 0 0 1 0 8.728h-1.84l.645-.64a2.2 2.182 0 1 0-3.11-3.085l-4.4 4.364a2.2 2.182 0 0 0 0 3.085l4.4 4.364a2.2 2.182 0 1 0 3.11-3.085l-.644-.64H54.2a8.8 8.728 0 0 0 8.8-8.727M12.4 28.508a2.2 2.182 0 1 0 0 4.364h8.8a2.2 2.182 0 1 0 0-4.364z"
                           data-original="#000000" />
                     </svg>
                     Refunds
                  </a>
               </li>
            </ul>
         </div>

         <div class="mt-6">
            <div class="text-blue-700 dark:text-slate-50 text-sm font-semibold px-3">Actions</div>
            <ul class="mt-3 space-y-1 text-sm text-slate-800 dark:text-slate-400 font-medium">
               <li>
                  <a href="#"
                     class="flex items-center gap-2.5 hover:text-slate-900 dark:hover:text-slate-50 hover:bg-slate-100 dark:hover:bg-neutral-800 rounded-md px-3 py-2 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500">
                     <svg xmlns="http://www.w3.org/2000/svg" class="size-[18px] fill-current overflow-visible"
                        viewBox="0 0 512 512" aria-hidden="true">
                        <path
                           d="M253.414 103.434c48.556 0 87.919 40.52 87.919 90.505s-39.363 90.505-87.919 90.505-87.919-40.521-87.919-90.505 39.363-90.505 87.919-90.505m0 36.202c-28.324 0-51.717 24.081-51.717 54.303s23.393 54.303 51.717 54.303 51.717-24.081 51.717-54.303-23.393-54.303-51.717-54.303"
                           data-original="#000000" />
                        <path
                           d="M253.414 0c139.957 0 253.414 113.457 253.414 253.414 0 94.285-51.491 176.544-127.886 220.19-35.728 20.575-77.036 32.582-121.104 33.199l-4.423.025C113.457 506.828 0 393.371 0 253.414S113.457 0 253.414 0m-23.676 346.505c-46.331 0-87.479 29.378-102.607 73.008l-2.339 7.571c35.919 27.232 80.165 42.893 126.504 43.522l5.709-.009c38.24-.62 74.079-11.122 105.072-29.064l19.977-13.243-2.237-6.866c-14.371-44.046-55.062-74.052-101.239-74.901zm23.676-310.303c-119.963 0-217.212 97.249-217.212 217.212 0 57.493 22.337 109.77 58.807 148.624 21.668-55.072 74.965-91.735 134.73-91.735h46.831c59.905 0 113.311 36.835 134.885 92.121 36.686-38.892 59.172-91.325 59.172-149.01-.001-119.963-97.25-217.212-217.213-217.212"
                           data-original="#000000" />
                     </svg>
                     Profile
                  </a>
               </li>
               <li>
                  <a href="#"
                     class="flex items-center gap-2.5 hover:text-slate-900 dark:hover:text-slate-50 hover:bg-slate-100 dark:hover:bg-neutral-800 rounded-md px-3 py-2 transition-colors focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500">
                     <svg xmlns="http://www.w3.org/2000/svg" class="size-[18px] fill-current overflow-visible"
                        viewBox="0 0 32 32" aria-hidden="true">
                        <g data-name="Layer 2">
                           <path
                              d="M24.915 3.663a3.15 3.15 0 0 0-2.688-1.554H9.774a3.15 3.15 0 0 0-2.688 1.554L.859 14.446a3.15 3.15 0 0 0 0 3.15l6.227 10.742a3.15 3.15 0 0 0 2.688 1.554h12.453a3.15 3.15 0 0 0 2.688-1.554l6.226-10.784a3.15 3.15 0 0 0 0-3.15zm4.41 12.841-6.227 10.784a1.05 1.05 0 0 1-.871.504H9.774a1.05 1.05 0 0 1-.872-.504L2.676 16.504a1.05 1.05 0 0 1 0-1.05L8.902 4.713a1.05 1.05 0 0 1 .872-.504h12.453a1.05 1.05 0 0 1 .871.504l6.227 10.783a1.05 1.05 0 0 1 0 1.008"
                              data-original="#000000" />
                           <path
                              d="M16 9.7a6.3 6.3 0 1 0 6.3 6.3A6.3 6.3 0 0 0 16 9.7m0 10.5a4.2 4.2 0 1 1 4.2-4.2 4.2 4.2 0 0 1-4.2 4.2"
                              data-original="#000000" />
                        </g>
                     </svg>
                     Settings
                  </a>
               </li>
            </ul>
         </div>
      </nav>
   </aside>
   <main class="ml-[264px] w-full  mx-auto">
     <div class="p-6 bg-slate-100 dark:bg-neutral-900">
    {{ $slot }}
    </div>
   </main>
</body>

</html>