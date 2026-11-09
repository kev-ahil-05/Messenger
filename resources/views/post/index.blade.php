<x-app-layout>
    <div class="p-6 bg-slate-100 dark:bg-neutral-900 min-h-screen">
        <x-slot name="header">
            <span class="text-indigo-600 font-bold">News Feed</span>
        </x-slot>

        <!-- Create Post Box -->
        <div class="w-full max-w-7xl mx-auto flex-1 min-w-0">
            <div class="card bg-white border border-slate-200 shadow-sm rounded-xl overflow-hidden p-6 mb-6">
                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    <textarea name="post" rows="3"
                        class="w-full border border-slate-200 bg-slate-50 rounded-lg p-3 focus:ring-2 focus:ring-indigo-500 outline-none transition-all resize-none"
                        placeholder="What is in your mind?"></textarea>
                    <div class="flex items-center justify-between border-t border-slate-100 pt-3">
                        <input type="file" name="file"
                            class="text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" />
                        <button type="submit"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-5 py-2 rounded-lg text-sm transition-all shadow-md">Post</button>
                    </div>
                </form>
            </div>
        </div>

       
         

        <!-- Posts Feed Layout -->
        <div class="w-full max-w-7xl mx-auto flex-1 min-w-0">
            <div class="space-y-4">
                @foreach ($posts as $post)
                    <div class="card bg-white border border-slate-200 shadow-sm rounded-sm p-6 m-4">
                        <span class="font-sm text-slate-500">{{ $post->user->email ?? 'N/A' }}</span>



                        <div class="flex  flex-col justify-center text-xs text-slate-400 mb-2 h-25 w-25">
                            <div class="text-slate-700 text-sm leading-relaxed flex justify-start">{{ $post->post }}</div>
                            <img src="{{ asset('storage/' . $post->file) }}" alt="{{ $post->file }}"
                                class="rounded my-2 h-10 w-10">

                        </div>
                        <div class="text-xs text-slate-400 mb-2">
                            {{ $post->created_at ? $post->created_at->timezone('Asia/Manila')->format('h:i A') : '' }}
                        </div>
                        <div class="flex justify-between">
                            <a href="{{ route('posts.edit', $post->id) }}"><i class="fa-solid fa-pencil"></i></a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('delete')
                                <button type="submit" onclick="return confirm('Are you sure to delete this message?')"
                                    class="text-indigo-600 hover:text-indigo-800 font-semibold flex items-center gap-0.5 transition-colors cursor-pointer">
                                    <i class="fa-solid fa-trash-can text-[24px]"></i>
                                </button>
                            </form>
                        </div>
                    </div>






                @endforeach
            </div>
        </div>
    </div>
    <script>
        function editPost() {
            document.getElementById('Editpost').classList.remove('hidden');

        }
        window.editPost = editPost;
        function close() {
            document.getElementById('Editpost').classList.add('hidden');

        }
        window.close = close;




    </script>

</x-app-layout>