<?php

namespace App\Http\Controllers;

use App\Models\TipeMobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class TipeMobilController extends Controller
{
    function index()
    {
        $tipeMobilData = TipeMobil::all();
        return view('pages.tipe_mobil.index', ['tipeMobilData' => $tipeMobilData]);
    }

    function create()
    {
        return view('pages.tipe_mobil.create');
    }

    function store(Request $request)
    {
        $tipeMobilData = new TipeMobil;
        $tipeMobilData->tipe = $request->tipe;
        $tipeMobilData->save();
        
        return redirect()->to('/tipe_mobil')->with('success', 'data tipe berhasil ditambahkan');
    }

    function formEdit($id)
    {
        $tipeMobilData = TipeMobil::find($id);
        return view('pages.tipe_mobil.form_edit', ['tipeMobilData' => $tipeMobilData]);
    }

    function update($id, Request $request)
    {
        $tipeMobilData = TipeMobil::find($id);
        $tipeMobilData->tipe = $request->tipe;
        $tipeMobilData->save();

        return redirect()->to('/tipe_mobil')->with('success', 'data tipe berhasil diupdate');
    }

    function delete($id)
    {
        $tipeMobilData = TipeMobil::find($id);
        $tipeMobilData->delete();

        return redirect()->to('/tipe_mobil')->with('success', 'data tipe berhasil dihapus');
    }
}