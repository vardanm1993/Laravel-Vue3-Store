@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Product</h1>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex">
                            <div class="mr-3">
                                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-success">Edit</a>
                            </div>

                            <form action="{{ route('product.delete', $product->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <tbody>
                                <tr>
                                    <td>ID</td>
                                    <td>{{ $product->id }}</td>
                                </tr>
                                <tr>
                                    <td>NAME</td>
                                    <td>{{ $product->title }}</td>
                                </tr>
                                <tr>
                                    <td>DESCRIPTION</td>
                                    <td>{{ $product->description }}</td>
                                </tr>
                                <tr>
                                    <td>CONTENT</td>
                                    <td>{{ $product->content }}</td>
                                </tr>
                                <tr>
                                    <td>PRICE</td>
                                    <td>{{ $product->price }}</td>
                                </tr>
                                <tr>
                                    <td>COUNT</td>
                                    <td>{{ $product->count }}</td>
                                </tr>
                                <tr>
                                    <td>STATUS</td>
                                    <td>{{ $product->status }}</td>
                                </tr>
                                <tr>
                                    <td>CATEGORY</td>
                                    <td>{{ $product->category->title }}</td>
                                </tr>
                                <tr>
                                    <td>COLORS</td>

                                    <td>
                                        @foreach($product->colors as $color)
                                            <div class="float-left ml-1"
                                                 style="width: 16px; height: 16px; background: {{ '#' . $color->title }}"></div>
                                        @endforeach

                                    </td>
                                </tr>
                                <tr>
                                    <td>TAGS</td>
                                    <td>
                                        @foreach($product->tags as $tag)
                                            <div class="float-left ml-1">{{ $tag->title }}</div>
                                        @endforeach
                                    </td>
                                </tr>

                                <tr>
                                    <td>IMAGE</td>
                                    <td><img src="{{ url('storage/' . $product->preview_image)}}"></td>
                                </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
