@extends('layouts.edit')
@section('content')
  <div class="col-md-12">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">Edit Detail Data Barang : {{ $detailbarang->barang->name }}</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <form action="{{ route('detailbarang.update', $detailbarang->id) }}" method="post" >
          @csrf
          @method('PUT')
        <div class="row">
          <div class="col-sm-6">
            <!-- text input -->
            <div class="form-group">
              <label>Nama Barang</label>
              <select class="form-control" id="position-option" name="barang_id" required disabled>
                @foreach ($barangs as $b)
                    <option value="{{ $b->id }}">{{ $b->name }}</option>
                @endforeach
              </select>     
            </div>
            <div class="form-group">
              <label for="recipient-supplier" class="col-form-label">Supplier :</label>
              <select class="form-control" id="position-option" name="supplier_id" required>
                @foreach ($suppliers as $s)
                    <option value="{{ $s->id }}">{{ $s->name }} -- {{ $s->komponen }}</option>
                @endforeach
              </select>       
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button> |
        <a href="{{ route('detailbarang.index') }}" class="btn btn-warning"><i class="fa fa-step-backward" aria-hidden="true"></i></a>
      </form>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
@endsection