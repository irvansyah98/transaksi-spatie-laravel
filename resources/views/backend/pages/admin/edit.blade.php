@extends('backend.master')
@section('title', 'Ubah Admin')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
      Ubah Admin
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Admin</li>
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
                <form role="form" action="{{ url('backend/admin/'.$data->id) }}" method="post"> 
                  {{ csrf_field() }}
                  <input type="hidden" name="_method" value="PUT">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="">Nama Lengkap</label>
                      <input type="text" class="form-control" id="" placeholder="Nama Lengkap" name="fullname" value="{{ $data->fullname }}" required>
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