@extends('layouts.app')
@section('content')
<div class="col-12">
    @if (Session::get('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Data Supplier | <a data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Nama Supplier</th>
            <th>Komponen</th>
            <th>Harga/Pcs</th>
            <th>Link</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($suppliers as $supplier)
            <tr>
              <td>{{ $supplier->name }}</td>
              <td>{{ $supplier->komponen }}</td>
              <td>Rp.{{ number_format($supplier->harga_pcs) }}</td>
              <td><a href="{{ $supplier->link }}" target="_blank">Klik Disini</a></td>
              <td>
                <form action="{{ route('supplier.destroy', $supplier->id) }}" method="POST">
                  <a href="{{ route('supplier.edit', $supplier->id) }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger" onclick="return confirm('yakin ingin menghapus {{ $supplier->name }}?')"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </form>
                </td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
          <tr>
            <th>Nama Supplier</th>
            <th>Komponen</th>
            <th>Harga/Pcs</th>
            <th>Link</th>
            <th>Action</th>
          </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Supplier</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('supplier.store') }}" method="post">
            @csrf
            @method('POST')
            <div class="modal-body">
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Nama Supplier :</label>
                    <input type="text" class="form-control" id="recipient-name" name="name" required>
                  </div>
                <div class="mb-3">
                    <label for="recipient-komponen" class="col-form-label">Komponen :</label>
                    <input type="text" class="form-control" id="recipient-komponen" name="komponen" required>
                  </div>
                <div class="mb-3">
                    <label for="recipient-harga_pcs" class="col-form-label">Harga/Pcs :</label>
                    <input type="text" class="form-control" id="recipient-harga_pcs" name="harga_pcs" required>
                  </div>
                <div class="mb-3">
                    <label for="recipient-link" class="col-form-label">Link :</label>
                    <input type="url" class="form-control" name="link" id="recipient-link" required />
                  </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
      </div>
    </div>
  </div>

@endsection