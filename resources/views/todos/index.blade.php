<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Welcome') }}
            </h2>
            <button id="dark-mode-toggle" class="text-gray-700 dark:text-gray-300 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 rounded-lg px-4 py-2 font-medium focus:outline-none">
                🌙
            </button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    @if (Session::has('alert-info'))
                        <div class="alert-info p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                           {{ Session::get('alert-info') }}
                        </div>
                    @endif

                    @if (Session::has('alert-success'))
                        <div class="alert-success p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                           {{ Session::get('alert-success') }}
                        </div>
                    @endif

                    @if (Session::has('alert-danger'))
                        <div class="alert-danger p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                           {{ Session::get('alert-danger') }}
                        </div>
                    @endif

                    <div class="px-6 py-4">
                        <div class="flex items-center justify-between mb-4">
                            <a href="{{ route('todos.create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                Create Todo
                            </a>

                        </div>
                    </div>

                    @if (count($todos) > 0)
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Steps
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Details
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Completed
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($todos as $todo)
                                    <tr>
                                        <td class="px-6 py-3">{{ $todo->title }}</td>
                                        <td class="px-6 py-3">{{ $todo->description }}</td>
                                        <td class="px-6 py-3">
                                            @if ($todo->is_completed == 1)
                                                <a class="btn btn-sm btn-success">Completed</a>
                                            @else
                                                <a class="btn btn-sm btn-fail">Incomplete</a>
                                            @endif
                                        </td>
                                        <td class="flex items-center px-6 py-4">
                                            <a href="{{ route('todos.edit', $todo->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                            <form action="{{ route('todos.destroy', $todo->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3 btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <h4 class="text-center text-gray-500 dark:text-gray-400 mt-4">No Steps are Created Yet!</h4>
                    @endif
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
