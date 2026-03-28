<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Articles</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 bg-green-100 text-green-700 p-4 rounded">{{ session('success') }}</div>
            @endif

            @can('create', App\Models\Article::class)
                <a href="{{ route('articles.create') }}" class="inline-block mb-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Create New Article
                </a>
            @endcan

            @foreach ($articles as $article)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-2xl font-bold mb-2">{{ $article->title }}</h3>
                        <p class="text-sm text-gray-500 mb-4">Author: {{ $article->user->name }}</p>
                        <p>{{ Str::limit($article->content, 150) }}</p>

                        <div class="mt-4 flex gap-2">
                            <a href="{{ route('articles.show', $article) }}" class="text-blue-500 hover:underline">Read More</a>
                            
                            @can('update', $article)
                                <span class="text-gray-300">|</span>
                                <a href="{{ route('articles.edit', $article) }}" class="text-yellow-500 hover:underline">Edit</a>
                            @endcan

                            @can('delete', $article)
                                <span class="text-gray-300">|</span>
                                <form action="{{ route('articles.destroy', $article) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline">Delete</button>
                                </form>
                            @endcan
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>