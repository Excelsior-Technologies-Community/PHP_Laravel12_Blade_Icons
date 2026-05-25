<!DOCTYPE html>
<html lang="en" class="light">

<head>
    <title>Task Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
        }
    </script>
</head>

<body class="bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-800 dark:to-gray-900 min-h-screen p-8 transition-colors duration-300">

    <div class="max-w-6xl mx-auto bg-white dark:bg-gray-800 shadow-2xl rounded-2xl p-6 transition-colors duration-300">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100">📋 Task Manager</h1>

            <div class="space-x-2 flex items-center">
                <button onclick="toggleDarkMode()" class="p-2 bg-gray-200 dark:bg-gray-700 rounded-full shadow-md transition transform hover:scale-110 mr-2">
                    <span id="theme-icon" class="text-xl">🌙</span>
                </button>
                <a href="/tasks/create" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
                    + Add Task
                </a>
                <a href="/trash" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg shadow">
                    🗑 Trash
                </a>
            </div>
        </div>

        <div class="grid grid-cols-3 gap-6 mb-8">
            <div class="bg-blue-50 dark:bg-gray-700 p-6 rounded-lg shadow border-l-4 border-blue-500 relative overflow-hidden">
                <div class="absolute right-0 top-0 opacity-10 text-6xl mt-4 mr-4">📝</div>
                <h3 class="text-lg font-semibold text-gray-600 dark:text-gray-300">Total Tasks</h3>
                <p class="text-4xl font-bold text-blue-600 dark:text-blue-400">{{ $totalTasks ?? 0 }}</p>
            </div>
            <div class="bg-green-50 dark:bg-gray-700 p-6 rounded-lg shadow border-l-4 border-green-500 relative overflow-hidden">
                <div class="absolute right-0 top-0 opacity-10 text-6xl mt-4 mr-4">✅</div>
                <h3 class="text-lg font-semibold text-gray-600 dark:text-gray-300">Completed</h3>
                <p class="text-4xl font-bold text-green-600 dark:text-green-400">{{ $completedTasks ?? 0 }}</p>
            </div>
            <div class="bg-red-50 dark:bg-gray-700 p-6 rounded-lg shadow border-l-4 border-red-500 relative overflow-hidden">
                <div class="absolute right-0 top-0 opacity-10 text-6xl mt-4 mr-4">🗑️</div>
                <h3 class="text-lg font-semibold text-gray-600 dark:text-gray-300">In Trash</h3>
                <p class="text-4xl font-bold text-red-600 dark:text-red-400">{{ $trashedTasks ?? 0 }}</p>
            </div>
        </div>

        @if(session('success'))
            <div class="mb-5 p-4 rounded-lg bg-green-100 dark:bg-green-800 border border-green-400 dark:border-green-600 text-green-700 dark:text-green-100 shadow flex justify-between items-center">
                <span>✅ {{ session('success') }}</span>
                <button onclick="this.parentElement.remove()">✖</button>
            </div>
        @endif

        <form class="mb-5">
            <input type="text" name="search" placeholder="🔍 Search tasks..." class="w-full border dark:border-gray-600 dark:bg-gray-700 dark:text-gray-100 rounded-lg p-3 focus:ring-2 focus:ring-blue-400 outline-none transition-colors">
        </form>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">

                <thead>
                    <tr class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                        <th class="p-3 border-b dark:border-gray-600">ID</th>
                        <th class="p-3 border-b dark:border-gray-600">Title</th>
                        <th class="p-3 border-b dark:border-gray-600">Description</th>
                        <th class="p-3 border-b dark:border-gray-600">Status</th>
                        <th class="p-3 border-b dark:border-gray-600">Priority</th>
                        <th class="p-3 border-b dark:border-gray-600">Favorite</th>
                        <th class="p-3 border-b dark:border-gray-600">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($tasks as $task)
                        <tr class="border-b dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors">

                            <td class="p-3 font-medium text-gray-800 dark:text-gray-200">
                                {{ $task->id }}
                            </td>
                            <td class="p-3 font-medium text-gray-800 dark:text-gray-200">
                                {{ $task->title }}
                            </td>
                            <td class="p-3 text-gray-700 dark:text-gray-300">
                                {{ $task->description }}
                            </td>

                            <td class="p-3">
                                @if($task->status == 'completed')
                                    <span class="bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 text-xs font-semibold px-2.5 py-1 rounded inline-flex items-center gap-1">
                                        ✅ Completed
                                    </span>
                                @else
                                    <span class="bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-200 text-xs font-semibold px-2.5 py-1 rounded inline-flex items-center gap-1">
                                        ⏳ Pending
                                    </span>
                                @endif
                            </td>

                            <td class="p-3">
                                @if($task->priority == 'high')
                                    <span class="text-red-500 font-bold">🔴 High</span>
                                @elseif($task->priority == 'medium')
                                    <span class="text-blue-500 font-bold">🔵 Medium</span>
                                @else
                                    <span class="text-gray-500 font-bold">⚪ Low</span>
                                @endif
                            </td>

                            <td class="p-3">
                                @if($task->is_favorite)
                                    <span class="text-red-500 font-semibold">❤️ Yes</span>
                                @else
                                    <span class="text-gray-400 dark:text-gray-500">❌ No</span>
                                @endif
                            </td>

                            <td class="p-3 flex space-x-3 items-center">
                                <a href="/favorite/{{ $task->id }}" class="text-red-500 hover:scale-125 transition transform">❤️</a>

                                <a href="/tasks/{{ $task->id }}/edit" class="text-blue-500 hover:scale-125 transition transform">✏️</a>

                                <form action="/tasks/{{ $task->id }}" method="POST" onsubmit="return confirm('⚠ Are you sure you want to delete this task?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:scale-125 transition transform">
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

    <script>
        function toggleDarkMode() {
            document.documentElement.classList.toggle('dark');
            const icon = document.getElementById('theme-icon');
            if (document.documentElement.classList.contains('dark')) {
                icon.textContent = '☀️';
                localStorage.setItem('theme', 'dark');
            } else {
                icon.textContent = '🌙';
                localStorage.setItem('theme', 'light');
            }
        }

        if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
            document.getElementById('theme-icon').textContent = '☀️';
        }
    </script>

</body>

</html>