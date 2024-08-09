<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Welcome') }}
        </h2>
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

    @if ( count($todos) > 0)
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
                    <td class="px-6 py-3"> {{ $todo->title}} </td>
                    <td class="px-6 py-3"> {{ $todo->description}} </td>
                   <td class="px-6 py-3">
                        @if ($todo->is_completed == 1)
                            <a class="btn btn-sm btn-success">Completed</a>
                        @else
                        <a class="btn btn-sm btn-fail">Incomplete</a>    
                        @endif
                        {{-- <input id="checkbox-table-search-3" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"> --}}
                    </td>
                    <td class="flex items-center px-6 py-4">
                        <a href="{{ route('todos.edit', $todo->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        
                        <form action="{{ route('todos.destroy', $todo->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3 btn btn-sm btn-danger">Delete</button>
                        </form>
                                             
                        {{-- <form method="POST" action="{{ route('todos.destroy') }}" href="#">
                            @csrf
                            @method('DELETE')                   
                            <input type="hidden" name="todo_id" value="{{ $todo->id }}">
                            <input type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3 btn btn-sm btn-danger" name="todo_id" value="Remove">
                        </form>  --}}
                    </td>
                </tr>
                    
            @endforeach

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

            </tr>
        </tbody>
    </table>
    @else 
    <h4>No Steps are Created Yet!</h4>
    @endif

</div>

            </div>
        </div>
    </div>
</x-app-layout>
