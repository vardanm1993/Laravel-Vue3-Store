@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Products</h1>
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
                        <div class="card-header">
                            <a href="{{ route('product.create') }}" class="btn btn-primary">Add</a>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NAME</th>
                                    <th>DESCRIPTION</th>
                                    <th>CONTENT</th>
                                    <th>PRICE</th>
                                    <th>COUNT</th>
                                    <th>STATUS</th>
                                    <th>CATEGORY</th>
                                    <th>GROUP</th>
                                    <th>COLORS</th>
                                    <th>TAGS</th>
                                    <th>IMAGE</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td><a href="{{ route('product.show', $product->id) }}">{{ $product->title }}</a></td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->content }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->count }}</td>
                                        <td>{{ $product->status }}</td>
                                        <td>{{ $product->category->title }}</td>
                                        <td>{{ $product->group->title }}</td>
                                        <td>
                                            @foreach($product->colors as $color)
                                                <div class="float-left ml-1"
                                                     style="width: 16px; height: 16px; background: {{ '#' . $color->title }}"></div>
                                            @endforeach

                                        </td>
                                        <td>
                                            @foreach($product->tags as $tag)
                                                <div class="float-left ml-1">{{ $tag->title }}</div>
                                            @endforeach
                                        </td>
                                        <td>
                                            <img src="{{ url('storage/' . $product->preview_image)}}" alt="image">
                                        </td>

                                    </tr>
                                @endforeach
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
