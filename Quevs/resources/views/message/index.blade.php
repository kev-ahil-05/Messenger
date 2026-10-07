<x-app-layout>
    <!-- Main Screen Container -->
    <div class="flex h-[calc(100vh-4rem)] w-full bg-slate-50 overflow-hidden">

        <!-- 1. LEFT SIDEBAR: Listahan ng mga Chats -->
        <div class="w-72 h-full border-r border-slate-200 flex flex-col bg-white flex-shrink-0 shadow-sm">
            <!-- Sidebar Header -->
            <div class="p-4 border-b border-slate-100 bg-white">
                <h1 class="text-xl font-bold text-slate-900 tracking-tight">Chats</h1>
                <div class="mt-2 relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                        <i class="fa-solid fa-magnifying-glass text-xs"></i>
                    </span>
                    <input name="search" value="{{ $search ?? '' }}" type="text" placeholder="Search Messenger"
                        class="w-full bg-slate-100 text-xs rounded-lg pl-9 pr-4 py-2 border border-transparent focus:bg-white focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-100 transition-all">
                </div>
            </div>

            <!-- Listahan ng mga Users / Active Contacts -->
            <div class="flex-1 overflow-y-auto p-3 space-y-2 bg-slate-50/50">
                <div class="bg-white border border-slate-200 rounded-xl p-3 shadow-sm">
                    <label class="block text-[11px] font-semibold text-slate-400 uppercase tracking-wider mb-1.5 px-1">Active Users</label>
                    <div class="relative">
                        <select class="w-full bg-slate-50 border border-slate-200 rounded-lg text-sm font-medium text-slate-700 py-2 px-3 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 outline-none cursor-pointer appearance-none">
                            @foreach ($users as $user)
                                <option value="{{ $user->name }}">🟢 {{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2. RIGHT SIDE: Chat Window -->
        <div class="flex-1 h-full flex flex-col bg-slate-100 items-center justify-between">

            <!-- Inner Content Wrapper -->
            <div class="w-full max-w-4xl h-full flex flex-col bg-white border-x border-slate-200 shadow-inner relative">

                <!-- Chat Header -->
                <div class="h-16 border-b border-slate-200 bg-white flex items-center justify-between px-6 z-10 flex-shrink-0 shadow-sm">

                    <!-- Title Room -->
                    <div class="flex items-center gap-2">
                        <div class="w-2.5 h-2.5 bg-emerald-500 rounded-full animate-pulse"></div>
                        <h1 class="font-bold text-slate-800 tracking-tight">ePLGU Global Chat</h1>
                    </div>

                    <!-- Profile Avatar and User Info -->
                    <div class="flex gap-3 items-center">
                        <div class="text-right">
                            <h2 class="font-semibold text-sm text-slate-800 leading-tight">{{ Auth::user()->name }}</h2>
                            <p class="text-[11px] text-emerald-600 font-medium">Account Owner</p>
                        </div>
                        <div class="w-9 h-9 rounded-full bg-gradient-to-tr from-indigo-600 to-violet-500 flex items-center justify-center text-white text-sm font-bold shadow-sm select-none">
                            {{ substr(Auth::user()->name, 0, 2) }}
                        </div>
                    </div>
                </div>

                <!-- Chat Messages Container -->
                <div id="chat-container" class="flex-1 overflow-y-auto p-6 space-y-4 flex flex-col bg-slate-50">
                    @foreach ($userMessages as $msg)
                        <div class="flex flex-col max-w-[75%] {{ $msg->users_id === auth()->id() ? 'self-end items-end' : 'self-start items-start' }}">

                            <div class="flex items-end gap-2.5">
                                <!-- Other User Avatar -->
                                @if ($msg->users_id !== auth()->id())
                                    <div class="w-8 h-8 rounded-full bg-indigo-100 text-indigo-700 flex items-center justify-center font-bold text-xs shadow-sm flex-shrink-0 uppercase border border-indigo-200">
                                        {{ substr($msg->user->name ?? 'A', 0, 2) }}
                                    </div>
                                @endif

                                <!-- Chat Bubble -->
                                <div class="px-4 py-2.5 text-sm shadow-sm rounded-2xl leading-relaxed transition-all duration-150 {{ $msg->users_id === auth()->id() ? 'bg-indigo-600 text-white rounded-tr-none' : 'bg-white text-slate-800 border border-slate-200 rounded-tl-none' }}">
                                    <p class="break-words whitespace-pre-line">{{ $msg->message }}</p>
                                </div>
                            </div>

                            <!-- Meta Details & Action Controls -->
                            <div class="flex items-center gap-2 mt-1 px-2 text-[10px] text-slate-400">
                                <span class="font-medium text-slate-500">{{ $msg->user->name ?? 'Unknown' }}</span>
                                <span>•</span>
                                <span class="text-slate-400">{{ $msg->created_at ? $msg->created_at->timezone('Asia/Manila')->format('g:i A') : '' }}</span>

                                <!-- Edit button for message owner -->
                                @if ($msg->users_id === auth()->id())
                                    <span>•</span>
                                    <button onclick="openEditModal('{{ $msg->id }}', '{{ addslashes($msg->message) }}')"
                                            class="text-indigo-600 hover:text-indigo-800 font-semibold flex items-center gap-0.5 transition-colors cursor-pointer">
                                        <i class="fa-solid fa-pen-to-square text-[9px]"></i> Edit
                                    </button>
                                @endif
                            </div>

                        </div>
                    @endforeach
                </div>

                <!-- Chat Input Footer Form -->
                <div class="p-4 bg-white border-t border-slate-200">
                    <form action="{{ route('message.store') }}" method="POST" class="flex items-center gap-3">
                        @csrf
                        <input type="text" name="message" required autocomplete="off" placeholder="Write a message..."
                            class="flex-1 bg-slate-50 border border-slate-200 focus:bg-white rounded-xl py-2.5 px-4 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all">
                        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-5 py-2.5 rounded-xl text-sm transition-all shadow-md active:scale-95 cursor-pointer">
                            <i class="fa-solid fa-paper-plane mr-1"></i> Send
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- EDIT MODAL LAYER (Hidden by default) --> {{--  <div id="editmsg" class="fixed inset-0 z-50 flex items-center justify-center bg-slate-900/60 backdrop-blur-sm hidden animate-fade-in">
        <div class="bg-white rounded-2xl w-full max-w-md p-6 shadow-2xl border border-slate-100 relative mx-4">

            <!-- Close Button -->
            <button onclick="closeEditModal()" class="absolute top-4 right-4 text-slate-400 hover:text-slate-600 p-1 rounded-full hover:bg-slate-100 transition-all cursor-pointer">
                <i class="fa-solid fa-xmark text-sm"></i>
            </button>

            <h3 class="text-base font-bold text-slate-900 mb-4 flex items-center gap-2">
                <i class="fa-solid fa-pen-to-square text-indigo-600"></i> Edit Message
            </h3>

            <!-- Form para sa Edit Update --> {{--
            <form action="{{ route('message.update') }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <!-- Hidden Input para sa ID ng message -->
                <input type="hidden" id="edit-id" name="message_id">

                <div class="w-full">
                    <textarea name="message" id="edit-input" rows="3" required placeholder="Update your text here..."
                        class="w-full bg-slate-50 border border-slate-200 focus:bg-white rounded-xl p-3 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all resize-none"></textarea>
                </div>

                <div class="flex justify-end gap-2">
                    <button type="button" onclick="closeEditModal()" class="px-4 py-2 border border-slate-200 text-slate-600 font-semibold rounded-xl text-xs hover:bg-slate-50 transition-all cursor-pointer">
                        Cancel
                    </button>
                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-5 py-2 rounded-xl text-xs transition-all shadow-md cursor-pointer">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div> --}}


    <!-- JAVASCRIPT LOGIC -->
    <script>
        // Automatic auto-scroll sa pinakailalim ng chat feed
        const chatContainer = document.getElementById('chat-container');
        if (chatContainer) {
            chatContainer.scrollTop = chatContainer.scrollHeight;
        }

        function openEditModal(){
            document.getElementById('editmsg').classList.remove('hidden');
        }
           window.openEditModal = openEditModal;

          function closeEditModal(){
            document.getElementById('editmsg').classList.remove('hidden');
        }
        window.closeEditModal = closeEditModal;

        </script>

        </x-app-layout>
