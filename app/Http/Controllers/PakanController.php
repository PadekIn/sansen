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
            return redirect()->route('login')->with('error', 'Something went wrong');
        }
    }

    public function create()
    {
        return view('pages.pakan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis' => 'required|string|max:75',
            'jumlah' => 'required|integer',
            'tgl_beli' => 'required|date',
            'keterangan' => 'nullable|string|max:255',
        ]);

        Pakan::create($request->all());
        return redirect()->route('pages.pakan.list')->with('success', 'Pakan created successfully');
    }

    public function edit($id)
    {
        try {
            $unhashed = Hashids::decode($id)[0];
            $pakan = Pakan::findOrFail($unhashed);
            return view('pages.pakan.edit', compact('pakan'));
        } catch (\Throwable $th) {
            return redirect()->route('login')->with('error', 'Something went wrong');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis' => 'required|string|max:75',
            'jumlah' => 'required|integer',
            'tgl_beli' => 'required|date',
            'keterangan' => 'nullable|string|max:255',
        ]);

        try {
            $unhashed = Hashids::decode($id)[0];
            $pakan = Pakan::findOrFail($unhashed);
            $pakan->update($request->all());
            return redirect()->route('pages.pakan.list')->with('success', 'Pakan updated successfully');
        } catch (\Throwable $th) {
            return redirect()->route('login')->with('error', 'Something went wrong');
        }
    }
}
