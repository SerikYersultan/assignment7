<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ $article->title }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <p class="text-sm text-gray-500 mb-6">Author: {{ $article->user->name }} | Published: {{ $article->created_at->format('M d, Y') }}</p>
                <div class="text-gray-800 whitespace-pre-line">
                    {{ $article->content }}
                </div>
                <div class="mt-6">
                    <a href="{{ route('articles.index') }}" class="text-blue-500 hover:underline">&larr; Back to Articles</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>