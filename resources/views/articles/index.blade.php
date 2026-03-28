<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Articles
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @can('create', App\Models\Article::class)
                <a href="{{ route('articles.create') }}"
                   class="mb-4 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Create Article
                </a>
            @endcan

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    @forelse ($articles as $article)
                        <div class="border-b py-4">
                            <h3 class="text-lg font-bold">{{ $article->title }}</h3>
                            <p class="text-sm text-gray-500">By: {{ $article->user->name }}</p>
                            <p class="mt-2">{{ Str::limit($article->content, 150) }}</p>

                            <div class="mt-2 flex gap-2">
                                <a href="{{ route('articles.show', $article) }}"
                                   class="text-blue-500 hover:underline">View</a>

                                @can('update', $article)
                                    <a href="{{ route('articles.edit', $article) }}"
                                       class="text-yellow-500 hover:underline">Edit</a>
                                @endcan

                                @can('delete', $article)
                                    <form action="{{ route('articles.destroy', $article) }}" method="POST"
                                          onsubmit="return confirm('Delete this article?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline">Delete</button>
                                    </form>
                                @endcan
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-500">No articles yet.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>