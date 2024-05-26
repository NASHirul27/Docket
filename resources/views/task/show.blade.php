<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Data Mahasiswa</title>
</head>

<body class="dark:bg-gray-900">
    <nav class="dark:bg-gray-800 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-white font-semibold text-lg"><a href="{{ route('mahasiswa.index') }}">Data Mahasiswa</a></div>
        </div>
    </nav>

    <div class="container mx-auto p-8">
        <div class="max-w-lg mx-auto dark:bg-gray-800 rounded-lg overflow-hidden shadow-lg">
            <div class="dark:bg-indigo-400 text-center py-4">
                <h2 class="text-white text-xl font-bold">Data Diri</h2>
            </div>
            <div class="p-6">
                <div class="mb-4">
                    <p class="text-indigo-400 font-semibold">NIM:</a>
                    <p class="text-lg text-white">{{ $mahasiswa->nim}}</p>
                </div>
                <div class="mb-4">
                    <p class="text-indigo-400 font-semibold">Nama:</a>
                    <p class="text-lg text-white">{{ $mahasiswa->nama}}</p>
                </div>
                <div class="mb-4">
                    <p class="text-indigo-400 font-semibold">Tempat Lahir:</a>
                    <p class="text-lg text-white">{{ $mahasiswa->tempat_lahir }}</p>
                </div>
                <div class="mb-4">
                    <p class="text-indigo-400 font-semibold">Tanggal Lahir:</a>
                    <p class="text-lg text-white">{{ $mahasiswa->tanggal_lahir }}</p>
                </div>
                <div class="mb-4">
                    <p class="text-indigo-400 font-semibold">Jenis Kelamin:</a>
                    <p class="text-lg text-white">{{ $mahasiswa->jenis_kelamin }}</p>
                </div>
                <div class="mb-4">
                    <p class="text-indigo-400 font-semibold">Prodi:</a>
                    <p class="text-lg text-white">{{ $mahasiswa->prodi }}</p>
                </div>
                <div class="mb-4">
                    <p class="text-indigo-400 font-semibold">Jurusan:</a>
                    <p class="text-lg text-white">{{ $mahasiswa->jurusan}}</p>
                </div>
                <div class="mb-4">
                    <a href="{{ route('mahasiswa.index')}}" class="bg-indigo-400 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded inline-block mb-1">Kembali</a>
                    <a href="{{ route('mahasiswa.edit', $mahasiswa->id)}}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded inline-block mb-1">Edit</a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>