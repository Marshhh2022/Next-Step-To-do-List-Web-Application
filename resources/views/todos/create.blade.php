<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create your Next Step') }}
        </h2>
        <button id="dark-mode-toggle" class="text-gray-700 dark:text-gray-300 bg-blue-700 hover:bg-blue-800 focus:ring-4  dark:bg-blue-600 dark:hover:bg-blue-700 rounded-lg px-4 py-2 font-medium focus:outline-none">
            🌙
        </button>
    </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="post" action="{{ route('todos.store') }}" class="max-w-sm mx-auto space-y-5" >
                    @csrf   
                        <div>
                            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                What's Your Next Step:
                            </label>
                            <input name="title" type="text" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div>
                            <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Details:
                            </label>
                            <input name="description" type="text" id="large-input" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                           
                            </div>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            Submit
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('dark-mode-toggle').addEventListener('click', () => {
            document.documentElement.classList.toggle('dark');
        });
    </script>
    
</x-app-layout>
