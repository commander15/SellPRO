@extends('common.view', [
    'id' => 'products',
    'title' => 'Add Product',
    'sub_title' => 'Add new sellable thing !'
])

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Product</h3></div>
                <div class="card-body">
                    <form method="POST" action="{{ url('/products') }}">
                        @csrf
                        <div class="row mb-3">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="inputFirstName" name="name" type="text">
                                    <label for="inputFirstName">Name</label>
                                </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="description" name="description" type="text">
                            <label for="description">Description</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="inputEmail" value="0" type="number" name="price">
                            <label for="inputEmail">Price</label>
                        </div>
                        <div class="mt-4 mb-0">
                            <div class="d-grid"><input type="submit" value="Create Product" class="btn btn-primary btn-block"/></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection