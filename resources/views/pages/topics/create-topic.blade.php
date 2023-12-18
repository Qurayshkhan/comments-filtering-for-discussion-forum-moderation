<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Topic') }}
        </h2>
    </x-slot>


    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">

        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-10 w-auto" src="https://img.icons8.com/fluency/48/topic.png" alt="topic"/
                alt="Your Company">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Create Topic</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            @if (Session::has('status'))
                <div class="bg-green-600 text-white border rounded p-3">
                    {{ Session::get('status') }}
                </div>
            @endif
            <form class="space-y-6" action="{{ route('store.topic') }}" method="POST">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name
                    </label>
                    <div class="mt-2">
                        <input id="name" name="name" type="text" autocomplete="name" required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            placeholder="Enter Toipc Name">
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="content" class="block text-sm font-medium leading-6 text-gray-900">Content</label>
                        <div class="text-sm">

                        </div>
                    </div>
                    <div class="mt-2">
                        <textarea id="content" name="content" type="text" autocomplete="content" required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            placeholder="Enter content"></textarea>
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Create Topic</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        var quill = new Quill('#content', {
            theme: 'snow'
        });
    </script>
</x-app-layout>
