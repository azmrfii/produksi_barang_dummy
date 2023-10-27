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
        <h3 class="card-title">Detail Data Barang | <a data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Nama Barang</th>
            <th>Komponen</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($detailbarangs as $detail)
            <tr>
              <td>{{ $detail->barang->name }}</td>
              <td>{{ $detail->supplier->komponen }}</td>
              <td>
                <form action="{{ route('detailbarang.destroy', $detail->id) }}" method="POST">
                  {{-- <a href="{{ route('detailbarang.show', $detail->id) }}" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></a> --}}
                  <a href="{{ route('detailbarang.edit', $detail->id) }}" class="btn btn-info"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger" onclick="return confirm('yakin ingin menghapus {{ $detail->name }}?')"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </form>
                </td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
          <tr>
            <th>Nama Barang</th>
            <th>Komponen</th>
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
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Detail Barang</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('detailbarang.store') }}" method="post">
            @csrf
            @method('POST')
            <div class="modal-body">
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Nama Barang :</label>
                      <select class="form-control" id="position-option" name="barang_id" required>
                        @foreach ($barangs as $b)
                            <option value="{{ $b->id }}">{{ $b->name }}</option>
                        @endforeach
                      </select>                   
                </div>
                <div class="mb-3">
                    <label for="recipient-supplier" class="col-form-label">Supplier :</label>
                      <select class="form-control" id="position-option" name="supplier_id" required>
                        @foreach ($suppliers as $s)
                            <option value="{{ $s->id }}">{{ $s->name }} -- {{ $s->komponen }}</option>
                        @endforeach
                      </select>                   
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