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
            <h1>Citizen</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Citizen</li>
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
                    <th>Name</th>
                    <th>CNIC</th>
                    <th>Profile Picture</th>
                    <th>State</th>
                    <th>City</th>
                    <th>Address</th>
                    <th>Education</th>
                    <th>Department</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @if($citizenDetails)
                    <?php $i=0; ?>
                    @foreach ($citizenDetails as $citizen)
                        <tr>
                            <td>{{++$i;}}</td>
                            <td>{{$citizen->name}}</td>
                            <td>{{$citizen->cnic}}</td>
                            <td><img width="50" height="50" src="{{asset('upload/'.$citizen['profile_picture'])}}">
                            <td>{{$citizen->state}}</td>
                            <td>{{$citizen->city_name}}</td>
                            <td>{{$citizen->address}}</td>
                            <td>{{$citizen->list_table}}</td>
                            <td>
                            @foreach($data as $datas)
                              @foreach ($datas as $department)
                                @if($citizen['citizenDetails_id'] == $department['citizen_id'] )
                                    {{$department['list_value']}},<br/>
                                @endif
                              @endforeach
                            @endforeach
                          </td>
                            <td>
                              {{-- <a href="{{url('citizen/'.$citizen->user_id.'/edit')}}"><i class="far fa-edit"></i></a> --}}
                              <form action="{{ route('citizen.destroy', $citizen->user_id ) }}" method="post">
                                @csrf
                                @method('DELETE')
                              <button type="submit" class=" btn fa fa-trash text-danger" onclick="return confirm('Are you sure to delete this citizen?')"><i class="fas fa-trash-alt"></i></button>
                              </form>
                            </td>
                          </tr>
                          @endforeach
                    @endif
                </table>
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
