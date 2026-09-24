<x-app-layout>

     <div class="p-3 bg-white border-t border-gray-200 flex-shrink-0">
                    <form action="{{ route('message.update') }}" method="POST" class="flex items-center gap-2">
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

</x-app-layout>
