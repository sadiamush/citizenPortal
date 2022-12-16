@extends('layouts.index')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Network Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Network</a></li>
              <li class="breadcrumb-item active">Network Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6 mx-auto">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Network</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method='POST' action="{{url('network/'.$singleNetwork->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                 <div class="form-group">
                        <label >City Name</label>
                        <input type="text" class="form-control @error('city_name') is-invalid @enderror"  value="{{$singleNetwork['city_name']}}" name="city_name" placeholder="Enter city name">
                        @error('city_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                </div>
                <div class="form-group">
                    <label >State</label>
                    <input type="text" name="state" class="form-control @error('state') is-invalid @enderror" value="{{$singleNetwork['state']}}"  placeholder="Enter state">
                    @error('state')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update Network</button>
                </div>
              </form>
            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
