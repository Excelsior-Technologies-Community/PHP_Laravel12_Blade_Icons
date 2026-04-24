<!DOCTYPE html>
<html>

<head>
    <title>Edit Task</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white shadow-xl rounded-2xl p-8 w-full max-w-lg">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">

            <h1 class="text-2xl font-bold text-gray-800">✏️ Edit Task</h1>

            <a href="/tasks" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg shadow">
                ← Back
            </a>

        </div>

        <!-- SUCCESS MESSAGE -->
        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                ✅ {{ session('success') }}
            </div>
        @endif

        <!-- FORM -->
        <form method="POST" action="/tasks/{{ $task->id }}" class="space-y-4">
            @csrf
            @method('PUT')

            <!-- TITLE -->
            <div>
                <label class="text-gray-600">Title</label>
                <input name="title" value="{{ $task->title }}"
                    class="w-full border p-3 rounded-lg focus:ring-2 focus:ring-blue-400"
                    placeholder="Enter task title">
            </div>

            <!-- DESCRIPTION -->
            <div>
                <label class="text-gray-600">Description</label>
                <textarea name="description" class="w-full border p-3 rounded-lg focus:ring-2 focus:ring-blue-400"
                    placeholder="Enter description">{{ $task->description }}</textarea>
            </div>

            <!-- STATUS -->
            <div>
                <label class="text-gray-600">Status</label>
                <select name="status" class="w-full border p-3 rounded-lg focus:ring-2 focus:ring-blue-400">

                    <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>
                        Pending
                    </option>

                    <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>
                        Completed
                    </option>

                </select>
            </div>

            <!-- BUTTON -->
            <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg shadow">
                Update Task
            </button>

        </form>

    </div>

</body>

</html>