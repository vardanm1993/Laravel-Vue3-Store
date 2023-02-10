@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit User</h1>
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
                <form action="{{ route('user.update', $user->id) }}" method="post">
                    @csrf
                    @method('patch')

                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Name" name="name"
                               value="{{   old('name') ?? $user->name }}">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Surname" name="surname"
                               value="{{   old('surname') ??$user->surname }}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Lastname" name="lastname"
                               value="{{   old('lastname') ??$user->lastname}}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Age" name="age"
                               value="{{  old('age')?? $user->age }}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Address" name="address"
                               value="{{  old('address') ??$user->address }}">
                    </div>
                    <div class="form-group">
                        <select name="gender" class="form-control gender" style="width: 100%">
                            <option disabled selected>Gender</option>
                            <option {{ $user->gender == 1 || old('gender') == 1 ? ' selected ' : '' }} value="1">Male
                            </option>
                            <option {{ $user->gender == 2 || old('gender') == 2 ? ' selected ' : '' }} value="2">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-warning" value="Update">
                    </div>
                </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
