<?php

namespace App\Http\Controllers;

use App\Http\Requests\BarangRequest;
use App\Http\Requests\DetailBarangRequest;
use App\Models\Barang;
use App\Models\DetailBarang;
use App\Models\Supplier;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = Barang::all();

        return view('barang.index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BarangRequest $request)
    {
        Barang::create($request->validated());
        return to_route('barang.index')->with('message', 'Barang berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        $suppliers = Supplier::all();
        
        $detailbarang = DetailBarang::where('barang_id', '=', $barang)->get();        
        // return view('barang.show', compact('barang', 'suppliers', 'barangs'));
        return view('barang.show', compact('barang', 'suppliers', 'detailbarang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        return view('barang.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BarangRequest $request, Barang $barang)
    {
        $barang->update($request->validated());
        return to_route('barang.index')->with('message', 'Barang berhasil dirubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();
        return back()->with('message', 'Barang berhasil dihapus.');
    }

    public function detail()
    {
        $barang = Barang::all();
        $suppliers = Supplier::all();
        $details = DetailBarang::all();
        return view('barang.detail', compact('barang', 'details', 'suppliers'));
    }

    public function tambah(DetailBarangRequest $request)
    {
        DetailBarang::create($request->validated());
        return back()->with('message', 'Komponen Detail Barang berhasil ditambahkan.');
        // return to_route('barang.index')->with('message', 'Komponen Detail Barang berhasil ditambahkan.');
    }
}
