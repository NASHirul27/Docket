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
                    <a href="{{ route('mahasiswa.create') }}" class="text-white hover:text-gray-200 px-4">Tambah Data</a>
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
                    <th class="border px-4 py-2 text-white">NIM</th>
                    <th class="border px-4 py-2 text-white">Nama</th>
                    <th class="border px-4 py-2 text-white">Prodi</th>
                    <th class="border px-4 py-2 text-white">Jurusan</th>
                    <th class="border px-4 py-2 text-white">Last Updated</th>
                    <th class="border px-4 py-2 text-white">Aksi</th>    
                </tr>
            </thead>
            <tbody>
                @forelse ($mahasiswa as $siswa)
                    <tr>
                        <td class="border px-4 py-2 text-white">{{ $loop->iteration }}</td>
                        <td class="border px-4 py-2 text-white">{{ $siswa->nim }}</td>
                        <td class="border px-4 py-2 text-white">{{ $siswa->nama }}</td>
                        <td class="border px-4 py-2 text-white">{{ $siswa->prodi }}</td>
                        <td class="border px-4 py-2 text-white">{{ $siswa->jurusan }}</td>
                        <td class="border px-4 py-2 text-white">{{ $siswa->updated_at }}</td>
                        <td class="border px-4 py-2 flex justify-around">
                            <form onsubmit="return confirm('Apakah Anda Yakin?');" action="{{ route('mahasiswa.destroy', $siswa->id) }}" method="POST">
                                <a href="{{ route('mahasiswa.show', $siswa->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-block mb-1">SHOW</a>
                                <a href="{{ route('mahasiswa.edit', $siswa->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded inline-block mb-1">EDIT</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded inline-block mb-1">DELETE</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                        <h3>Data Mahasiswa Tidak Ada</h3>
                    @endforelse
            </tbody>
        </table>
        {{ $mahasiswa->links() }}
    </div>     
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        //message with sweetalert
        @if(session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL!",
                text: "{{ session('success') }}",
                background: "rgb(31 41 55)",
                color: "#716add",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif(session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
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