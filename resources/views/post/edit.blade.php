<x-app-layout>
  
<div class="w-full max-w-7xl mx-auto flex-1 min-w-0">
            <div class="card bg-white border border-slate-200 shadow-sm rounded-xl overflow-hidden p-6 mb-6">
                @foreach ( $posts as $post)
                    
               
                <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    @method('PUT')
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
                 @endforeach
            </div>
        </div>
</x-app-layout>        