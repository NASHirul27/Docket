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
        <h1 class="text-3xl font-bold text-white mb-5">History</h1>
        <div id="dataTable">
           <table class="table table-auto border-collapse w-full">
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
                </tr>
            </thead>
            <tbody>
                @forelse ($history as $h)
                    <tr>
                        <td class="border px-4 py-2 text-white">{{ $loop->iteration }}</td>
                        <td class="border px-4 py-2 text-white">{{ $h->title }}</td>
                        <td class="border px-4 py-2 text-white">{{ $h->description }}</td>
                        <td class="border px-4 py-2 text-white">{{ $h->due_date }}</td>
                        <td class="border px-4 py-2 text-white">{{ $h->category }}</td>
                        <td class="border px-4 py-2 text-white">{{ $h->priority }}</td>
                        <td class="border px-4 py-2 text-white">{{ $h->status }}</td>
                        <td class="border px-4 py-2 text-white">{{ $h->updated_at }}</td>

                    </tr>
                    @empty
                        <h3 class="text-white">Task Doesn't Exist</h3>
                @endforelse
            </tbody>
            </table> 
        </div>
        
        {{ $history->links() }}
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