<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Data Mahat</title>
</head> -->

<x-app-layout>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('/build/assets/datatables-darkmode.css') }}">
    <script>
    $(document).ready(function() {
        $('.table').DataTable({
            "dom": '<"top"lfr><"clear">rt<"bottom"ip><"clear">'
        });
    });
</script>


    <x-slot name="header">
        
    </x-slot>
    <div class="container mx-auto p-8">
        <div class="container mx-auto flex justify-between items-center">
                <!-- <div class="text-white font-semibold text-lg">Task</div> -->
            <h1 class="text-3xl font-bold text-white mb-5">List of Task</h1>
            <div>
                <a href="{{ route('task.create') }}" class="text-white hover:text-gray-200 px-4 py-2 bg-indigo-400 hover:bg-indigo-700 rounded-md">Create Task</a>
            </div>      
        </div>   
        
        <div id="dataTable">
           <table class="table table-auto border-collapse w-full whitespace-nowrap">
            <thead>
                <tr>
                    <th class="border px-4 py-2 text-white">No</th>
                    <th class="border px-4 py-2 text-white">Title</th>
                    <!-- <th class="border px-4 py-2 text-white">Description</th> -->
                    <th class="border px-4 py-2 text-white">Deadline</th>
                    <!-- <th class="border px-4 py-2 text-white">Category</th> -->
                    <th class="border px-4 py-2 text-white">Priority</th>
                    <th class="border px-4 py-2 text-white">Status</th>
                    <!-- <th class="border px-4 py-2 text-white">Last Updated</th> -->
                    <th class="border px-4 py-2 text-white">Aksi</th>    
                </tr>
            </thead>
            <tbody>
                @forelse ($task as $t)
                    <tr>
                        <td class="border px-4 py-2 text-white">{{ $loop->iteration }}</td>
                        <td class="border px-4 py-2 text-white">{{ $t->title }}</td>
                        <!-- <td class="border px-4 py-2 text-white">{{ $t->description }}</td> -->
                        <td class="border px-4 py-2 text-white">{{ $t->due_date }}</td>
                        <!-- <td class="border px-4 py-2 text-white">{{ $t->category }}</td> -->
                        <td class="border px-4 py-2 text-white">{{ $t->priority }}</td>
                        <td class="border px-4 py-2 text-white">{{ $t->status }}</td>
                        <!-- <td class="border px-4 py-2 text-white">{{ $t->updated_at }}</td> -->
                        <td class="border px-4 py-2 flex justify-around">
                            <form Onsubmit="return confirm('Are you sure?');" action="{{ route('task.destroy', $t->id) }}" method="POST">
                                <a href="{{ route('task.show', $t->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-block mb-1">SHOW</a>
                                <A href="{{ route('task.edit', $t->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded inline-block mb-1">EDIT</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded inline-block mb-1">DELETE</button>

                                {{-- Add the new button --}}
                            </form>
                            <form action="{{ route('task.markAsDone', $t->id) }}" method="POST" class="inline-block">
                                @csrf
                                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-block mb-1">DONE</button>
                            </form>
                        </td>

                    </tr>
                    @empty
                        <h3 class="text-white">Task Doesn't Exist</h3>
                @endforelse
            </tbody>
            </table> 
        </div>
        
        {{ $task->links() }}
    </div>     
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        //message with sweetalert
        @if(session('success'))
            Swal.fire({
                icon: "success",
                title: "SUCCESS!",
                text: "{{ session('success') }}",
                background: "rgb(31 41 55)",
                color: "#716add",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif(session('error'))
            Swal.fire({
                icon: "error",
                title: "FAILED!",
                text: "{{ session('error') }}",
                background: "rgb(31 41 55)",
                color: "#716add",
                showConfirmButton: false,
                timer: 2000
            });
        @endif
    </script>
</x-app-layout>
</html>




