<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Article
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form method="POST" action="{{ route('articles.store') }}">
                    @csrf

                    <div class="mb-4">
                        <x-input-label for="title" value="Title" />
                        <x-text-input id="title" name="title" type="text"
                                      class="block mt-1 w-full"
                                      :value="old('title')" required />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="content" value="Content" />
                        <textarea id="content" name="content"
                                  class="block mt-1 w-full border-gray-300 rounded-md shadow-sm"
                                  rows="6" required>{{ old('content') }}</textarea>
                        <x-input-error :messages="$errors->get('content')" class="mt-2" />
                    </div>

                    <div class="flex gap-2">
                        <x-primary-button>Create</x-primary-button>
                        <a href="{{ route('articles.index') }}"
                           class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Cancel</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>