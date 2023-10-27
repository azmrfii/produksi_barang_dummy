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
        <h3 class="card-title">Data Barang | <a data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Keterangan</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($barangs as $barang)
            <tr>
              <td>{{ $barang->kd_barang }}</td>
              <td>{{ $barang->name }}</td>
              <td>{{ $barang->keterangan }}</td>
              <td>
                <form action="{{ route('barang.destroy', $barang->id) }}" method="POST">
                  <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                  <a href="{{ route('barang.show', $barang->id) }}" class="btn btn-light"><i class="fa fa-eye" aria-hidden="true"></i></a>
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger" onclick="return confirm('yakin ingin menghapus {{ $barang->name }}?')"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </form>
                </td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
          <tr>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Keterangan</th>
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
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Barang</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('barang.store') }}" method="post">
            @csrf
            @method('POST')
            <div class="modal-body">
                <div class="mb-3">
                    <label for="recipient-kd_barang" class="col-form-label">Kode Barang :</label>
                    <input type="text" class="form-control" id="recipient-kd_barang" name="kd_barang" required>
                  </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Nama Barang :</label>
                    <input type="text" class="form-control" id="recipient-name" name="name" required>
                  </div>
                <div class="mb-3">
                    <label for="recipient-keterangan" class="col-form-label">Keterangan :</label>
                    <textarea name="keterangan" id="recipient-keterangan" cols="30" rows="5" class="form-control" required></textarea>
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