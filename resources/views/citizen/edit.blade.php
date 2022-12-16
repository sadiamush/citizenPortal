@extends('layouts.index')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit User Form</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Edit</a></li>
                            <li class="breadcrumb-item active">User Form</li>
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
                                <h3 class="card-title">Update Citizen Details</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @foreach ($citizen as $citizen)
                            <form method='POST' action="{{ url('citizen') }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            value="{{ $citizen['name'] }}" name="name">
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control @error('email') is-invalid @enderror"
                                            value="{{ $citizen['email'] }}" name="email">
                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>CNIC</label>
                                        <input type="text" class="form-control @error('cnic') is-invalid @enderror"
                                            value="{{ $citizen['cnic'] }}" name="cnic">
                                        @error('cnic')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Role</label>
                                        <select name="role" class="form-control" id="">
                                            <option {{ $citizen->role == 'Organization' ? 'selected' : '' }}
                                                value="Organization">Organization</option>
                                            <option {{ $citizen->role == 'Citizen' ? 'selected' : '' }} value="Citizen">
                                                Citizen</option>
                                        </select>
                                        @error('role')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Profession</label>
                                        <input type="text" class="form-control @error('profession') is-invalid @enderror"
                                            value="{{ $citizen['profession'] }}" name="profession">
                                        @error('profession')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Age</label>
                                        <input type="text" class="form-control @error('age') is-invalid @enderror"
                                            value="{{ $citizen['age'] }}" name="age">
                                        @error('age')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" class="form-control @error('address') is-invalid @enderror"
                                            value="{{ $citizen['address'] }}" name="address">
                                        @error('address')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>City Name</label>
                                        <select name="city_name" class="form-control" id="">
                                            @foreach ($cityList as $cityList)
                                                <option {{ $citizen->city_name == $cityList['city_name'] ? 'selected' : '' }} value="{{$cityList['id']}}">{{$cityList['city_name']}}</option>
                                            @endforeach
                                        </select>
                                        @error('city_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Education</label>
                                        <select name="education_id" class="form-control" >
                                             @foreach ($educationList as $educationList)
                                                <option  {{ $educationList['list_table'] ==  $citizen->list_table ? 'selected' : '' }}  value="{{$educationList['id']}}">{{$educationList['list_table']}}</option>
                                             @endforeach
                                        </select>
                                        @error('education_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Department</label>
                                        <select name="department_id" class="form-control" id="">
                                            @foreach ($departmentList as $departmentList)
                                            <option {{ $departmentList['list_value'] ==  $citizen->list_value ? 'selected' : '' }}  value="{{$departmentList['id']}}">{{$departmentList['list_value']}}</option>
                                            @endforeach
                                       </select>
                                       @error('department')
                                           <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                           </span>
                                       @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Profile Picture</label>
                                        <br/>
                                        <img id="preview-image-before-upload" src="{{asset('storage/'.$citizen->profile_picture)}}"
                                        alt="preview image" width="250"><br/>
                                        <input type="file"
                                            class="form-control @error('profile_picture') is-invalid @enderror"
                                            name="profile_picture" id="image">
                                        @error('profile_picture')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Update User</button>
                                    </div>
                            </form>
                            @endforeach

                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('script')
<script>
$(document).ready(function () {
$('#image').change(function(){
    let reader = new FileReader();
    reader.onload = (e) => {
    $('#preview-image-before-upload').attr('src', e.target.result);
    }
    reader.readAsDataURL(this.files[0]);
    });
});
</script>
@endsection
