@extends('backend.master')
@section('title', 'Dashboard')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>{{ $total_transaksi }}</h3>

            <p>Total Transaksi Hari Ini</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12">
      <div class="box">
          <!-- /.box-header -->
          <div class="box-body">
            <h2>Selamat Datang</h2>
          </div>
      </div>
    </div>
    
    <!-- /.row -->

  </section>
  <!-- /.content -->
  @endsection