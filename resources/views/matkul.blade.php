<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    @if (session('success'))
    <div class="bg-green-500 text-white p-2 rounded-lg mb-6">
        {{ session('success') }}
    </div>
    @endif
    <div class="mb-6 flex justify-end">
        <a href="/matkul/create" class="bg-gray-900 text-white px-4 py-2 rounded-full shadow-xl hover:bg-gray-700">Tambah +</a>
    </div>
    <table class="min-w-full bg-white border border-gray-200">
        <thead>
            <tr>
                <x-thead>No</x-thead>
                <x-thead>Kode Prodi</x-thead>
                <x-thead>Kode Mata Kuliah</x-thead>
                <x-thead>Deskripsi</x-thead>
                <x-thead>CPL</x-thead>
                <x-thead class="w-40">Bobot (%)</x-thead>
                <x-thead class="w-40">Aksi</x-thead>
            </tr>
        </thead>
        @foreach ($matkuls as $matkul)
        <tbody>
                <tr>
                    <x-tbody>{{ $matkul->id }}</x-tbody>
                    <x-tbody>{{ $matkul->kode_prodi }}</x-tbody>
                    <x-tbody>{{ $matkul->kode_mk }}</x-tbody>
                    <x-tbody class="text-justify">{{ $matkul->deskripsi }}</x-tbody>
                    <x-tbody>
                        @foreach ($matkul->cpls as $cpl)
                            {{ $cpl->kode_cpl }}<br>
                        @endforeach
                    </x-tbody>
                    <x-tbody>
                        @foreach ($matkul->cpls as $cpl)
                            {{ $cpl->pivot->bobot }}%<br>
                        @endforeach
                    </x-tbody>
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