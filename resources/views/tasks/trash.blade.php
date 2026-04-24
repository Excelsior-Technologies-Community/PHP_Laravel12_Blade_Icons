<!DOCTYPE html>
<html>

<head>
    <title>Trash Tasks</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-slate-100 via-gray-100 to-slate-200 min-h-screen p-8">

    <div class="max-w-6xl mx-auto">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-8 bg-white p-5 rounded-2xl shadow-lg border">

            <h1 class="text-3xl font-bold text-gray-800 flex items-center gap-2">
                🗑 <span>Trash Tasks</span>
            </h1>

            <a href="/tasks"
                class="bg-gradient-to-r from-gray-600 to-gray-800 hover:from-gray-700 hover:to-black text-white px-5 py-2 rounded-xl shadow-lg transition">
                ← Back
            </a>

        </div>

        <!-- SUCCESS MESSAGE -->
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-500 text-white rounded-xl shadow-lg">
                ✅ {{ session('success') }}
            </div>
        @endif

        <!-- EMPTY STATE -->
        @if($tasks->count() == 0)
            <div class="text-center text-gray-500 py-16 bg-white rounded-2xl shadow">
                <div class="text-5xl mb-3">😔</div>
                <h2 class="text-xl font-semibold">No tasks in trash</h2>
                <p class="text-gray-400">Deleted tasks will appear here</p>
            </div>
        @endif

        <!-- TASK GRID -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach($tasks as $task)
                <div class="bg-white rounded-2xl shadow-lg border hover:shadow-2xl transition p-6">

                    <!-- TITLE -->
                    <h2 class="text-xl font-bold text-gray-800 mb-2">
                        {{ $task->title }}
                    </h2>

                    <!-- DESCRIPTION -->
                    <p class="text-gray-500 text-sm mb-4">
                        {{ $task->description }}
                    </p>

                    <!-- STATUS -->
                    <div class="mb-4">
                        @if($task->status == 'completed')
                            <span class="px-3 py-1 text-sm bg-green-100 text-green-700 rounded-full">
                                ✅ Completed
                            </span>
                        @else
                            <span class="px-3 py-1 text-sm bg-yellow-100 text-yellow-700 rounded-full">
                                ⏳ Pending
                            </span>
                        @endif
                    </div>

                    <!-- RESTORE BUTTON -->
                    <div class="flex justify-end">
                        <a href="/restore/{{ $task->id }}"
                            class="bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white px-4 py-2 rounded-xl shadow-md transition">
                            ♻ Restore
                        </a>
                    </div>

                </div>
            @endforeach

        </div>

    </div>

</body>

</html>