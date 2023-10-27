<?php

namespace App\Http\Controllers;

use App\Http\Requests\DataBarangRequest;
use App\Models\Barang;
use App\Models\RequestBarang;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = Barang::all();
        $requestbarangs = RequestBarang::all();

        return view('request.index', compact('requestbarangs', 'barangs'));
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
    public function store(Request $request)
    {
        // dd($request->validated());
        $requestbarang = new RequestBarang();

        $requestbarang->tgl_request = Carbon::now();
        $requestbarang->barang_id = $request->input('barang_id');
        $requestbarang->jml_barang = $request->input('jml_barang');
        $requestbarang->user_id = \Illuminate\Support\Facades\Auth::user()->id;

        // dd($requestbarang);
        $requestbarang->save();
        // RequestBarang::create($request->validated());
        return to_route('requestbarang.index')->with('message', 'Request Barang berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RequestBarang $requestbarang)
    {
        $requestbarang->delete();
        return back()->with('message', 'Request Barang berhasil dihapus.');
    }
}
