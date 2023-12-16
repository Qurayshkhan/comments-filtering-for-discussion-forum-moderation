<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Topics') }}
        </h2>
    </x-slot>


    <div class="container mx-aut text-right py-2">
        <button class="bg-purple-600 p-3 border rounded text-white">Create Topic</button>
    </div>

    <div class="max-h-[500px] overflow-y-auto">
        @include('pages.topics')
    </div>

</x-app-layout>
