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
            <div class="text-white font_semibold text-lh"><a href="{{ route('task.index')}}">Docket</a></div>
            <div>
                <a href="{{ route('task.index')}}" class="text-white hover:text-gray-200 pd-4">Back</a>
            </div>
        </div>
    </nav>

    <div class="container mx-auto p-8">
        <form method="POST" action="{{ route('task.store') }}">
            @csrf
            <div class="mb-4">
                <h2 class="text-2xl text-white font-bold mb-2">Creating New Task</h2>
            </div>
            <div class="mb-4">
                <label for="title" class="block text-indigo-400 text-sm font-bold mb-2">Title:</tabel>
                <input type="text" id="title" name="title" class="dark:bg-gray-800 text-white rounded-md py-2 px-3 w-full @error('title') is-invalid @enderror" value="{{ old('title') }}"> 
            </div>
            {{-- alert --}}
            @error('title')
                <div class="border-1-4 border-orange-500 text-orange-700 p-4" role="alert">
                    <p class="font-bold">{{ $message }}</p>
                </div>
            @enderror
            {{-- end alert --}}

            <div class="mb-4">
                <label for="description" class="block text-indigo-400 text-sm font-bold mb-2">Description:</label>
                <input type="text" id="description" name="description" class="dark:bg-gray-800 text-white rounded-md py-2 px-3 w-full @error('description') is-invalid @enderror" value="{{ old('description') }}">
            </div>
            {{-- alert --}}
            @error('description')
                <div class="border-1-4 border-orange-500 text-orange-700 p-4" role="alert">
                    <p class="font-bold">{{ $message }}</p>
                </div>
            @enderror
            {{-- end alert --}}

            <div class="mb-4">
                <label for="due_date" class="block text-indigo-400 text-sm font-bold mb-2">Deadline:</label>
                <input type="date" id="due_date" name="due_date" class="dark:bg-gray-800 text-white rounded-md py-2 px-3 w-full @error('due_date') is-invalid @enderror" value="{{ old('due_date') }}">
            </div>
            {{-- alert --}}
            @error('due_date')
                <div class="border-1-4 border-orange-500 text-orange-700 p-4" role="alert">
                    <p class="font-bold">{{ $message }}</p>
                </div>
            @enderror
            {{-- end alert --}}

            <div class="mb-4">
                <label for="category" class="block text-indigo-400 text-sm font-bold mb-2">Category:</label>
                <input type="text" id="category" name="category" class="dark:bg-gray-800 text-white rounded-md py-2 px-3 w-full @error('category') is-invalid @enderror" value="{{ old('category') }}">
            </div>
            {{-- alert --}}
            @error('category')
                <div class="border-1-4 border-orange-500 text-orange-700 p-4" role="alert">
                    <p class="font-bold">{{ $message }}</p>
                </div>
            @enderror
            {{-- end alert --}}

            <div class="mb-4">
                <label for="priority" class="block text-indigo-400 text-sm font-bold mb-2">Priority:</label>
            <div class="flex items-center mb-4">
                <input type="radio" d="priority" name="priority" value="Important" class="form-radio h-5 w-5 text-blue-600 @error('priority') is-invalid @enderror" {{ old('priority') === 'Important' ? 'checked' : ''}}>
                <label for="important" class="text-white ml-2">Important</label>
            </div>
            <div class="flex items-center mb-4">
                <input type="radio" d="priority" name="priority" value="NotImportant" class="form-radio h-5 w-5 text-pink-600 @error('priority') is-invalid @enderror" {{ old('priority') === 'NotImportant' ? 'checked' : ''}}>
                <label for="notimportant" class="text-white ml-2">Not Important</label>
            </div>
            {{-- alert --}}
            @error('priority')
                <div class="border-1-4 border-orange-500 text-orange-700 p-4" role="alert">
                    <p class="font-bold">{{ $message }}</p>
                </div>
            @enderror
            {{-- end alert --}}

            </div>
            <div class="mb-4">
                <label for="status" class="block text-indigo-400 text-sm font-bold mb-2">Status:</label>
                <select id="status" name="status" class="dark:bg-gray-800 text-white rounded-md py-2 px-3 w-full @error('status') is-invalid @enderror">
                    <option value="todo">To Do</option>
                    <option value="doing">Doing</option>
                    <option value="done">Done</option>
                </select>
            </div>
            {{-- alert --}}
            @error('status')
                <div class="border-1-4 border-orange-500 text-orange-700 p-4" role="alert">
                    <p class="font-bold">{{ $message }}</p>
                </div>
            @enderror
            {{-- end alert --}}

            

            <div>
                <button type="submit" class="bg-indigo-400 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded" name="tambah">Create</button>
            </div>
        </form>
    </div>
    
</body>
</html>