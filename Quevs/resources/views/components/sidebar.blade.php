 <aside class="w-64 h-full fixed bg-gray-900 text-gray-300 flex flex-col border-r border-gray-800 flex-shrink-0">

    <!-- 1. SIDEBAR HEADER / BRANDING -->
    <div class="h-16 flex items-center px-6 border-b border-gray-800 bg-gray-950 gap-2 flex-shrink-0">
        <!-- Logo Icon -->
        <div class="w-8 h-8 rounded-lg bg-indigo-600 flex items-center justify-center text-white font-black shadow-md shadow-indigo-500/20">
            Q
        </div>
        <div>
            <h1 class="font-bold text-white text-sm leading-none">QuevsApp</h1>
            <span class="text-[10px] text-gray-500 font-medium tracking-wider uppercase">Main Panel</span>
        </div>
    </div>

    <!-- 2. NAVIGATION LINKS (Scrollable Area) -->
    <nav class="flex-1 overflow-y-auto px-4 py-6 space-y-1.5">

        <!-- Category Group Label -->
        <p class="px-3 text-[11px] font-bold text-gray-500 uppercase tracking-wider mb-2">Navigation</p>

        <!-- Active Link Item -->
        <a href="#" class="flex items-center gap-3 px-3 py-2.5 text-sm font-semibold rounded-xl transition-all duration-200 bg-indigo-600 text-white shadow-lg shadow-indigo-600/10">
            <!-- Icon Dashboard -->
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V16zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V16z"/></svg>
            Dashboard
        </a>

        <!-- Inactive Link Item -->
        <a href="#" class="flex items-center gap-3 px-3 py-2.5 text-sm font-semibold rounded-xl text-gray-400 hover:bg-gray-800/60 hover:text-gray-200 transition-all duration-200 group">
            <!-- Icon Messages -->
            <svg class="w-5 h-5 text-gray-500 group-hover:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
            Messages
            <!-- Optional Notification Badge -->
            <span class="ml-auto bg-indigo-500/20 text-indigo-400 text-xs font-bold px-2 py-0.5 rounded-full">1</span>
        </a>

    </nav>

    <!-- 3. SIDEBAR FOOTER (User/Profile Session) -->
    <div class="p-4 border-t border-gray-800 bg-gray-950/50 flex items-center justify-between flex-shrink-0">
        <div class="flex items-center gap-3 min-w-0">
            <div class="w-9 h-9 rounded-full bg-gray-800 flex items-center justify-center text-sm font-bold text-indigo-400 border border-gray-700 flex-shrink-0">
                US
            </div>
            <div class="min-w-0">
                <p class="text-sm font-semibold text-white truncate">User Name</p>
                <p class="text-[11px] text-gray-500 truncate">user@example.com</p>
            </div>
        </div>
    </div>

</aside>


