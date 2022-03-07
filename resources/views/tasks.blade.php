<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <section class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="/tasks"
                  method="post"
                  class="flex bg-white justify-between overflow-hidden shadow-sm sm:rounded-lg">
                @csrf
                <label class="outline-none w-full">
                    <input type="text"
                           class="w-full border-transparent focus:border-transparent focus:ring-0"
                           placeholder="New task"
                           name="task"
                    />
                </label>
                <button class="px-8 bg-sky-600 hover:bg-sky-700 text-white w-40"
                        type="submit">ADD TASK</button>
            </form>
        </div>
        <div class="relative max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($tasks->count() > 0)
            <ul class="mx-2 mt-6">
                @foreach ($tasks as $task)
                    <form action="/tasks/{{$task->id}}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <li value="{{$task}}" class="m-2 py-2 px-4 bg-white rounded-lg shadow-sm">
                            <button type="submit" class="hover:line-through">
                                {{ $task->task }}
                            </button>
                        </li>
                    </form>
                @endforeach
            </ul>
            <div class="mt-20">
                {{$tasks->links()}}
            </div>
            @endif
        </div>

    </section>
</x-app-layout>
