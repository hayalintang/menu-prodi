<?php

namespace App\Http\Controllers;

use App\Models\Cpl;
use App\Models\Prodi;
use Illuminate\Http\Request;

class CplController extends Controller
{
    public function create()
    {
        $prodis = Prodi::all();
        return view('create_cpl', compact('prodis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_prodi' => 'required|exists:prodis,kode_prodi',
            'kode_cpl' => 'required|string|max:255|unique:cpls,kode_cpl',
            'deskripsi' => 'required|string',
        ]);

        $cpl = new Cpl();
        $cpl->kode_prodi = $request->kode_prodi;
        $cpl->kode_cpl = $request->kode_cpl;
        $cpl->deskripsi = $request->deskripsi;
        $cpl->save();

        return redirect()->route('cpl.index')->with('success', 'Capaian Pembelajaran Lulusan (CPL) berhasil ditambahkan.');

        }

    public function index()
    {
        $cpls = Cpl::with('kode_prodi')->get();
        return view('cpl', compact('cpls'))->with('title', 'Capaian Pembelajaran Lulusan (CPL)');
    }
}
