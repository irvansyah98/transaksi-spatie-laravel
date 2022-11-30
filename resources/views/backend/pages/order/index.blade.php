@extends('backend.master')
@section('title', 'List Order')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
      Pesanan
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Pesanan</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-xs-12">
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <br><br>
              <form action="{{ url('backend/order') }}" method="get" class="pull-left form-inline">
                <label for="">Cari</label>
                <input type="text" name="keyword" class="form-control" placeholder="Search" >
                <label for="">Start Date</label>
                <input type="date" name="start_date" class="form-control" placeholder="Start Date" >
                <label for="">End Date</label>
                <input type="date" name="end_date" class="form-control" placeholder="End Date" >
                <input type="submit" class="btn btn-success" value="Cari">
              </form>
              <br><br><br>
              <div class="table-responsive">
                <table id="table" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID.</th>
                    <th>Tanggal</th>
                    <th>Nama User</th>
                    <th>Tipe</th>
                    <th>Merek</th>
                    <th>Status</th>
                    @role('admin')
                    <th></th>
                    @endrole
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $item)
                      <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ date('d M Y', strtotime($item->created_at)) }}</td>
                        <td>{{ $item->user ? $item->user->fullname : '' }}</td>
                        <td>{{ $item->type }}</td>
                        <td>{{ $item->merk ? $item->merk->name : '' }}</td>
                        <td>
                          @if ($item->status_id == '1')
                              Pending
                          @elseif ($item->status_id == '2')
                              Approved
                          @else
                              Cancelled
                          @endif
                        </td>
                        @role('admin')
                        <td>
                          <form action="{{ url('/backend/order/'.$item->id) }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE">
                            <a href="{{ url('/backend/order/'.$item->id.'/edit') }}" class="btn btn-info"><i class="fa fa-pencil"></i> Edit</a>
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i> Hapus</button>
                          </form>
                        </td>
                        @endrole
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              {{ $data->links() }}
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </div>
    <!-- /.row -->

  </section>
  <!-- /.content -->
    
@endsection