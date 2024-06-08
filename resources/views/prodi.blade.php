<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <table class="min-w-full bg-white border border-gray-200">
        <thead>
            <tr>
                <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-200 text-center leading-4 text-gray-900 tracking-wider">No</th>
                <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-200 text-center leading-4 text-gray-900 tracking-wider">Kode Prodi</th>
                <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-200 text-center leading-4 text-gray-900 tracking-wider">Nama Prodi</th>
                <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-200 text-center leading-4 text-gray-900 tracking-wider">Kaprodi</th>
                <th class="px-6 py-3 border-b-2 border-gray-300 bg-gray-200 text-center leading-4 text-gray-900 tracking-wider">Actions</th>
            </tr>
        </thead>
        @foreach ($prodis as $prodi)
        <tbody>
                <tr>
                    <td class="px-6 py-4 border-b border-gray-300 text-center">{{ $prodi->no }}</td>
                    <td class="px-6 py-4 border-b border-gray-300 text-center">{{ $prodi->kode_prodi }}</td>
                    <td class="px-6 py-4 border-b border-gray-300 text-center">{{ $prodi->nama_prodi }}</td>
                    <td class="px-6 py-4 border-b border-gray-300 text-center">{{ $prodi->kaprodi->name }}</td>
                    <td class="px-6 py-4 border-b border-gray-300 text-center">
                        <a href="#" class="text-green-500 hover:text-green-700 mx-2">Edit</a>
                        <form action="#" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                        </form>
                    </td>
                </tr>
        </tbody>
        @endforeach
    </table>
  </x-layout>