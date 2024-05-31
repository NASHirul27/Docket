<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Docket</title>
</head>

<body class="dark:bg-gray-900">
    <nav class="dark:bg-gray-800 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-white font-semibold text-lg"><a href="{{ route('task.index') }}">Data task</a></div>
        </div>
    </nav>

    <div class="container mx-auto p-8">
        <div class="max-w-lg mx-auto dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg">
            <div class="dark:bg-indigo-400 text-center py-4">
                <h2 class="text-white text-xl font-bold">Data Diri</h2>
            </div>
            <div class="p-6">
                <div class="mb-4">
                    <p class="text-indigo-400 font-semibold">Title:</a>
                    <p class="text-lg text-white">{{ $task->title}}</p>
                </div>
                <div class="mb-4">
                    <p class="text-indigo-400 font-semibold">Description:</a>
                    <p class="text-lg text-white">{{ $task->description}}</p>
                </div>
                <div class="mb-4">
                    <p class="text-indigo-400 font-semibold">Deadline:</a>
                    <p class="text-lg text-white">{{ $task->due_date }}</p>
                </div>
                <div class="mb-4">
                    <p class="text-indigo-400 font-semibold">Category:</a>
                    <p class="text-lg text-white">{{ $task->Category }}</p>
                </div>
                <div class="mb-4">
                    <p class="text-indigo-400 font-semibold">Priority:</a>
                    <p class="text-lg text-white">{{ $task->priority }}</p>
                </div>
                <div class="mb-4">
                    <p class="text-indigo-400 font-semibold">Status:</a>
                    <p class="text-lg text-white">{{ $task->status }}</p>
                </div>
                <div class="mb-4">
                    <p class="text-indigo-400 font-semibold">Last Updated:</a>
                    <p class="text-lg text-white">{{ $task->updated_at}}</p>
                </div>
                <div class="mb-4">
                    <a href="{{ route('task.index')}}" class="bg-indigo-400 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded inline-block mb-1">Kembali</a>
                    <a href="{{ route('task.edit', $task->id)}}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded inline-block mb-1">Edit</a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>