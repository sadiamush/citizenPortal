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
            <h1>User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User</li>
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
                {{-- <a class='btn btn-primary float-end' href="{{url('user/create')}}">Complete the Details</a> --}}
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @if(session('success'))
                 <div class="alert alert-success">{{session('success')}}</div>
                @endif
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>CNIC</th>
                    <th>Role</th>
                    <th>Picture</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($user as $user)
                    <tr>
                        <td>{{$user['name']}}</td>
                        <td>{{$user['email']}}</td>
                        <td>{{$user['cnic']}}</td>
                        <td>{{$user['role']}}</td>
                        <td><img width="50" height="50" src="{{asset('storage/'.$user['profile_picture'])}}">
                        </td>
                        <td>
                          <a href="{{url('user/'.$user->id.'/edit')}}"><i class="far fa-edit"></i></a>
                          <form action="{{ route('user.destroy', $user->id ) }}" method="post">
                            @csrf
                            @method('DELETE')
                          <button type="submit" id="delete-user" class=" btn fa fa-trash text-danger" onclick="return confirm('Are you sure to delete this user?')"><i class="fas fa-trash-alt"></i></button>
                          </form>
                        </td>
                    </tr>
                    @endforeach
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
{{-- @if(session("success"))
<script>
  toastr.info("{{ session("success") }}");
<script>
@endif --}}
<script>

</script>

@endsection

