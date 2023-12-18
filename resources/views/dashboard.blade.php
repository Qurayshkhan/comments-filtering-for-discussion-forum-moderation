<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Topics') }}
        </h2>
    </x-slot>

    @php
        $banDate = auth()->user()->userBand ? auth()->user()->userBand->ban_end : '';
    @endphp
    @if (now() > $banDate)
        <div class="container mx-auto text-right py-2">
            <a href="{{ route('create.topic') }}">
                <button class="bg-purple-600 p-3 border rounded text-white">Create Topic</button>
            </a>
        </div>
    @endif
    <div class="max-h-[500px] overflow-y-auto">
        @include('pages.topics.topics')
    </div>

</x-app-layout>
