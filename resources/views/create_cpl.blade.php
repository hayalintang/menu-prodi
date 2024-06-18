<x-layout>
    <x-slot:title>Tambah CPL</x-slot:title>
    <form action="{{ route('cpl.store') }}" method="POST" class="max-w-screen-md">
        @csrf
        <div class="mb-4">
            <label for="kode_prodi" class="block text-sm font-medium text-gray-700">Kode Program Studi</label>
            <select name="kode_prodi" id="kode_prodi" class="py-2 px-3 mt-1 block w-full border-gray-300 rounded-md shadow-lg" required>
              @foreach ($prodis as $prodi)
              <option value="{{ $prodi->kode_prodi }}">{{ $prodi->kode_prodi }}</option>
          @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="kode_cpl" class="block text-sm font-medium text-gray-700">Kode CPL</label>
            <input type="text" name="kode_cpl" id="kode_cpl" class="py-2 px-3 mt-1 block w-full border-gray-300 rounded-md shadow-lg" required>
        </div>
        <div class="mb-4">
            <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi"  cols="81" rows="6" class="mt-1 py-2 px-3 rounded-md shadow-lg" required></textarea>
        </div>
        <div class="flex justify-end">
            <a href="/prodi" class="bg-gray-900 text-white px-4 py-2 mt-4 mr-2 rounded-full shadow-xl hover:bg-gray-700">Cancel</a>
            <button type="submit" class="bg-gray-900 text-white px-4 py-2 mt-4 rounded-full shadow-xl hover:bg-gray-700">Simpan</button>
        </div> 
    </form>
</x-layout>

