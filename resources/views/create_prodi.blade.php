<x-layout>
    <x-slot:title>Tambah Program Studi</x-slot:title>
    <form action="{{ route('prodi.store') }}" method="POST" class="max-w-screen-md">
        @csrf
        <div class="mb-4">
            <label for="kode_prodi" class="block text-sm font-medium text-gray-700">Kode Program Studi</label>
            <input type="text" name="kode_prodi" id="kode_prodi" class="py-2 px-3 mt-1 block w-full border-gray-300 rounded-md shadow-lg" required>
        </div>
        <div class="mb-4">
            <label for="nama_prodi" class="block text-sm font-medium text-gray-700">Nama Program Studi</label>
            <input type="text" name="nama_prodi" id="nama_prodi" class="py-2 px-3 mt-1 block w-full border-gray-300 rounded-md shadow-lg" required>
        </div>
        <div class="mb-4">
            <label for="kaprodi_id" class="block text-sm font-medium text-gray-700">Ketua Program Studi</label>
            <select name="kaprodi_id" id="kaprodi_id" class="py-2 px-3 mt-1 block w-full border-gray-300 rounded-md shadow-lg" required>
              @foreach ($users as $user)
              <option value="{{ $user->id }}">{{ $user->name }}</option>
          @endforeach
            </select>
        </div>
        <div class="flex justify-end">
            <a href="/prodi" class="bg-gray-900 text-white px-4 py-2 mt-4 mr-2 rounded-full shadow-xl hover:bg-gray-700">Cancel</a>
            <button type="submit" class="bg-gray-900 text-white px-4 py-2 mt-4 rounded-full shadow-xl hover:bg-gray-700">Simpan</button>
        </div> 
    </form>
</x-layout>

