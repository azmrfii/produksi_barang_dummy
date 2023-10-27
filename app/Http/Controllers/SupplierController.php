<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::all();

        return view('supplier.index', compact('suppliers'));
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
    public function store(SupplierRequest $request)
    {
        Supplier::create($request->validated());
        return to_route('supplier.index')->with('message', 'Supplier berhasil ditambahkan.');
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
    public function edit(Supplier $supplier)
    {
        return view('supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SupplierRequest $request, Supplier $supplier)
    {
        $supplier->update($request->validated());
        return to_route('supplier.index')->with('message', 'Supplier berhasil dirubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return back()->with('message', 'Supplier berhasil dihapus.');
    }
}
