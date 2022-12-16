@extends('layouts.index')

@section('content')
{{-- <section class="content">
    <div class="container-fluid">
    </div><!-- /.container-fluid -->
</section> --}}
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <a class='btn btn-primary float-end' data-toggle="modal" data-target="#exampleModalCenter" href="{{url('list/create')}}">Create List</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @if(session('success'))
                 <div class="alert alert-success">{{session('success')}}</div>
                @endif
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>id</th>
                    <th>List Name</th>
                    <th>List Table</th>
                    <th>List Value</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @if($list)
                    <?php $i=0; ?>
                        @foreach ($list as $list)
                        <tr>
                            <td>{{++$i;}}</td>
                            <td>{{$list->list_name}}</td>
                            <td>{{$list->list_table}}</td>
                            <td>{{$list->list_value}}</td>
                            <td>
                              <a href="{{url('list/'.$list->id.'/edit')}}"><i class="far fa-edit"></i></a>
                              <form action="{{ route('list.destroy', $list->id ) }}" method="post">
                                @csrf
                                @method('DELETE')
                              <button type="submit" class=" btn fa fa-trash text-danger" onclick="return confirm('Are you sure to delete this list?')"><i class="fas fa-trash-alt"></i></button>
                              </form>
                            </td>
                          </tr>
                        @endforeach
                    @endif
                </table>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Create List</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method='POST' action="{{url('list')}}" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
           <div class="form-group">
                  <label >List Name</label>
                  <input type="text" class="form-control @error('list_name') is-invalid @enderror"  value="{{ old('list_name') }}" name="list_name" placeholder="Enter list name">
                  @error('list_name')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
          </div>
          <div class="form-group">
              <label >List Table</label>
              <input type="text" class="form-control @error('list_table') is-invalid @enderror"  value="{{ old('list_table') }}" name="list_table" placeholder="Enter list table">
              @error('list_table')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
         </div>
          <div class="form-group">
              <label >List Value</label>
              <input type="text" class="form-control @error('list_value') is-invalid @enderror"  value="{{ old('list_value') }}" name="list_value" placeholder="Enter list name">
              @error('list_value')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
          </div>

          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Create List</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('script')
@if(session("success"))
<script>
  toastr.info("{{ session("success") }}");
<script>
@endif
@endsection
