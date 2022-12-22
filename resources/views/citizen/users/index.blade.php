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
               <form class="filterData">
                <div class="row">
                <h1>Filters</h1>
                  <div class="col-md-4">
                    <br/><br/><br/>
                    <label for="">Sort By:</label>
                    <select class="sortBy form-control" name="sortBy">
                         <option value="">Select Sorting</option>
                         <option value="asc" @if(!empty($_GET['sortBy'])) {{$_GET['sortBy'] == "asc" ? "selected" : ""}} @endif>Ascending</option>
                         <option value="desc" @if(!empty($_GET['sortBy']))   {{$_GET['sortBy'] == "desc" ? "selected" : ""}} @endif>Descending</option>
                    </select>
                  </div>
                </div>
              </form>
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
                    <th>Age</th>
                    <th>Picture</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody class="filter_user_details">
                    @include('citizen.users.filterUsers')
                  </tbody>
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
$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(".sortBy").on("change", function(){
      let sortBy = $('.sortBy').val();
      $.ajax({
        type: "POST",
        url: "/filter-user",
        data: {sortBy:sortBy},
        success: function (response) {
          $('.filter_user_details').html(response)
        },error:function(){
             alert('error')
        }
      });
    });
});
</script>

@endsection

