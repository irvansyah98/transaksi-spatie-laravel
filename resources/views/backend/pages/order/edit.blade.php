@extends('backend.master')
@section('title', 'Ubah Order')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
      Ubah Order
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Order</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-xs-6">
            <div class="box box-primary">
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="{{ url('backend/order/'.$data->id) }}" method="post"> 
                  {{ csrf_field() }}
                  <input type="hidden" name="_method" value="PUT">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="">Kode</label>
                      <input type="text" class="form-control" id="" placeholder="Kode" name="code" value="{{ $data->code }}" required>
                    </div>
                    <div class="form-group">
                      <label for="">User</label>
                      <input type="text" class="form-control" id=""  value="{{ $data->user ? $data->user->fullname : '' }}" readonly>
                    </div>
                    <div class="form-group">
                      <label for="">Type</label>
                      <select name="type" id="" class="form-control">
                        <option value="indoor" {{ $data->type == 'indoor' ? 'selected' : '' }} >indoor</option>
                        <option value="outdoor" {{ $data->type == 'outdoor' ? 'selected' : '' }}>outdoor</option>
                        <option value="lainnya"{{ $data->type == 'lainnya' ? 'selected' : '' }}>lainnya</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="">Merek</label>
                      <input type="text" class="form-control" id=""  value="{{ $data->merk->name }}" readonly>
                    </div>
                    <div class="form-group">
                      <label for="">Status</label>
                      <select name="status_id" id="" class="form-control">
                        <option value="1" {{ $data->status_id == 1 ? 'selected' : '' }} >Pending</option>
                        <option value="2" {{ $data->status_id == 2 ? 'selected' : '' }}>Approved</option>
                        <option value="3"{{ $data->status_id == 3 ? 'selected' : '' }}>Cancelled</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="">Deskripsi</label>
                      <textarea class="form-control" id="" placeholder="Deskripsi" name="description">{{ $data->description }}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="">Alamat Lengkap</label>
                      <textarea class="form-control" id="" placeholder="Alamat" name="location_address">{{ $data->location_address }}</textarea>
                    </div>
                  </div>
                  <br>
                  <!-- /.box-body -->
    
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
              <!-- /.box -->
        </div> 
    </div>
    <!-- /.row -->

  </section>
  <!-- /.content -->
    
@endsection