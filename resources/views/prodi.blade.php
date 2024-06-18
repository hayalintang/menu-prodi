<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    @if (session('success'))
    <div class="bg-green-500 text-white p-2 rounded-lg mb-6">
        {{ session('success') }}
    </div>
    @endif
    <div class="mb-6 flex justify-end">
        <a href="{{ route('prodi.create') }}" class="bg-gray-900 text-white px-4 py-2 rounded-full shadow-xl hover:bg-gray-700">Tambah +</a>
    </div>
    <table class="min-w-full bg-white border border-gray-200">
        <thead>
            <tr>
                <x-thead>No</x-thead>
                <x-thead>Kode Program Studi</x-thead>
                <x-thead>Nama Program Studi</x-thead>
                <x-thead>Ketua Program Studi</x-thead>
                <x-thead>Aksi</x-thead>
            </tr>
        </thead>
        @foreach ($prodis as $prodi)
        <tbody>
                <tr>
                    <x-tbody>{{ $prodi->no }}</x-tbody>
                    <x-tbody>{{ $prodi->kode_prodi }}</x-tbody>
                    <x-tbody>{{ $prodi->nama_prodi }}</x-tbody>
                    <x-tbody>{{ $prodi->kaprodi->name }}</x-tbody>
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