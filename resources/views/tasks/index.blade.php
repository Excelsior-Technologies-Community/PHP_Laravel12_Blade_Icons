<!DOCTYPE html>
<html>

<head>
    <title>Task Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-gray-100 to-gray-200 min-h-screen p-8">

    <div class="max-w-5xl mx-auto bg-white shadow-2xl rounded-2xl p-6">

        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">📋 Task Manager</h1>

            <div class="space-x-2">
                <a href="/tasks/create" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
                    + Add Task
                </a>

                <a href="/trash" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg shadow">
                    🗑 Trash
                </a>
            </div>
        </div>

        <!-- SUCCESS MESSAGE -->
        @if(session('success'))
            <div
                class="mb-5 p-4 rounded-lg bg-green-100 border border-green-400 text-green-700 shadow flex justify-between items-center">
                <span>✅ {{ session('success') }}</span>
                <button onclick="this.parentElement.remove()">✖</button>
            </div>
        @endif

        <!-- SEARCH -->
        <form class="mb-5">
            <input type="text" name="search" placeholder="🔍 Search tasks..."
                class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-400 outline-none">
        </form>

        <!-- TABLE -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">

                <thead>
                    <tr class="bg-gray-100 text-gray-700">
                        <th class="p-3">Title</th>
                        <th class="p-3">ID</th>
                        <th class="p-3">Description</th>
                        <th class="p-3">Status</th>
                        <th class="p-3">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($tasks as $task)
                        <tr class="border-b hover:bg-gray-50">

                            <td class="p-3 font-medium text-gray-800">
                                {{ $task->id }}
                            </td>
                            <td class="p-3 font-medium text-gray-800">
                                {{ $task->title }}
                            </td>

                            <td class="p-3 text-gray-700">
                                {{ $task->description }}
                            </td>

                            <td class="p-3">
                                @if($task->is_favorite)
                                    <span class="text-red-500 font-semibold">❤️ Favorite</span>
                                @else
                                    <span class="text-gray-400">❌ Not Favorite</span>
                                @endif
                            </td>

                            <td class="p-3 flex space-x-3">

                                <a href="/favorite/{{ $task->id }}" class="text-red-500">❤️</a>

                                <a href="/tasks/{{ $task->id }}/edit" class="text-blue-500">✏️</a>

                                <form action="/tasks/{{ $task->id }}" method="POST"
                                    onsubmit="return confirm('⚠ Are you sure you want to delete this task?');">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="text-red-600 hover:scale-110 transition">
                                        🗑
                                    </button>

                                </form>

                            </td>

                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

        <div class="mt-5">
            {{ $tasks->links() }}
        </div>

    </div>

</body>

</html>