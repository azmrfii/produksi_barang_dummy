@extends('layouts.edit')
@section('content')
  <div class="col-md-12">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">Input Detail Data Barang</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <form action="{{ route('barang.postDetail') }}" method="post" >
          @csrf
          @method('POST')
        <div class="row">
          <div class="col-sm-6">
            <!-- text input -->
            <div class="form-group">
              <label>Komponen</label>
              <select class="form-control" id="position-option" name="supplier_id" required>
                @foreach ($suppliers as $s)
                    <option value="{{ $s->id }}">{{ $s->name }} -- {{ $s->komponen }}</option>
                @endforeach
              </select>  
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button> |
        <a href="{{ route('barang.index') }}" class="btn btn-warning"><i class="fa fa-step-backward" aria-hidden="true"></i></a>
      </form>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
@endsection