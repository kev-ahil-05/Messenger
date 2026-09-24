<x-app-layout>
    <!-- Inalis ang standard header at padding wrappers para sumakop sa buong screen ang Messenger -->
    <div class="flex h-[calc(100vh-4rem)] w-full bg-white overflow-hidden rounded-sm">

        <!-- 1. LEFT SIDEBAR: Listahan ng mga Chats (Ginawang fixed width na standard) -->
        <div class="w-64  h-full border-r border-gray-200 flex flex-col flex-wrap bg-white flex-shrink-0">
            <!-- Sidebar Header -->
            <div class="p-4 border-b border-gray-100">
                <h1 class="text-2xl font-black text-gray-800">Chats</h1>
                <div class="mt-2">
                    <input name="search" value="{{ $search }}" type="text" placeholder="Search Messenger"
                        class="w-full bg-gray-100 text-sm rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
            </div>

            <!-- Mini Listahan -->
            <div class="flex-1 overflow-y-auto p-2 space-y-1">
                <div class="flex items-center gap-3 p-3 bg-indigo-50 rounded-xl cursor-pointer">
                    <div class="flex-1 min-w-0">
                        <h1 class="font-bold text-lg mx-2 ">List of Users</h1>
                        <div class="flex justify-between items-baseline">

                            <select
                                class="w-full bg-transparent border-none text-sm font-semibold text-gray-700 focus:ring-0 cursor-pointer">
                                @foreach ($users as $user)
                                    <option value="{{ $user->name }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2. RIGHT SIDE: Chat Window (Dito natin nilagyan ng max-width para maging compact) -->
        <div class="flex-1 h-full flex flex-col bg-gray-50 items-center">

            <!-- Inner Wrapper para maging siksik ang gitna pero responsive pa rin -->
            <div class="w-full max-w-3xl h-full flex flex-col bg-white border-x border-gray-200 shadow-sm">

                <!-- Chat Header -->
                <div
                    class="h-16 border-b border-slate-250 bg-slate-100 flex items-center flex-wrap justify-between px-6 z-10 flex-shrink-0 relative">

                    <!-- 1. PAMAGAT (Naka-center nang perpekto sa buong lapad ng header) -->
                    <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                        <h1 class="font-black text-xl text-slate-800 tracking-wide">ePLGU Global Chat</h1>
                    </div>

                    <!-- 2. KALIWANG BAHAGI (Pwedeng iwanang blangko o lagyan ng menu icon sa hinaharap) -->
                    <div>
                        <image scr=""></image>
                    </div>

                    <!-- 3. KANANG BAHAGI (Ang iyong Profile Avatar at Pangalan) -->
                    <div class="flex gap-3 items-center z-20">
                        <div class="text-right">
                            <h2 class="font-bold text-sm text-gray-800 leading-tight">{{ Auth::user()->name }}</h2>
                            <p class="text-[11px] text-green-500 font-medium">Online</p>
                        </div>
                        <div
                            class="w-10 h-10 rounded-full bg-indigo-500 flex items-center justify-center text-white font-bold shadow-sm select-none">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                    </div>

                </div>


                <!-- Chat Messages Container (Mas maliit ang padding para compact) -->
                <div id="chat-container"
                    class="flex-1 overflow-y-auto p-4 space-y-3 flex flex-col scroll-smooth bg-gray-50/50 rounded-sm">
                    @foreach ($userMessages as $msg)
                        <div
                            class="flex flex-col max-w-[80%] {{ $msg->users_id === auth()->id() ? 'self-end items-end' : 'self-start items-start' }}">

                            <div class="flex items-end gap-2">
                                <!-- Avatar ng ibang user -->
                                @if ($msg->users_id !== auth()->id())
                                    <div
                                        class="w-7 h-7 rounded-full bg-indigo-500 flex items-center justify-center text-white text-xs font-bold flex-shrink-0 shadow-sm">
                                        {{ substr($msg->user->name, 0, 1) }}
                                    </div>
                                @endif

                                <!-- Chat Bubble (Mas compact ang padding) -->
                                <div
                                    class="px-3.5 py-2 text-sm shadow-sm rounded-2xl {{ $msg->users_id === auth()->id() ? 'bg-indigo-600 text-white rounded-br-none' : 'bg-white text-gray-800 border border-gray-200 rounded-bl-none' }}">
                                    <p class="break-words leading-relaxed">{{ $msg->message }}</p>
                                </div>
                            </div>

                            <!-- Meta info: Name and Time -->
                            <div class="flex items-center gap-1.5 mt-1 px-2 text-[10px] text-gray-400">
                                <button onclick ="edit()"><i class="fa-solid fa-pen-to-square text-sm"></i>edit</button>
                                <span class="font-semibold">{{ $msg->user->name ?? 'Unknown' }}</span>
                                <span>•</span>
                                <span>{{ $msg->created_at ? $msg->created_at->timezone('Asia/Manila')->format('h:i A') : '' }}</span>
                            </div>

                        </div>
                    @endforeach
                </div>


                <div id="editmsg"
                    class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 backdrop-blur-sm hidden">


                    <div class="bg-white rounded-2xl w-full max-w-lg p-5 shadow-2xl border border-gray-100 relative">


                        <button onclick="closeEditModal()"
                            class="absolute top-3 right-3 text-gray-400 hover:text-gray-600 p-1.5 rounded-full hover:bg-gray-100 transition-all cursor-pointer">

                            <i class="fa-solid fa-xmark text-lg"></i>
                        </button>


                        <h3 class="text-base font-bold text-gray-800 mb-4 flex items-center gap-2">
                            <i class="fa-solid fa-pen-to-square text-indigo-600"></i> Edit Message
                        </h3>


                        <!-- Tinanggal muna ang permanenteng route sa action para lagyan ng JavaScript mamaya -->
                        <form id="edit-message-form" action="" method="POST" class="flex items-center gap-2">
                            @csrf
                            @method('PUT')

                            <div class="flex-1 relative">
                                <input type="text" name="message" id="edit-input" placeholder="Edit your message..."
                                    required autocomplete="off"
                                    class="w-full bg-gray-100 hover:bg-gray-200/70 focus:bg-white border border-transparent focus:border-gray-300 rounded-full py-2.5 px-4 text-sm transition-all focus:outline-none focus:ring-2 focus:ring-indigo-500/20">
                            </div>

                            <button type="submit"
                                class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold px-5 py-2.5 rounded-full text-sm transition-all shadow-sm cursor-pointer flex-shrink-0">
                                Save
                            </button>
                        </form>


                    </div>
                </div>


                <!-- Chat Input Form -->
                <div class="p-3 bg-white border-t border-gray-200 flex-shrink-0">
                    <form action="{{ route('message.store') }}" method="POST" class="flex items-center gap-2">
                        @csrf
                        <div class="flex-1 relative">
                            <input type="text" name="message" placeholder="Aa" required autocomplete="off"
                                class="w-full bg-gray-100 hover:bg-gray-200/70 focus:bg-white border border-transparent focus:border-gray-300 rounded-full py-2.5 px-4 text-sm transition-all focus:outline-none focus:ring-2 focus:ring-indigo-500/20">
                        </div>
                        <button type="submit"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold px-4 py-2.5 rounded-full text-sm transition-all shadow-sm cursor-pointer flex-shrink-0">
                            Send
                        </button>
                    </form>
                </div>

            </div>

        </div>
    </div>

    <script>
    // 1. Awtomatikong pag-scroll sa pinakailalim ng chat kapag nag-load ang page
    document.addEventListener("DOMContentLoaded", function() {
        const chatContainer = document.getElementById('chat-container');
        if (chatContainer) {
            chatContainer.scrollTop = chatContainer.scrollHeight;
        }
    });

    // 2. Function para sa pag-edit ng mensahe (Pinagsama-sama sa loob ng bracket)
    function edit(messageId, currentMessage) {
        // Ipakita ang edit modal box sa screen
        document.getElementById('editmsg').classList.remove('hidden');

        // I-set ang kasalukuyang text ng mensahe sa loob ng input field para ma-edit ng user
        document.getElementById('edit-input').value = currentMessage;

        // Baguhin ang action URL ng form para maituro sa tamang Message ID (Inayos ang backtick)
        const form = document.getElementById('edit-message-form');
        form.action = `/message/${messageId}`;
    }
</script>

</x-app-layout>
