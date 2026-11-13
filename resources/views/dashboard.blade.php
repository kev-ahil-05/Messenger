<x-app-layout>
    <!-- Include Chart.js via CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="p-6 bg-slate-100 dark:bg-neutral-900 min-h-screen">
        <x-slot name="header">
            <div class="flex items-center gap-2">
                <i class="fa-solid fa-chart-pie text-indigo-600"></i>
                <h2 class="font-bold text-xl text-slate-800 dark:text-slate-100 leading-tight">
                    {{ __('Dashboard Overview') }}
                </h2>
            </div>
        </x-slot>

        <div class="space-y-8 animate-fade-in pb-12 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Feature 1: Modern Welcome Banner & Quick Notification -->
            <div class="bg-gradient-to-r from-indigo-600 via-indigo-700 to-violet-700 rounded-2xl p-6 md:p-8 shadow-lg shadow-indigo-100 dark:shadow-none relative overflow-hidden text-white">
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
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                <!-- Card 1: Total Posts -->
                <div class="card bg-white dark:bg-neutral-800 border border-slate-200 dark:border-neutral-700 p-5 rounded-xl shadow-sm hover:shadow-md transition-all flex flex-row items-center gap-4 group">
                    <div class="p-3 bg-indigo-50 dark:bg-indigo-900/40 text-indigo-600 dark:text-indigo-400 rounded-xl group-hover:bg-indigo-600 group-hover:text-white transition-all">
                        <i class="fa-solid fa-square-rss text-xl"></i>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Posts</p>
                        <h3 class="text-2xl font-black text-slate-800 dark:text-slate-100 mt-0.5">{{ $post }}</h3>
                    </div>
                </div>

                <!-- Card 2: Total Messages -->
                <div class="card bg-white dark:bg-neutral-800 border border-slate-200 dark:border-neutral-700 p-5 rounded-xl shadow-sm hover:shadow-md transition-all flex flex-row items-center gap-4 group">
                    <div class="p-3 bg-emerald-50 dark:bg-emerald-900/40 text-emerald-600 dark:text-emerald-400 rounded-xl group-hover:bg-emerald-600 group-hover:text-white transition-all">
                        <i class="fa-solid fa-paper-plane text-xl"></i>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Messages Sent</p>
                        <h3 class="text-2xl font-black text-slate-800 dark:text-slate-100 mt-0.5">{{ $message }}</h3>
                    </div>
                </div>

                <div class="card bg-white dark:bg-neutral-800 border border-slate-200 dark:border-neutral-700 p-5 rounded-xl shadow-sm hover:shadow-md transition-all flex flex-row items-center gap-4 group">
                    <div class="p-3 bg-white-50 dark:bg-slate-900/40 text-white-600 dark:text-emerald-400 rounded-xl group-hover:bg-emerald-600 group-hover:text-white transition-all">
                        <i class="fa-solid fa-user text-xl"></i>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total users</p>
                        <h3 class="text-2xl font-black text-slate-800 dark:text-slate-100 mt-0.5">{{ $users }}</h3>
                    </div>
                </div>
            </div>

            <!-- NEW SECTION: Charts & Visual Analytics -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Bar Chart: Posts vs Messages Comparison -->
                <div class="lg:col-span-2 card bg-white dark:bg-neutral-800 border border-slate-200 dark:border-neutral-700 rounded-xl shadow-sm p-6">
                    <h3 class="font-bold text-slate-800 dark:text-slate-100 text-sm uppercase tracking-wider mb-4 flex items-center gap-2">
                        <i class="fa-solid fa-chart-column text-indigo-500"></i> Posts & Messages Overview
                    </h3>
                    <div class="relative h-64 w-full">
                        <canvas id="activityBarChart"></canvas>
                    </div>
                </div>

                <!-- Doughnut Chart: Activity Distribution -->
                <div class="card bg-white dark:bg-neutral-800 border border-slate-200 dark:border-neutral-700 rounded-xl shadow-sm p-6">
                    <h3 class="font-bold text-slate-800 dark:text-slate-100 text-sm uppercase tracking-wider mb-4 flex items-center gap-2">
                        <i class="fa-solid fa-chart-pie text-violet-500"></i> Content Ratio
                    </h3>
                    <div class="relative h-64 w-full flex items-center justify-center">
                        <canvas id="activityDoughnutChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Two Column Main Layout Split -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Column 1 & 2: Quick Actions -->
                <div class="lg:col-span-2 space-y-6">
                    <div class="card bg-white dark:bg-neutral-800 border border-slate-200 dark:border-neutral-700 rounded-xl shadow-sm p-6">
                        <h3 class="font-bold text-slate-800 dark:text-slate-100 text-sm uppercase tracking-wider mb-4 flex items-center gap-2">
                            <i class="fa-solid fa-wand-magic-sparkles text-indigo-500"></i> Quick Actions
                        </h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <a href="{{ route('posts.index') }}"
                                class="flex items-center justify-between p-4 border border-slate-100 dark:border-neutral-700 hover:border-indigo-100 bg-slate-50 dark:bg-neutral-900/50 hover:bg-indigo-50/30 rounded-xl transition-all group">
                                <div class="flex items-center gap-3">
                                    <div class="bg-white dark:bg-neutral-800 p-2 rounded-lg text-indigo-600 dark:text-indigo-400 shadow-sm">
                                        <i class="fa-solid fa-pen"></i>
                                    </div>
                                    <div class="text-left">
                                        <p class="font-bold text-sm text-slate-800 dark:text-slate-200">Create New Post</p>
                                        <p class="text-xs text-slate-400">Share something on the feed</p>
                                    </div>
                                </div>
                                <i class="fa-solid fa-chevron-right text-xs text-slate-300 group-hover:text-indigo-500 transition-colors"></i>
                            </a>

                            <a href="{{ route('message.index') }}"
                                class="flex items-center justify-between p-4 border border-slate-100 dark:border-neutral-700 hover:border-violet-100 bg-slate-50 dark:bg-neutral-900/50 hover:bg-violet-50/30 rounded-xl transition-all group">
                                <div class="flex items-center gap-3">
                                    <div class="bg-white dark:bg-neutral-800 p-2 rounded-lg text-violet-600 dark:text-violet-400 shadow-sm">
                                        <i class="fa-solid fa-comments"></i>
                                    </div>
                                    <div class="text-left">
                                        <p class="font-bold text-sm text-slate-800 dark:text-slate-200">Open Messenger</p>
                                        <p class="text-xs text-slate-400">Chat with online members</p>
                                    </div>
                                </div>
                                <i class="fa-solid fa-chevron-right text-xs text-slate-300 group-hover:text-violet-500 transition-colors"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Column 3: Platform Activity Timeline -->
                <div class="card bg-white dark:bg-neutral-800 border border-slate-200 dark:border-neutral-700 rounded-xl shadow-sm p-6">
                    <h3 class="font-bold text-slate-800 dark:text-slate-100 text-sm uppercase tracking-wider mb-4 flex items-center gap-2">
                        <i class="fa-solid fa-clock-rotate-left text-indigo-500"></i> Recent Platform Activity
                    </h3>
                    <div class="flow-root">
                        <ul class="space-y-4">
                            <li class="flex items-center gap-3 text-xs text-slate-600 dark:text-slate-300">
                                <span class="h-8 w-8 rounded-full bg-indigo-50 dark:bg-indigo-900/40 flex items-center justify-center text-indigo-600 dark:text-indigo-400 shrink-0">
                                    <i class="fa-solid fa-comment-dots text-xs"></i>
                                </span>
                                <div>
                                    <p class="font-medium text-slate-800 dark:text-slate-200">New post created</p>
                                    <p class="text-slate-400 text-[10px]">Just now</p>
                                </div>
                            </li>
                            <li class="flex items-center gap-3 text-xs text-slate-600 dark:text-slate-300">
                                <span class="h-8 w-8 rounded-full bg-emerald-50 dark:bg-emerald-900/40 flex items-center justify-center text-emerald-600 dark:text-emerald-400 shrink-0">
                                    <i class="fa-solid fa-paper-plane text-xs"></i>
                                </span>
                                <div>
                                    <p class="font-medium text-slate-800 dark:text-slate-200">Message sent in Chat</p>
                                    <p class="text-slate-400 text-[10px]">5 mins ago</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Chart Initialization Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const postsCount = {{ $post ?? 0 }};
            const messagesCount = {{ $message ?? 0 }};

            // Bar Chart Config
            const ctxBar = document.getElementById('activityBarChart').getContext('2d');
            new Chart(ctxBar, {
                type: 'bar',
                data: {
                    labels: ['Posts', 'Messages'],
                    datasets: [{
                        label: 'Total Count',
                        data: [postsCount, messagesCount],
                        backgroundColor: [
                            'rgba(79, 70, 229, 0.85)', // Indigo
                            'rgba(16, 185, 129, 0.85)'  // Emerald
                        ],
                        borderColor: [
                            '#4f46e5',
                            '#10b981'
                        ],
                        borderWidth: 1.5,
                        borderRadius: 8
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: { precision: 0 }
                        }
                    }
                }
            });

            // Doughnut Chart Config
            const ctxDoughnut = document.getElementById('activityDoughnutChart').getContext('2d');
            new Chart(ctxDoughnut, {
                type: 'doughnut',
                data: {
                    labels: ['Posts', 'Messages'],
                    datasets: [{
                        data: [postsCount, messagesCount],
                        backgroundColor: [
                            '#6366f1', // Indigo 500
                            '#10b981'  // Emerald 500
                        ],
                        hoverOffset: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });
        });
    </script>
</x-app-layout>