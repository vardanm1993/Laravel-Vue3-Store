@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Product</h1>
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
                <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    <div class="form-group">
                        <input type="text" value="{{ old('title')  ?? $product->title}}" class="form-control"
                               placeholder="name" name="title">
                    </div>
                    <div class="form-group">
                        <input type="text" value="{{ old('description') ?? $product->description  }}"
                               class="form-control" placeholder="description" name="description">
                    </div>
                    <div class="form-group">
                        <textarea name="content" placeholder="content" cols="30" rows="10"
                                  class="form-control">{{ old('content') ?? $product->content  }}</textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" value="{{ old('price') ?? $product->price  }}" class="form-control"
                               placeholder="price" name="price">
                    </div>
                    <div class="form-group">
                        <input type="text" value="{{ old('count') ?? $product->count }}" class="form-control"
                               placeholder="count" name="count">
                    </div>
                    <div class="form-group">
                        <select name="is_published" class="form-control check-status" style="width: 100%">
                            <option disabled selected>Choose a status</option>
                            <option {{ $product->is_published == 1 || old('is_published') == 1 ? ' selected ' : '' }} value="1">Published
                            </option>
                            <option {{ $product->is_published == 0 || old('is_published') == 2 ? ' selected ' : '' }} value="0">Unpublished</option>
                        </select>
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
                        <select name="category_id" class="form-control categories" style="width: 100%">
                            <option disabled>Choose a category</option>
                            @foreach($categories as $category)
                                <option
                                    value="{{ $category->id}}" {{ old('category_id') == $category->id ? 'selected' : ''}}> {{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="group_id" class="form-control groups" style="width: 100%">
                            <option disabled>Choose a group</option>
                            @foreach($groups as $group)
                                <option
                                    value="{{ $group->id}}" {{ old('group_id') == $group->id ? 'selected' : ''}}> {{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="tags[]" class="tags" multiple="multiple" data-placeholder="Choose a tag"
                                style="width: 100%">
                            @foreach($tags as $tag)
                                <option
                                    value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', $product->tags->pluck('id')->toArray())) ? 'selected' : '' }}>{{ $tag->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="colors[]" class="colors" multiple="multiple" data-placeholder="Choose a color"
                                style="width: 100%">
                            @foreach($colors as $color)
                                <option
                                    value="{{ $color->id }}" {{ in_array($color->id, old('colors', $product->colors->pluck('id')->toArray())) ? 'selected' : '' }}>{{ $color->title }}</option>
                            @endforeach
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
