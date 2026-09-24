<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex h-screen w-screen bg-gray-100 overflow-hidden">

        <!-- Isama ang Sidebar Code dito -->


        <!-- Ang Pangunahing Content Box sa Kanan -->
        <main class="flex-1 h-full flex flex-col overflow-y-auto bg-gray-50">
            <!-- Dito papasok ang iyong mga tables, forms, o ang ginawa nating Messenger view -->

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 shadow-sm border-b border-gray-200 bg-slate-50">
                            {{ __("You're logged in!") }} {{ Auth::user()->name }}

                        </div>
                    </div>
                </div>
            </div>
            @yield('content')
        </main>

    </div>

</x-app-layout>
