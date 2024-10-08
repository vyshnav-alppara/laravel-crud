<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <title>Product Crud</title>
    <style>
    .body {
        background-color: #f2f0ef;
    }

    .navbar {
        background-color: #57c8fd;
        margin: 10px;
        border-radius: 10px;
    }

    .heading {
        padding: 20px;
    }
    </style>
</head>
<nav class="navbar navbar-dark sticky-top">
    <span class="heading navbar-brand  mb-0 h2">LARAVEL PRODUCT CRUD</span>
</nav>

<body class="body">

    <div class="container">

        <div class="row">

            <div class="col-md-2"> </div>
            <div class="col-md-8">
                <div class="card p-4" style="border-radius:20px;">
                    <a href="" class="btn btn-outline-success my-3" data-bs-toggle="modal"
                        data-bs-target="#addModal">Add
                        Product</a>
                    <input type="text" name="search" id="search" class="mb-3 form-control" placeholder="Search Here..">

                    <div class="table-data">

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" >#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col" style="width: 50%">Description</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $key=>$product)

                                <tr>
                                    <th>{{ $key+1}}</th>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td> {{ $product->price }}</td>
                                    <td>
                                        <a href="" class="btn btn-outline-primary update_product_form"
                                            data-bs-toggle="modal" data-bs-target="#updateModal"
                                            data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                                            data-description="{{ $product->description }}"
                                            data-price="{{ $product->price }}">
                                            <i class="las la-edit"></i>
                                        </a>
                                        <a href="" class="btn btn-outline-danger delete_product"
                                            data-id="{{ $product->id }}"> <i class="las la-times"></i></a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {!! $products->links('pagination::bootstrap-4') !!}

                    </div>
                </div>
            </div>

        </div>
    </div>

    @include('add_product_modal')
    @include('update_product_modal')
    @include('product_js')
    {!! Toastr::message() !!}


</body>

</html>