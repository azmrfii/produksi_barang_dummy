@extends('layouts.edit')
@section('content')
  <div class="col-md-12">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">Edit Data Supplier : {{ $supplier->name }}</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <form action="{{ route('supplier.update', $supplier->id) }}" method="post" >
          @csrf
          @method('PUT')
        <div class="row">
          <div class="col-sm-6">
            <!-- text input -->
            <div class="form-group">
              <label>Nama supplier</label>
              <input type="text" class="form-control" placeholder="Enter ..." name="name" value="{{ $supplier->name }}" required>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label>Link</label>
              <input type="url" class="form-control" placeholder="Enter ..." name="link" value="{{ $supplier->link }}" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <!-- text input -->
            <div class="form-group">
              <label>Komponen</label>
              <input type="text" class="form-control" placeholder="Enter ..." name="komponen" value="{{ $supplier->komponen }}" required>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label>Harga/Pcs</label>
              <input type="number" class="form-control" placeholder="Enter ..." name="harga_pcs" value="{{ $supplier->harga_pcs }}" required>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button> |
        <a href="{{ route('supplier.index') }}" class="btn btn-warning"><i class="fa fa-step-backward" aria-hidden="true"></i></a>
      </form>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
@endsection