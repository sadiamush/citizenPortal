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
            <h1>Network</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Network</li>
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
                <a class='btn btn-primary float-end' data-toggle="modal" data-target="#exampleModal" href="{{url('network/create')}}">Create Network</a>
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
                    <th>City Name</th>
                    <th>Sate</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @if($network)
                    <?php $i=0; ?>
                        @foreach ($network as $network)
                        <tr>
                            <td>{{++$i;}}</td>
                            <td>{{$network->city_name}}</td>
                            <td>{{$network->state}}</td>
                            <td>
                              <a href="{{url('network/'.$network->id.'/edit')}}"><i class="far fa-edit"></i></a>
                              <form action="{{ route('network.destroy', $network->id ) }}" method="post">
                                @csrf
                                @method('DELETE')
                              <button type="submit" class=" btn fa fa-trash text-danger" onclick="return confirm('Are you sure to delete this user?')"><i class="fas fa-trash-alt"></i></button>
                              </form>
                            </td>
                          </tr>
                        @endforeach
                    @endif
                </table>
                <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Network</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method='POST' action="{{url('network')}}" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
           <div class="form-group">
                  <label >City Name</label>
                  <input type="text" class="form-control @error('city_name') is-invalid @enderror"  value="{{ old('city_name') }}" name="city_name" placeholder="Enter city name">
                  @error('city_name')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
          </div>
          <div class="form-group">
              <label >State</label>
              <input type="text" name="state" class="form-control @error('state') is-invalid @enderror" value="{{ old('state') }}"  placeholder="Enter state">
              @error('state')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
          </div>

          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Create Network</button>
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
