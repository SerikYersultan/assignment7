<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $article->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <p class="text-sm text-gray-500 mb-4">By: {{ $article->user->name }}</p>
                <p class="text-gray-800">{{ $article->content }}</p>

                <div class="mt-6 flex gap-2">
                    <a href="{{ route('articles.index') }}"
                       class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Back</a>

                    @can('update', $article)
                        <a href="{{ route('articles.edit', $article) }}"
                           class="px-4 py-2 bg-yellow-400 rounded hover:bg-yellow-500">Edit</a>
                    @endcan

                    @can('delete', $article)
                        <form action="{{ route('articles.destroy', $article) }}" method="POST"
                              onsubmit="return confirm('Delete?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                                Delete
                            </button>
                        </form>
                    @endcan
                </div>

            </div>
        </div>
    </div>
</x-app-layout>