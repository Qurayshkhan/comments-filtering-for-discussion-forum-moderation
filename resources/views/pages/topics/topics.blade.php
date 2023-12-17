    @foreach (\App\Models\Topic::with('user')->get() as $topic)
        <a href="{{ route('topic.details', ['topic' => $topic->id]) }}">
            <div class="mb-2">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-green-500 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="text-white">
                                <article>
                                    <h1 class="text-3xl font-[700] underline">{{ $topic->title ?? '' }}</h1>

                                    <div class="flex justify-between w-full">
                                        <span>Created by {{ $topic->user->name ?? '' }}</span>
                                        <span>
                                            {{ $topic->created_at->diffForHumans() ?? '' }}
                                        </span>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    @endforeach
