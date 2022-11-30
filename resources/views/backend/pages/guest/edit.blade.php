@extends('backend.master')
@section('title', 'Ubah Guest')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
      Ubah User guest
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">User guest</li>
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
                <form role="form" action="{{ url('backend/guest/'.$data->id) }}" method="post" enctype="multipart/form-data"> 
                  {{ csrf_field() }}
                  <input type="hidden" name="_method" value="PUT">
                  <div class="box-body">
                    <div class="form-group">
                      <div class="user-photo">
                          <input type="file" name="image" accept="image/*" id="image" style="opacity:0">
                          <input type="hidden" name="photo" id="photo">
                          <div class=""> Cover Photo (Max File Size: 1MB)</div>
                          <div class="upload">
                            <div class="upload-content">
                            @if (empty($data->photo))
                                <img src="{{ url('img/default.jpg') }}" id="preview-image"  width="200">
                            @else
                                @if ($data->photo)
                                <img src="{{ url($data->photo) }}" id="preview-image" width="200">
                                @else
                                <img src="{{ url('img/default.jpg') }}" id="preview-image" width="200">
                                @endif
                            @endif
                            </div>
                          </div>
                      </div>
                    </div><br>
                    <div class="form-group">
                      <label for="">Nama Lengkap</label>
                      <input type="text" class="form-control" id="" placeholder="Nama Lengkap" name="fullname" value="{{ $data->fullname }}" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Username</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Username" name="username" value="{{ $data->username }}" required>
                    </div>
                    <div class="form-group">
                      <label for="">No Telepon</label>
                      <input type="text" class="form-control" id="" placeholder="No Telepon" name="phone" value="{{ $data->phone }}" required>
                    </div>
                    <div class="form-group">
                      <label for="">Email</label>
                      <input type="email" class="form-control" id="" placeholder="Enter email" name="email" value="{{ $data->email }}" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                    </div>
                    <div class="form-group">
                      <label for="">Alamat</label>
                      <textarea class="form-control" id="" placeholder="Alamat" name="address">{{ $data->address }}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="">Description</label>
                      <textarea class="form-control" id="" placeholder="Description" name="description">{{ $data->description }}</textarea>
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