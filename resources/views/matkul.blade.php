<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    @if (session('success'))
    <div class="bg-green-500 text-white p-2 rounded-lg mb-6">
        {{ session('success') }}
    </div>
    @endif
    <div class="mb-6 flex justify-end">
        <a href="{{ route('matkul.create') }}" class="bg-gray-900 text-white px-4 py-2 rounded-full shadow-xl hover:bg-gray-700">Tambah +</a>
    </div>
    <table class="min-w-full bg-white border border-gray-200">
        <thead>
            <tr>
                <x-thead>No</x-thead>
                <x-thead>Kode Program Studi</x-thead>
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
                    <x-tbody>{{ $matkul->deskripsi }}</x-tbody>
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
                    <x-tbody>
                        <a href="#" class= "mx-2">🖊</a>
                        <form action="#" method="POST" class="inline">
                            <button type="submit">🗑</button>
                        </form>
                    </x-tbody>
                </tr>
        </tbody>
        @endforeach
    </table>
  </x-layout>