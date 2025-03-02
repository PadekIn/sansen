<?php

namespace App\Http\Controllers;

use App\Models\Performa_actual;
use App\Models\Populasi;
use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;

class ActualController extends Controller
{
    public function index()
    {
        try {
            $actuals = Performa_actual::with('populasi')->get();
            return view('pages.performa.actual.list', compact('actuals'));
        } catch (\Throwable $th) {
            return redirect()->route('main.actual')->with('error', 'Server Error');
        }
    }

    public function create()
    {
        $populasis = Populasi::all();
        return view('pages.performa.actual.create', compact('populasis'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'populasi_id' => 'required|exists:populasis,id',
                'fcr' => 'required|numeric',
                'fi' => 'required|numeric',
                'fe' => 'required|numeric',
                'dep' => 'required|numeric',
                'abw' => 'required|numeric',
                'adg' => 'required|integer',
                'ip' => 'required|integer',
            ]);

            Performa_actual::create($request->all());
            return redirect()->route('main.actual')->with('success', 'Data Actual created successfully');
        } catch (\Throwable $th) {
            return redirect()->route('main.actual')->with('error', 'Server Error, data actual gagal ditambahkan');
        }
    }

    public function edit($id)
    {
        try {
            $unhashed = Hashids::decode($id)[0];
            $actual = Performa_actual::findOrFail($unhashed);
            $populasis = Populasi::all();
            return view('pages.performa.actual.edit', compact('actual', 'populasis'));
        } catch (\Throwable $th) {
            return redirect()->route('main.actual')->with('error', 'Server Error');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'populasi_id' => 'required|exists:populasis,id',
                'fcr' => 'required|numeric',
                'fi' => 'required|numeric',
                'fe' => 'required|numeric',
                'dep' => 'required|numeric',
                'abw' => 'required|numeric',
                'adg' => 'required|integer',
                'ip' => 'required|integer',
            ]);

            $unhashed = Hashids::decode($id)[0];
            $actual = Performa_actual::findOrFail($unhashed);
            $actual->update($request->all());

            return redirect()->route('main.actual')->with('success', 'Data Actual updated successfully');
        } catch (\Throwable $th) {
            return redirect()->route('main.actual')->with('error', 'Server Error, data actual gagal diubah');
        }
    }

    public function destroy($id)
    {
        try {
            $unhashed = Hashids::decode($id)[0];
            $actual = Performa_actual::findOrFail($unhashed);
            $actual->delete();
            return redirect()->route('main.actual')->with('success', 'Data Actual deleted successfully');
        } catch (\Throwable $th) {
            return redirect()->route('main.actual')->with('error', 'Server Error, data actual gagal dihapus');
        }
    }
}
