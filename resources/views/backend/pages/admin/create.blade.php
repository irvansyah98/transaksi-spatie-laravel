@extends('backend.master')
@section('title', 'Buat Admin')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
      Buat Admin
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
                <form role="form" action="{{ url('backend/admin') }}" method="post">
                @csrf
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Lengkap</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Lengkap" name="fullname" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">No Telepon</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="No Telepon" name="phone" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required>
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