<x-layout>
    <x-slot:title>Tambah Mata Kuliah</x-slot:title>
    <form action="{{ route('matkul.store') }}" method="POST" class="max-w-screen-md">
        @csrf
        <div class="mb-4">
            <label for="kode_prodi" class="block text-sm font-medium text-gray-700">Kode Program Studi</label>
            <select name="kode_prodi" id="kode_prodi" class="py-2 px-3 mt-1 block w-full border-gray-300 rounded-md shadow-lg" required>
              @foreach ($cpls as $cpl)
              <option value="{{ $cpl->kode_prodi }}">{{ $cpl->kode_prodi }}</option>
          @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="kode_mk" class="block text-sm font-medium text-gray-700">Kode Mata Kuliah</label>
            <input type="text" name="kode_mk" id="kode_mk" class="py-2 px-3 mt-1 block w-full border-gray-300 rounded-md shadow-lg" required>
        </div>
        <div class="mb-4">
            <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi"  cols="81" rows="6" class="mt-1 py-2 px-3 rounded-md shadow-lg" required></textarea>
        </div>
        <div id="cpl-bobot-container">
            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="kode_cpl_0" class="block text-sm font-medium text-gray-700">Kode CPL</label>
                    <select name="kode_cpl[]" id="kode_cpl_0" class="py-2 px-3 mt-1 block w-[570px] border-gray-300 rounded-md shadow-lg" required>
                        @foreach ($cpls as $cpl)
                            <option value="{{ $cpl->kode_cpl }}">{{ $cpl->kode_cpl }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex-1">
                    <label for="bobot_0" class="block text-sm font-medium text-gray-700">Bobot (%)</label>
                    <input type="number" name="bobot[]" id="bobot_0" class="py-2 px-3 mt-1 block w-[125px] border-gray-300 rounded-md shadow-lg" required>
                </div>
                <div class="flex-1 flex items-end">
                    <button type="button" onclick="addCplBobot()" class="bg-gray-900 text-white text-2xl py-1 px-3 rounded-full shadow-xl hover:bg-gray-700">+</button>
                </div>
            </div>
        </div>
        <div class="flex justify-end">
            <a href="/matkul" class="bg-gray-900 text-white px-4 py-2 mt-4 mr-2 rounded-full shadow-xl hover:bg-gray-700">Cancel</a>
            <button type="submit" class="bg-gray-900 text-white px-4 py-2 mt-4 rounded-full shadow-xl hover:bg-gray-700">Simpan</button>
        </div> 
    </form>
</x-layout>

<script>
    let cplCount = 1;

    function addCplBobot() {
        const cplBobotContainer = document.getElementById('cpl-bobot-container');
        const newCplBobot = document.createElement('div');
        newCplBobot.classList.add('mb-4', 'flex', 'space-x-4');
        newCplBobot.innerHTML = `
            <div class="flex-1">
                <label for="kode_cpl_${cplCount}" class="block text-sm font-medium text-gray-700">Kode CPL</label>
                <select name="kode_cpl[]" id="kode_cpl_${cplCount}" class="py-2 px-3 mt-1 block w-[570px] border-gray-300 rounded-md shadow-lg" required>
                    @foreach ($cpls as $cpl)
                        <option value="{{ $cpl->kode_cpl }}">{{ $cpl->kode_cpl }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex-1">
                <label for="bobot_${cplCount}" class="block text-sm font-medium text-gray-700">Bobot (%)</label>
                <input type="number" name="bobot[]" id="bobot_${cplCount}" class="py-2 px-3 mt-1 block w-[125px] border-gray-300 rounded-md shadow-lg" required>
            </div>
            <div class="flex-1 flex items-end">
                <button type="button" onclick="removeCplBobot(this)" class="bg-red-500 text-white px-4 py-2 rounded-full shadow-xl hover:bg-red-700">-</button>
            </div>
        `;
        cplBobotContainer.appendChild(newCplBobot);
        cplCount++;
    }

    function removeCplBobot(button) {
        button.closest('.mb-4').remove();
    }
</script>
