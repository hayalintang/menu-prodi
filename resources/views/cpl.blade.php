<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="mb-6 flex justify-end">
        <a href="#" class="bg-gray-900 text-white px-4 py-2 rounded-full shadow-xl hover:bg-gray-700">Tambah +</a>
    </div>
    <table class="min-w-full bg-white border border-gray-200">
        <thead>
            <tr>
                <x-thead>No</x-thead>
                <x-thead class="w-40">Kode CPL</x-thead>
                <x-thead class="w-40">Kode Prodi</x-thead>
                <x-thead>Deskripsi</x-thead>
                <x-thead class="w-40">Aksi</x-thead>
            </tr>
        </thead>
        @foreach ($cpls as $cpl)
        <tbody>
                <tr>
                    <x-tbody>{{ $cpl->id }}</x-tbody>
                    <x-tbody class="w-40">{{ $cpl->kode_cpl }}</x-tbody>
                    <x-tbody class="w-40">{{ $cpl->kode_prodi }}</x-tbody>
                    <x-tbody class="text-justify">{{ $cpl->deskripsi }}</x-tbody>
                    <x-tbody class="w-40">
                        <a href="#" class="text-green-500 hover:text-green-700 mx-2">Edit</a>
                        <form action="#" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                        </form>
                    </x-tbody>
                </tr>
        </tbody>
        @endforeach
    </table>
  </x-layout>