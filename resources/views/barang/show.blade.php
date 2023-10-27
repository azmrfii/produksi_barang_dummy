@extends('layouts.edit')
@section('content')
<div class="col-md-12">
  @if (Session::get('message'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ Session::get('message') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  <div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">Data Barang : {{ $barang->name }}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <form action="{{ route('detailbarang.tambah') }}" method="post" >
        @csrf
        @method('POST')
      <div class="row">
        <div class="col-sm-6">
          <!-- text input -->
          <div class="form-group">
            <label>Kode Barang : {{ $barang->kd_barang }}</label>
            <br>
            <label>Nama Barang : {{ $barang->name }}</label>
            <input type="hidden" name="barang_id" value="{{ $barang->id }}">
            <br>
            <label>Komponen :</label>
            <div class="form-group">
              <table id="example1" class="table table-bordered table-striped">
                <tbody>
                  @foreach ($barang->detailbarangs as $detail)
                  <tr>
                    <td>{{ $detail->supplier->komponen }}</td>
                    {{-- <td>{{ $detail->supplier->harga_pcs }}</td> --}}
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="recipient-supplier" class="col-form-label">Tambah Komponen :</label>
            <select class="form-control" id="position-option" name="supplier_id" required>
              <option value="" disabled>-- Pilih Komponen --</option>
              @foreach ($suppliers as $s)
                  <option value="{{ $s->id }}">{{ $s->name }} -- {{ $s->komponen }}</option>
              @endforeach
            </select>       
          </div>
          <button type="submit" class="btn btn-primary">Tambah</button> |
          <a href="{{ route('barang.index') }}" class="btn btn-warning"><i class="fa fa-step-backward" aria-hidden="true"></i></a>
        </div>
        </div>
      </div>
    
    </form>
    </div>
    <!-- /.card-body -->
  </div>
</div>
@endsection