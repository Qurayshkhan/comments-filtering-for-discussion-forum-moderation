<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Open Topic') }}
        </h2>
    </x-slot>
    <div class="contaienr bg-white my-3 p-5">
        <div>
            <div class="flex justify-between">
                <div class="text-3xl">{{ $topic->title ?? '' }}</div>
                <span>{{ $topic->created_at->diffForHumans() ?? '' }}</span>
            </div>
            <div>{{ $topic->content ?? '' }}</div>
            <hr>
        </div>
    </div>
    <div class="contaienr bg-white my-3 p-5">
        <form action="{{ route('store.comment') }}" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <input type="hidden" name="topic_id" value="{{ $topic->id ?? '' }}">
            <div class="mt-2">
                <textarea id="comment" name="comment" type="text" autocomplete="content" required
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    placeholder="Enter comment"></textarea>
            </div>
            <div class="text-right mt-3">
                <button type="submit" class="bg-green-700 p-3 text-white">comment</button>
            </div>
        </form>
    </div>
    <div class="contaienr bg-white my-3 p-5">
        <div class="text-3xl">Comments</div>
        @foreach ($topic->comments as $comment)
            <div class="my-3">
                <div class="flex justify-between">
                    <div class="font-semibold font-['700']">{{ $topic->user->name ?? '' }}</div>
                    <div>{{ $comment->created_at->diffForHumans() ?? '' }}</div>
                </div>
                <div>{{ $comment->comment ?? '' }}</div>
                <hr>
            </div>
        @endforeach
    </div>
</x-app-layout>
