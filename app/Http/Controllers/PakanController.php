<?php

namespace App\Http\Controllers;

use App\Models\Pakan;
use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;

class PakanController extends Controller
{
    public function index()
    {
        try {
            $pakans = Pakan::all();
            return view("pages.pakan.list", compact("pakans"));
        } catch (\Throwable $th) {
            return redirect()->route('main.pakan')->with('error', 'Server Error');
        }
    }

    public function create()
    {
        return view('pages.pakan.create');
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'jenis' => 'required|string|max:75',
            'jumlah' => 'required|integer',
            'tgl_beli' => 'required|date',
            'keterangan' => 'nullable|string|max:255',
        ]);

        try {
            Pakan::create($request->all());
            return redirect()->route('main.pakan')->with('success', 'Pakan created successfully');
        } catch (\Throwable $th) {
            return redirect()->route('main.pakan')->with('error', 'Server Error, data pakan gagal ditambahkan');
        }
    }

    public function edit($id)
    {
        try {
            $unhashed = Hashids::decode($id)[0];
            $pakan = Pakan::findOrFail($unhashed);
            return view('pages.pakan.edit', compact('pakan'));
        } catch (\Throwable $th) {
            return redirect()->route('main.pakan')->with('error', 'Server Error');
        }
    }

    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'jenis' => 'required|string|max:75',
            'jumlah' => 'required|integer',
            'tgl_beli' => 'required|date',
            'keterangan' => 'nullable|string|max:255',
        ]);

        try {
            $unhashed = Hashids::decode($id)[0];
            $pakan = Pakan::findOrFail($unhashed);
            $pakan->update($request->all());

            return redirect()->route('main.pakan')->with('success', 'Pakan updated successfully');
        } catch (\Throwable $th) {
            return redirect()->route('main.pakan')->with('error', 'Server Error, data pakan gagal diubah');
        }
    }

    public function destroy($id)
    {
        try {
            $unhashed = Hashids::decode($id)[0];
            $pakan = Pakan::findOrFail($unhashed);
            $pakan->delete();
            return redirect()->route('main.pakan')->with('success', 'Pakan deleted successfully');
        } catch (\Throwable $th) {
            return redirect()->route('main.pakan')->with('error', $th->getMessage());
        }
    }
}
