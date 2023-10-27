<?php

namespace App\Http\Controllers;

use App\Http\Requests\DetailBarangRequest;
use App\Models\Barang;
use App\Models\DetailBarang;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detailbarangs = DetailBarang::all();
        $barangs = Barang::all();
        $suppliers = Supplier::all();

        return view('detail.index', compact('detailbarangs', 'barangs', 'suppliers'));
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
    public function store(DetailBarangRequest $request)
    {
        DetailBarang::create($request->validated());
        return to_route('detailbarang.index')->with('message', 'Detail Barang berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(DetailBarang $detailbarang)
    {
        $suppliers = Supplier::all();

        $detailbarangs = DB::table('detail_barangs')
        ->leftJoin('barangs', 'barangs.id', '=', 'detail_barangs.barang_id')
        ->leftJoin('suppliers', 'suppliers.id', '=', 'detail_barangs.supplier_id')
        // ->groupBy('barangs.id')
        ->where('barangs.id', '=', 'detail_barangs.barang_id')
        // ->where('detail_barangs.barang_id', '=', 'barangs.id')
        // ->where($detailbarang->barang->name, '=', 'barangs.name')
        ->get();

        dd($detailbarangs);

        // return view('detail.show', compact('detailbarang', 'detailbarangs', 'suppliers'));
        // $barangs = Barang::all();
        // $detailbarangs = DetailBarang::all();

        // return view('detail.show', compact('detailbarang', 'barangs', 'suppliers', 'detailbarangs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetailBarang $detailbarang)
    {
        $barangs = Barang::all();
        $suppliers = Supplier::all();

        return view('detail.edit', compact('detailbarang', 'barangs', 'suppliers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DetailBarangRequest $request, DetailBarang $detailbarang)
    {
        $detailbarang->update($request->validated());
        return to_route('detailbarang.index')->with('message', 'Detail Barang berhasil dirubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetailBarang $detailbarang)
    {
        $detailbarang->delete();
        return back()->with('message', 'Detail Barang berhasil dihapus.');
    }
}
