<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function create()
    {
        $users = User::all();
        return view('create_prodi', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_prodi' => 'required|string|max:255|unique:prodis,kode_prodis',
            'nama_prodi' => 'required|string',
            'kaprodi_id' => 'required|exists:users,id',
        ]);

        $prodi = new Prodi();
        $prodi->kode_prodi = $request->kode_prodi;
        $prodi->nama_prodi = $request->nama_prodi;
        $prodi->kaprodi_id = $request->kaprodi_id;
        $prodi->save();

        return redirect()->route('prodi.index')->with('success', 'Program Studi berhasil ditambahkan.');

        }

    public function index()
    {
        $prodis = Prodi::with('kaprodi')->get();
        return view('prodi', compact('prodis'))->with('title', 'Program Studi');
    }
}
    
