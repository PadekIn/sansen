<?php

namespace App\Http\Controllers;

use App\Models\Populasi;
use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;

class PopulasiController extends Controller
{
    public function index()
    {
        try {
            $populasis = Populasi::all();
            return view('pages.populasi.list', compact('populasis'));
        } catch (\Throwable $th) {
            return redirect()->route('main.populasi')->with('error', 'Server Error');
        }
    }

    public function create()
    {
        return view('pages.populasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jumlah' => 'required|integer',
            'berat' => 'required|integer',
            'umur_akhir' => 'required|decimal:0,3',
            'grade_doc' => 'required|in:Silver,Gold,Platinum',
            'bw_doc' => 'required|integer',
            'asal_doc' => 'required|string|max:255',
            'check_in' => 'required|date',
            'check_out' => 'required|date',
        ]);

        try {
            Populasi::create($request->all());
            return redirect()->route('main.populasi')->with('success', 'Data Populasi created successfully');
        } catch (\Throwable $th) {
            return redirect()->route('main.populasi')->with('error', 'Server Error, data populasi gagal ditambahkan');
        }
    }

    public function edit($id)
    {
        try {
            $unhashed = Hashids::decode($id)[0];
            $populasi = Populasi::findOrFail($unhashed);
            return view('pages.populasi.edit', compact('populasi'));
        } catch (\Throwable $th) {
            return redirect()->route('main.populasi')->with('error', 'Server Error');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jumlah' => 'required|integer',
            'berat' => 'required|integer',
            'umur_akhir' => 'required|decimal:0,3',
            'grade_doc' => 'required|in:Silver,Gold,Platinum',
            'bw_doc' => 'required|integer',
            'asal_doc' => 'required|string|max:255',
            'check_in' => 'required|date',
            'check_out' => 'required|date',
        ]);

        try {
            $unhashed = Hashids::decode($id)[0];
            $populasi = Populasi::findOrFail($unhashed);
            $populasi->update($request->all());

            return redirect()->route('main.populasi')->with('success', 'Data Populasi updated successfully');
        } catch (\Throwable $th) {
            return redirect()->route('main.populasi')->with('error', 'Server Error, data populasi gagal diubah');
        }
    }

    public function destroy($id)
    {
        try {
            $unhashed = Hashids::decode($id)[0];
            $populasi = Populasi::findOrFail($unhashed);
            $populasi->delete();
            return redirect()->route('main.populasi')->with('success', 'Data Populasi deleted successfully');
        } catch (\Throwable $th) {
            return redirect()->route('main.populasi')->with('error', 'Server Error, data populasi gagal dihapus');
        }
    }
}
