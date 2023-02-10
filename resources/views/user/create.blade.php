@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Main</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <form action="{{ route('user.store') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Name" name="name" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" name="password" value="{{ old('password') }}">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password Confirm" name="password_confirmation" value="{{ old('password_confirmation') }}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Surname" name="surname" value="{{ old('surname') }}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Lastname" name="lastname" value="{{ old('lastname') }}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Age" name="age" value="{{ old('age') }}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Address" name="address" value="{{ old('address') }}">
                    </div>
                    <div class="form-group">
                        <select name="gender" class="form-control gender" style="width: 100%">
                            <option disabled selected>Gender</option>
                            <option {{ old('gender') == 1 ? ' selected ' : '' }} value="1">Male</option>
                            <option {{ old('gender') == 2 ? ' selected ' : '' }} value="2">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Create">
                    </div>
                </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
