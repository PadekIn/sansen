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
        $request->validate([
            'populasi_id' => 'required|exists:populasis,id',
            'fcr' => 'required|decimal:0,3',
            'fi' => 'required|decimal:0,3',
            'fe' => 'required|decimal:0,3',
            'dep' => 'required|decimal:0,3',
            'abw' => 'required|decimal:0,3',
            'adg' => 'required|decimal:0,3',
            'ip' => 'required|decimal:0,3',
        ]);

        try {
            Performa_actual::create($request->all());
            return redirect()->route('main.actual')->with('success', 'Data Actual created successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());;
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
            return redirect()->back()->with('error', $th->getMessage());;
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'populasi_id' => 'required|exists:populasis,id',
            'fcr' => 'required|decimal:0,3',
            'fi' => 'required|decimal:0,3',
            'fe' => 'required|decimal:0,3',
            'dep' => 'required|decimal:0,3',
            'abw' => 'required|decimal:0,3',
            'adg' => 'required|decimal:0,3',
            'ip' => 'required|decimal:0,3',
        ]);

        try {
            $unhashed = Hashids::decode($id)[0];
            $actual = Performa_actual::findOrFail($unhashed);
            $actual->update($request->all());

            return redirect()->route('main.actual')->with('success', 'Data Actual updated successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());;
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
