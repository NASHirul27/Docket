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
            <div class="text-white font-semibold text-lg"><a href="index.php">Data Mahasiswa</a></div>
            <div>
                <a href="{{ route('mahasiswa.index')}}" class="text-white hover:text-gray-200 px-4">Kembali</a>
            </div>
        </div>
    </nav>

    <div class="container mx-auto p-8">
        <form method="POST" action="{{ route('mahasiswa.update', $mahasiswa['id']) }}">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <h2 class="text-2xl text-white font-bold mb-2">Edit Data Mahasiswa</h2>
                <p class="text-indigo-500">Mohon isi data di bawah ini dengan benar.</p>
            </div>

            <div class="mb-4">
                <label for="nim" class="block text-indigo-400 text-sm font-bold mb-2">NIM:</label>
                <input type="text" id="nim" name="nim" class="dark:bg-gray-800 text-white rounded-md py-2 px-3 w-full @error('nim') is-invalid @enderror" 
                value="{{ old('nim', $mahasiswa->nim) }}">
            </div>
            {{-- alert --}}
            @error('nim')
                <div class="border-1-4 border-orange-500 text-orange-700 p-4" role="alert">
                    <p class="font-bold">{{ $message }}</p>
                </div>
            @enderror
            {{-- end alert --}}

            <div class="mb-4">
                <label for="nama" class="block text-indigo-400 text-sm font-bold mb-2">Nama:</label>
                <input type="text" id="nama" name="nama" class="dark:bg-gray-800 text-white rounded-md py-2 px-3 w-full @error('nama') is-invalid @enderror" 
                value="{{ old('nama', $mahasiswa->nama) }}">
            </div>
            {{-- alert --}}
            @error('nama')
                <div class="border-1-4 border-orange-500 text-orange-700 p-4" role="alert">
                    <p class="font-bold">{{ $message }}</p>
                </div>
            @enderror
            {{-- end alert --}}

            <div class="mb-4">
                <label for="tempatLahir" class="block text-indigo-400 text-sm font-bold mb-2">Tempat Lahir:</label>
                <input type="text" id="tempatLahir" name="tempatLahir" class="dark:bg-gray-800 text-white rounded-md py-2 px-3 w-full @error('tempatLahir') is-invalid @enderror" 
                value="{{ old('tempatLahir', $mahasiswa->tempat_lahir) }}">
            </div>
            {{-- alert --}}
            @error('tempatLahir')
                <div class="border-1-4 border-orange-500 text-orange-700 p-4" role="alert">
                    <p class="font-bold">{{ $message }}</p>
                </div>
            @enderror
            {{-- end alert --}}

            <div class="mb-4">
                <label for="tanggalLahir" class="block text-indigo-400 text-sm font-bold mb-2">Tanggal Lahir:</label>
                <input type="text" id="tanggalLahir" name="tanggalLahir" class="dark:bg-gray-800 text-white rounded-md py-2 px-3 w-full @error('tanggalLahir') is-invalid @enderror" 
                value="{{ old('tanggalLahir', $mahasiswa->tanggal_lahir) }}">
            </div>
            {{-- alert --}}
            @error('tanggalLahir')
                <div class="border-1-4 border-orange-500 text-orange-700 p-4" role="alert">
                    <p class="font-bold">{{ $message }}</p>
                </div>
            @enderror
            {{-- end alert --}}

            <div class="mb-4">
                <label for="jenisKelamin" class="block text-indigo-400 text-sm font-bold mb-2">Jenis Kelamin:</label>
                @if ($mahasiswa->jk == 'Laki-Laki')
                
                    <div class="flex items-center mb-4">
                        <input type="radio" id="jk" name="jk" value="Laki-Laki" class="form-radio h-5 w-5 text-blue-600 @error('jk') is-invalid @enderror" checked>
                        <label for="male" class="ml-2 text-indigo-400">Laki-Laki</label>
                    </div>
                    <div class="flex items-center mb-4">
                        <input type="radio" id="jk" name="jk" value="Perempuan" class="form-radio h-5 w-5 text-blue-600 @error('jk') is-invalid @enderror">
                        <label for="female" class="ml-2 text-indigo-400">Perempuan</label>
                    </div>
                @else
                    <div class="flex items-center mb-4">
                        <input type="radio" id="jk" name="jk" value="Laki-Laki" class="form-radio h-5 w-5 text-blue-600 @error('jk') is-invalid @enderror">
                        <label for="male" class="ml-2 text-white">Laki-Laki</label>
                    </div>
                    <div class="flex items-center mb-4">
                        <input type="radio" id="jk" name="jk" value="perempuan" class="form-radio h-5 w-5 text-pink-600 @error('jk') is-invalid @enderror" checked>
                        <label for="female" class="ml-2 text-white">Perempuan</label>
                    </div>
                @endif
            </div>
            {{-- alert --}}
            @error('jk')
                <div class="border-1-4 border-orange-500 text-orange-700 p-4" role="alert">
                    <p class="font-bold">{{ $message }}</p>
                </div>
            @enderror
            {{-- end alert --}}
            

            <div class="mb-4">
                <label for="prodi" class="block text-indigo-400 text-dm font-bold mb-2">Prodi:</label>
                <input type="text" id="prodi" name="prodi" class="dark:bg-gray-800 text-white rounded-md py-2 px-3 w-full @error('prodi') is-invalid @enderror" 
                value="{{ old('prodi', $mahasiswa->prodi) }}">
            </div>
            {{-- alert --}}
            @error('prodi')
                <div class="border-1-4 border-orange-500 text-orange-700 p-4" role="alert">
                    <p class="font-bold">{{ $message }}</p>
                </div>
            @enderror
            {{-- end alert --}}

            <div class="mb-4">
                <label for="jurusan" class="block text-indigo-400 text-dm font-bold mb-2">Jurusan:</label>
                <input type="text" id="jurusan" name="jurusan" class="dark:bg-gray-800 text-white rounded-md py-2 px-3 w-full @error('jurusan') is-invalid @enderror" 
                value="{{ old('jurusan', $mahasiswa->jurusan) }}">
            </div>
            {{-- alert --}}
            @error('jurusan')
                <div class="border-1-4 border-orange-500 text-orange-700 p-4" role="alert">
                    <p class="font-bold">{{ $message }}</p>
                </div>
            @enderror
            {{-- end alert --}}

            <div>
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded" name="tambah">Edit</button>
            </div>
        </form>
    </div>
    
</body>
</html>