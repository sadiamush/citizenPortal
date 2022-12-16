@extends('layouts.index')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">List</a></li>
              <li class="breadcrumb-item active">List Form</li>
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
                <h3 class="card-title">Update List</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method='POST' action="{{url('list/'.$singleList->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="card-body">
                        <div class="form-group">
                               <label >List Name</label>
                               <input type="text" class="form-control @error('list_name') is-invalid @enderror"  value="{{ $singleList['list_name'] }}" name="list_name" placeholder="Enter list name">
                               @error('list_name')
                               <div class="alert alert-danger">{{ $message }}</div>
                               @enderror
                       </div>
                       <div class="form-group">
                           <label >List Table</label>
                           <input type="text" class="form-control @error('list_table') is-invalid @enderror"  value="{{ $singleList['list_table'] }}" name="list_table" placeholder="Enter list table">
                           @error('list_table')
                           <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                      </div>
                       <div class="form-group">
                           <label >List Value</label>
                           <input type="text" class="form-control @error('list_value') is-invalid @enderror"  value="{{ $singleList['list_value'] }}" name="list_value" placeholder="Enter list value">
                           @error('list_value')
                           <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                       </div>

                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update List</button>
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
