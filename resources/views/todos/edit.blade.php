<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit your Next Step') }}
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
                    <form method="post" action="{{ route('todos.update', $todo->id) }}" class="max-w-sm mx-auto space-y-5">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="todo_id" value="{{ $todo->id }}">
                        <div>
                            <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                               Edit Your Step:
                            </label>
                            <input name="title" value="{{ $todo->title }}" type="text" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div>
                            <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Details:
                            </label>
                            <input name="description" value="{{ $todo->description }}" type="text" id="large-input" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div>
                            <label for="status-select" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Status
                            </label>
                            <select name="is_completed" id="status-select" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option disabled selected class="text-gray-900 dark:text-white">Select Option</option>
                                <option value="1" {{ $todo->is_completed == 1 ? 'selected' : '' }}>Completed</option>
                                <option value="0" {{ $todo->is_completed == 0 ? 'selected' : '' }}>Incomplete</option>
                            </select>
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
