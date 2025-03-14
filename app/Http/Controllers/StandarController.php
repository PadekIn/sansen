<?php

namespace App\Http\Controllers;

use App\Models\Standar_peforma;
use App\Models\Populasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Vinkla\Hashids\Facades\Hashids;

class StandarController extends Controller
{
    public function index() {
        try{
            $standars = Standar_peforma::with('populasi')->get();
            return view('pages.performa.standar.list', compact('standars'));
        } catch (\Throwable $th) {
            dd($th-> getMessage());
            return redirect()->route('login')->with('error', 'Something went wrong');
        }
    }

    public function create() {
        $populasis = Populasi::all();
        return view('pages.performa.standar.create', compact('populasis'));
    }

    public function store(request $request) {
        try {
            // tambahin eror handling untuk validasi, kalau eror return back with eror
            $validator = Validator::make($request->all(), [
                'populasi_id' => 'required|exists:populasis,id',
                'fcr' => 'required|decimal:0,3',
                'fi'  => 'required|decimal:0,3',
                'fe'  => 'required|decimal:0,2',
                'dep' => 'required|decimal:0,2',
                'abw' => 'required|decimal:0,2',
                'adg' => 'required|integer',
                'ip'  => 'required|integer'
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            Standar_peforma::create($request->all());
            return redirect()->route('main.standar')->with('success', 'Standar Performa created successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function edit($id) {
        try {
            $unhashed = Hashids::decode($id)[0];
            $standar = Standar_peforma::find($unhashed);
            $populasis = Populasi::all();
            return view('pages.performa.standar.edit', compact('standar', 'populasis'));
        } catch (\Throwable $th) {
            return redirect()->route('main.standar')->with('error', 'Something went wrong');
        }
    }

    public function update( request $request, $id) {
        try {
            $unhashed = Hashids::decode($id)[0];
            $standar = Standar_peforma::find($unhashed);
            $request->validate([
                'populasi_id' => 'required|exists:populasis,id',
                'fcr' => 'required|decimal:0,3',
                'fi'  => 'required|decimal:0,3',
                'fe'  => 'required|decimal:0,2',
                'dep' => 'required|decimal:0,2',
                'abw' => 'required|decimal:0,2',
                'adg' => 'required|integer',
                'ip'  => 'required|integer'
            ]);
            $standar->update($request->all());
            return redirect()->route('main.standar')->with('success', 'Standar Performa updated successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function destroy($id) {
        try {
            $unhashed = Hashids::decode($id)[0];
            $standar = Standar_peforma::find($unhashed);
            $standar->delete();
            return redirect()->route('main.standar')->with('success', 'Standar Performa deleted successfully');
        } catch (\Throwable $th) {
            return redirect()->route('main.standar')->with('error', 'Something went wrong');
        }
    }
}
