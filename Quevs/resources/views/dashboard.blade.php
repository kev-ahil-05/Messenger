


<x-layout>
   <div class="p-6 bg-slate-100 dark:bg-neutral-900 min-h-screen">
        <x-slot name="header">
        <div class="flex items-center gap-2">
            <i class="fa-solid fa-chart-pie text-indigo-600"></i>
            <h2 class="font-bold text-xl text-slate-800 leading-tight">
                {{ __('Dashboard Overview') }}
            </h2>
        </div>
    </x-slot>

    <!-- Main Dashboard Container (Inalis ang h-screen/w-screen para sumunod sa master layout) -->

    <div class="space-y-8 animate-fade-in pb-12 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Feature 1: Modern Welcome Banner & Quick Notification -->
        <div class="bg-gradient-to-r from-indigo-600 via-indigo-700 to-violet-700 rounded-2xl p-6 md:p-8 shadow-lg shadow-indigo-100 relative overflow-hidden text-white">
            <div class="relative z-10 space-y-2">
                <span class="bg-white/20 backdrop-blur-md px-3 py-1 rounded-full text-xs font-semibold tracking-wide uppercase">
                    ✨ System Status: Optimal
                </span>
                <h1 class="text-2xl md:text-3xl font-black tracking-tight">
                    Mabuhay, {{ Auth::user()->name }}!
                </h1>
                <p class="text-indigo-100 text-sm max-w-md font-medium leading-relaxed">
                    {{ __("You're successfully logged in!") }} Welcome back to your hub. Monitor your engagement and manage your talks today.
                </p>
            </div>
            <!-- Decorative Background Glows -->
            <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-white/10 rounded-full blur-2xl"></div>
            <div class="absolute right-1/4 -top-10 w-24 h-24 bg-violet-500/30 rounded-full blur-xl"></div>
        </div>

        <!-- Feature 2: Analytics / Statistics Cards Counters -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            <!-- Card 1: Total Posts -->
            <div class="card bg-white border border-slate-200 p-5 rounded-xl shadow-sm hover:shadow-md transition-all flex flex-row items-center gap-4 group">
                <div class="p-3 bg-indigo-50 text-indigo-600 rounded-xl group-hover:bg-indigo-600 group-hover:text-white transition-all">
                    <i class="fa-solid fa-square-rss text-xl"></i>
                </div>
                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Posts</p>
                    <h3 class="text-2xl font-black text-slate-800 mt-0.5">142</h3>
                </div>
            </div>

            <!-- Card 2: Total Messages -->
            <div class="card bg-white border border-slate-200 p-5 rounded-xl shadow-sm hover:shadow-md transition-all flex flex-row items-center gap-4 group">
                <div class="p-3 bg-emerald-50 text-emerald-600 rounded-xl group-hover:bg-emerald-600 group-hover:text-white transition-all">
                    <i class="fa-solid fa-paper-plane text-xl"></i>
                </div>
                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Messages Sent</p>
                    <h3 class="text-2xl font-black text-slate-800 mt-0.5">1,248</h3>
                </div>
            </div>

            <!-- Card 3: Active Users -->
            <div class="card bg-white border border-slate-200 p-5 rounded-xl shadow-sm hover:shadow-md transition-all flex flex-row items-center gap-4 group">
                <div class="p-3 bg-amber-50 text-amber-600 rounded-xl group-hover:bg-amber-600 group-hover:text-white transition-all">
                    <i class="fa-solid fa-users text-xl"></i>
                </div>
                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Active Peers</p>
                    <h3 class="text-2xl font-black text-slate-800 mt-0.5">18</h3>
                </div>
            </div>

            <!-- Card 4: Engagement Rate -->
            <div class="card bg-white border border-slate-200 p-5 rounded-xl shadow-sm hover:shadow-md transition-all flex flex-row items-center gap-4 group">
                <div class="p-3 bg-rose-50 text-rose-600 rounded-xl group-hover:bg-rose-600 group-hover:text-white transition-all">
                    <i class="fa-solid fa-heart text-xl"></i>
                </div>
                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Engagement</p>
                    <h3 class="text-2xl font-black text-slate-800 mt-0.5">94.2%</h3>
                </div>
            </div>
        </div>

        <!-- Two Column Main Layout Split -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- Column 1 & 2: Quick Actions & Live Activity (Lapad) -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Feature 3: Quick Navigation Buttons Shortcuts -->
                <div class="card bg-white border border-slate-200 rounded-xl shadow-sm p-6">
                    <h3 class="font-bold text-slate-800 text-sm uppercase tracking-wider mb-4 flex items-center gap-2">
                        <i class="fa-solid fa-wand-magic-sparkles text-indigo-500"></i> Quick Actions
                    </h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <a href="{{ route('posts.index') }}" class="flex items-center justify-between p-4 border border-slate-100 hover:border-indigo-100 bg-slate-50 hover:bg-indigo-50/30 rounded-xl transition-all group">
                            <div class="flex items-center gap-3">
                                <div class="bg-white p-2 rounded-lg text-indigo-600 shadow-sm"><i class="fa-solid fa-pen"></i></div>
                                <div class="text-left">
                                    <p class="font-bold text-sm text-slate-800">Create New Post</p>
                                    <p class="text-xs text-slate-400">Share something on the feed</p>
                                </div>
                            </div>
                            <i class="fa-solid fa-chevron-right text-xs text-slate-300 group-hover:text-indigo-500 transition-colors"></i>
                        </a>

                        <a href="{{ route('message.index') }}" class="flex items-center justify-between p-4 border border-slate-100 hover:border-violet-100 bg-slate-50 hover:bg-violet-50/30 rounded-xl transition-all group">
                            <div class="flex items-center gap-3">
                                <div class="bg-white p-2 rounded-lg text-violet-600 shadow-sm"><i class="fa-solid fa-comments"></i></div>
                                <div class="text-left">
                                    <p class="font-bold text-sm text-slate-800">Open Messenger</p>
                                    <p class="text-xs text-slate-400">Chat with online members</p>
                                </div>
                            </div>
                            <i class="fa-solid fa-chevron-right text-xs text-slate-300 group-hover:text-violet-500 transition-colors"></i>
                        </a>
                    </div>
                </div>

                <!-- Feature 4: Recent Network Activity Timeline -->
                <div class="card bg-white border border-slate-200 rounded-xl shadow-sm p-6">
                    <h3 class="font-bold text-slate-800 text-sm uppercase tracking-wider mb-4 flex items-center gap-2">
                        <i class="fa-solid fa-clock-rotate-left text-indigo-500"></i> Recent Platform Activity
                    </h3>
                    <div class="flow-root">
                        <ul class="-mb-8">
                            <!-- Item 1 -->
                            <li>
                                <div class="relative pb-6">
                                    <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-slate-200" aria-hidden="true"></span>
                                    <div class="relative flex space-x-3">
                                        <div>
                                            <span class="h-8 w-8 rounded-full bg-indigo-50 flex items-center justify-center text-indigo-600 ring-8 ring-white">
                                                <i class="fa-solid fa-comment-dots text-xs"></i>
                                            </span>
                                        </div>
                                        <div class="flex-1 min-w-0 pt-1.5 flex justify-between space-x-4">
                                            <div>
                                                <p class="text-xs text-slate-600">Juan Dela Cruz posted a update <span class="font-semibold text-slate-800">"Hello World!"</span></p>
                                            </div>
                                            <div class="text-right text-[10px] whitespace-nowrap text-slate-400 font-medium">3 mins ago</div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- Item 2 -->
                            <li>
                                <div class="relative pb-6">
                                    <div class="relative flex space-x-3">
                                        <div>
                                            <span class="h-8 w-8 rounded-full bg-emerald-50 flex items-center justify-center text-emerald-600 ring-8 ring-white">
                                                <i class="fa-solid fa-user-plus text-xs"></i>
                                            </span>
                                        </div>
                                        <div class="flex-1 min-w-0 pt-1.5 flex justify-between space-x-4">
                                            <div>HI user</div>
                                        </div>
     
   </div>

</x-layout>
