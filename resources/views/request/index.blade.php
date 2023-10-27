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
        <h3 class="card-title">Data Request | <a data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Tanggal Request</th>
            <th>Barang</th>
            <th>Jumlah Barang di minta</th>
            <th>Approvement</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($requestbarangs as $request)
            <tr>
              <td>{{ $request->tgl_request }}</td>
              <td>{{ $request->barang->name }}</td>
              <td>{{ $request->jml_barang }}</td>
              <td>{{ $request->user->name }}</td>
              <td>
                <form action="{{ route('requestbarang.destroy', $request->id) }}" method="POST">
                  {{-- <a href="{{ route('requestbarang.edit', $request->id) }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a> --}}
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger" onclick="return confirm('yakin ingin menghapus {{ $request->name }}?')"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </form>
                </td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
          <tr>
            <th>Tanggal Request</th>
            <th>Barang</th>
            <th>Jumlah Barang di minta</th>
            <th>Approvement</th>
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
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Request</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('requestbarang.store') }}" method="post">
            @csrf
            @method('POST')
            <div class="modal-body">
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Barang :</label>
                    <select class="form-control" id="position-option" name="barang_id" required>
                      @foreach ($barangs as $b)
                          <option value="{{ $b->id }}">{{ $b->name }}</option>
                      @endforeach
                    </select>     
                </div>
                <div class="mb-3">
                    <label for="recipient-qty" class="col-form-label">Jumlah Barang :</label>
                    <input type="number" class="form-control" id="recipient-qty" name="jml_barang" required >
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