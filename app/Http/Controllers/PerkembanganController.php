<?php

namespace App\Http\Controllers;

use App\Models\Pakan;
use App\Models\Perkembangan;
use App\Models\Populasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Vinkla\Hashids\Facades\Hashids;

class PerkembanganController extends Controller
{
    public function index() {
        try {
            $perkembangans = Perkembangan::with('populasi', 'pakanAtas', 'pakanBawah')->get();
            return view('pages.perkembangan.list', compact('perkembangans'));
        } catch (\Throwable $th) {
            return redirect()->route('login')->with('error', 'Something went wrong');
        }
    }

    public function create() {
        try{
            $populasis = Populasi::all();
            $pakans = Pakan::all();
            return view('pages.perkembangan.create', compact('populasis', 'pakans'));
        } catch (\Throwable $th) {
            return redirect()->route('login')->with('error', 'Something went wrong');
        }
    }

    public function store(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'populasi_id' => 'required|exists:populasis,id',
                'umur' => 'required|integer',
                'kematian_atas' => 'required|integer',
                'kematian_bawah' => 'required|integer',
                'id_tipe_pakan_atas' => 'nullable|exists:pakans,id',
                'pakan_atas' => 'required|integer',
                'id_tipe_pakan_bawah' => 'nullable|exists:pakans,id',
                'pakan_bawah' => 'required|integer',
                'abw_normal_atas' => 'required|decimal:0,3',
                'abw_normal_bawah' => 'required|decimal:0,3',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            Perkembangan::create($request->all());
            return redirect()->route('main.perkembangan')->with('success', 'Perkembangan created successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function edit($id) {
        try {
            $unhashed = Hashids::decode($id)[0];
            $perkembangan = Perkembangan::find($unhashed);
            $populasis = Populasi::all();
            $pakans = Pakan::all();
            return view('pages.perkembangan.edit', compact('perkembangan', 'populasis', 'pakans'));
        } catch (\Throwable $th) {
            return redirect()->route('main.perkembangan')->with('error', 'Something went wrong');
        }
    }

    public function update(Request $request, $id) {
        try {
            $request->validate([
                'populasi_id' => 'required|exists:populasis,id',
                'umur' => 'required|integer',
                'kematian_atas' => 'required|integer',
                'kematian_bawah' => 'required|integer',
                'id_tipe_pakan_atas' => 'nullable|exists:pakans,id',
                'pakan_atas' => 'required|integer',
                'id_tipe_pakan_bawah' => 'nullable|exists:pakans,id',
                'pakan_bawah' => 'required|integer',
                'abw_normal_atas' => 'required|decimal:0,3',
                'abw_normal_bawah' => 'required|decimal:0,3',
            ]);
            $unhashed = Hashids::decode($id)[0];
            $perkembangan = Perkembangan::find($unhashed);
            $perkembangan->update($request->all());
            return redirect()->route('main.perkembangan')->with('success', 'Perkembangan updated successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function destroy($id) {
        try {
            $unhashed = Hashids::decode($id)[0];
            $perkembangan = Perkembangan::find($unhashed);
            $perkembangan->delete();
            return redirect()->route('main.perkembangan')->with('success', 'Perkembangan deleted successfully');
        } catch (\Throwable $th) {
            return redirect()->route('main.perkembangan')->with('error', 'Something went wrong');
        }
    }
}
