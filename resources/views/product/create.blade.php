@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Product</h1>
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
                <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="name" name="title">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="description" name="description">
                    </div>
                    <div class="form-group">
                        <textarea name="content" placeholder="content" cols="30" rows="10"
                                  class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="price" name="price">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="count" name="count">
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="preview_image" type="file" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="images[]" type="file" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="images[]" type="file" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="images[]" type="file" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <select name="category_id" class="form-control categories" style="width: 100%">
                            <option selected="selected" disabled>Choose Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"> {{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="group_id" class="form-control groups" style="width: 100%">
                            <option selected="selected" disabled>Choose Group</option>
                            @foreach($groups as $group)
                                <option value="{{ $group->id }}"> {{ $group->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="tags[]" class="tags" multiple="multiple" data-placeholder="Choose a tag"
                                style="width: 100%">
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}"> {{ $tag->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="colors[]" class="colors" multiple="multiple" data-placeholder="Choose a color"
                                style="width: 100%">
                            @foreach($colors as $color)
                                <option  value="{{ $color->id }}"> {{ $color->title }}</option>
                            @endforeach
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
