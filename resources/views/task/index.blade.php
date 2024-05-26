<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Data Mahasiswa</title>
</head> -->

<x-app-layout>
    <x-slot name="header">
        <nav class="dark:bg-gray-800 p-4">
            <div class="container mx-auto flex justify-between items-center">
                <div class="text-white font-semibold text-lg"><a href="index.php">Data Mahasiswa</a></div>
                <div>
                    <a href="{{ route('task.create') }}" class="text-white hover:text-gray-200 px-4">Tambah Data</a>
                </div>  
            </div>    
        </nav>
    </x-slot>
    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold text-white mb-5">Data Mahasiswa</h1>
        <table class="table-auto border-collapse w-full">
            <thead>
                <tr>
                    <th class="border px-4 py-2 text-white">No</th>
                    <th class="border px-4 py-2 text-white">Title</th>
                    <th class="border px-4 py-2 text-white">Description</th>
                    <th class="border px-4 py-2 text-white">Deadline</th>
                    <th class="border px-4 py-2 text-white">Category</th>
                    <th class="border px-4 py-2 text-white">Priority</th>
                    <th class="border px-4 py-2 text-white">Status</th>
                    <th class="border px-4 py-2 text-white">Last Updated</th>
                    <th class="border px-4 py-2 text-white">Aksi</th>    
                </tr>
            </thead>
            <tbody>
                @forelse ($task as $siswa)
                    <tr>
                        <td class="border px-4 py-2 text-white">{{ $loop->iteration }}</td>
                        <td class="border px-4 py-2 text-white">{{ $siswa->title }}</td>
                        <td class="border px-4 py-2 text-white">{{ $siswa->description }}</td>
                        <td class="border px-4 py-2 text-white">{{ $siswa->deadline }}</td>
                        <td class="border px-4 py-2 text-white">{{ $siswa->category }}</td>
                        <td class="border px-4 py-2 text-white">{{ $siswa->priority }}</td>
                        <td class="border px-4 py-2 text-white">{{ $siswa->status }}</td>
                        <td class="border px-4 py-2 text-white">{{ $siswa->updated_at }}</td>
                        <td class="border px-4 py-2 flex justify-around">
                            <form onsubmit="return confirm('Apakah Anda Yakin?');" action="{{ route('task.destroy', $siswa->id) }}" method="POST">
                                <a href="{{ route('task.show', $siswa->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-block mb-1">SHOW</a>
                                <a href="{{ route('task.edit', $siswa->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded inline-block mb-1">EDIT</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded inline-block mb-1">DELETE</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                        <h3>Task Doesn't Exist</h3>
                @endforelse
            </tbody>
        </table>
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