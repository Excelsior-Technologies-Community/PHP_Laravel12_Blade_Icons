<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <title>Edit Task</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
        }
    </script>
</head>
<body class="bg-gray-100 dark:bg-gray-900 flex items-center justify-center min-h-screen transition-colors duration-300">

    <div class="bg-white dark:bg-gray-800 shadow-xl rounded-2xl p-8 w-full max-w-lg transition-colors duration-300">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">✏️ Edit Task</h1>
            
            <div class="flex items-center space-x-3">
                <button onclick="toggleDarkMode()" class="p-2 bg-gray-200 dark:bg-gray-700 rounded-full shadow-md transition transform hover:scale-110">
                    <span id="theme-icon" class="text-xl">🌙</span>
                </button>
                <a href="/tasks" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg shadow">
                    ← Back
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 dark:bg-green-800 border border-green-400 dark:border-green-600 text-green-700 dark:text-green-100 rounded-lg">
                ✅ {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="/tasks/{{ $task->id }}" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="text-gray-600 dark:text-gray-300 font-semibold">Title</label>
                <input name="title" value="{{ $task->title }}"
                    class="w-full border dark:border-gray-600 dark:bg-gray-700 dark:text-white p-3 rounded-lg focus:ring-2 focus:ring-blue-400 outline-none transition-colors"
                    placeholder="Enter task title">
            </div>

            <div>
                <label class="text-gray-600 dark:text-gray-300 font-semibold">Description</label>
                <textarea name="description" class="w-full border dark:border-gray-600 dark:bg-gray-700 dark:text-white p-3 rounded-lg focus:ring-2 focus:ring-blue-400 outline-none transition-colors"
                    placeholder="Enter description">{{ $task->description }}</textarea>
            </div>

            <div>
                <label class="text-gray-600 dark:text-gray-300 font-semibold">Status</label>
                <select name="status" class="w-full border dark:border-gray-600 dark:bg-gray-700 dark:text-white p-3 rounded-lg focus:ring-2 focus:ring-blue-400 outline-none transition-colors">
                    <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>
                        ⏳ Pending
                    </option>
                    <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>
                        ✅ Completed
                    </option>
                </select>
            </div>

            <div>
                <label class="text-gray-600 dark:text-gray-300 font-semibold">Priority</label>
                <select name="priority" class="w-full border dark:border-gray-600 dark:bg-gray-700 dark:text-white p-3 rounded-lg focus:ring-2 focus:ring-blue-400 outline-none transition-colors">
                    <option value="low" {{ $task->priority == 'low' ? 'selected' : '' }}>⚪ Low</option>
                    <option value="medium" {{ $task->priority == 'medium' ? 'selected' : '' }}>🔵 Medium</option>
                    <option value="high" {{ $task->priority == 'high' ? 'selected' : '' }}>🔴 High</option>
                </select>
            </div>

            <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-lg shadow transition transform hover:-translate-y-1">
                Update Task
            </button>

        </form>

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