    @foreach (\App\Models\Topic::with('user')->get() as $topic)
        <a href="{{ route('topic.details', ['topic' => $topic->id]) }}">
            <div class="mb-2 my-3">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-green-500 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="text-white">
                                <article>
                                    <h1 class="text-3xl font-[700] underline">{{ $topic->title ?? '' }}</h1>

                                    <div class="flex justify-between w-full">
                                        <div class="">
                                            <span>Created by {{ $topic->user->name ?? '' }}</span>
                                            <div class="my-3 flex gap-1">
                                                <div class="flex gap-1">
                                                    <img src="{{ asset('images/white-comment.png') }}" alt=""
                                                        width="20">
                                                    <span>Comments:</span>
                                                </div>
                                                <div>
                                                    {{ $topic->comments->count() }}
                                                </div>
                                            </div>
                                        </div>
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
