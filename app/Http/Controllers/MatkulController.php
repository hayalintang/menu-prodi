<?php

namespace App\Http\Controllers;

use App\Models\Cpl;
use App\Models\Cplmk;
use App\Models\Prodi;
use App\Models\Matkul;
use Illuminate\Http\Request;



class MatkulController extends Controller
{
    public function create()
    {
        $prodis = Prodi::all();
        $cpls = Cpl::all();
        return view('create_matkul', compact('prodis', 'cpls'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_prodi' => 'required|exists:cpls,kode_prodi',
            'kode_mk' => 'required|string|max:255|unique:matkuls,kode_mk',
            'deskripsi' => 'required|string',
            'kode_cpl' => 'required|array',
            'kode_cpl.*' => 'required|exists:cpls,kode_cpl',
            'bobot' => 'required|array',
            'bobot.*' => 'required|numeric|min:0|max:100',
        ]);

        $matkul = new Matkul();
        $matkul->kode_prodi = $request->kode_prodi;
        $matkul->kode_mk = $request->kode_mk;
        $matkul->deskripsi = $request->deskripsi;
        $matkul->save();

        foreach ($request->kode_cpl as $index => $kode_cpl) {
            $cplmk = new Cplmk();
            $cplmk->cpl_id = Cpl::where('kode_cpl', $kode_cpl)->first()->id;
            $cplmk->matkul_id = $matkul->id;
            $cplmk->bobot = $request->bobot[$index];
            $cplmk->save();
        }

        return redirect()->route('matkul.index')->with('success', 'Mata Kuliah berhasil ditambahkan.');
    }
    public function index()
    {
        $matkuls = Matkul::with('cpls')->get();
        return view('matkul', compact('matkuls'))->with('title', 'Mata Kuliah');
    }
}
