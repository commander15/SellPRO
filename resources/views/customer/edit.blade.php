@extends('common.view', [
    'id' => 'customers',
    'title' => 'Edit Customer',
    'sub_title' => 'Customer Upgrade !'
])

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header"><h3 class="text-center font-weight-light my-4">Update Customer</h3></div>
                <div class="card-body">
                    <form method="POST" action="{{ url('/customers') . '/' . $customer->id }}">
                        @csrf
                        @method('PUT')
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="inputFirstName" name="name" value="{{ $customer->name }}" type="text" placeholder="Enter your first name">
                                    <label for="inputFirstName">Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input class="form-control" id="inputLastName" name="firstName" value="{{ $customer->firstName }}" type="text" placeholder="Enter your last name">
                                    <label for="inputLastName">First name</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="inputEmail" type="text" name="nic" value="{{ $customer->nic }}">
                            <label for="inputEmail">National ID Card</label>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-floating mb-3 mb-md-0">
                                    <div id="inputPassword" class="form-control">
                                        @if ($customer->sex == 'M')
                                            <input name="sex" value="M" type="radio" placeholder="Sex" checked>Male
                                            <input name="sex" value="F" type="radio" placeholder="Sex">Female
                                        @else
                                            <input name="sex" value="M" type="radio" placeholder="Sex">Male
                                            <input name="sex" value="F" type="radio" placeholder="Sex" checked>Female
                                        @endif
                                    </div>
                                    <label for="inputPassword">Sex</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 mb-0">
                            <div class="d-grid"><input type="submit" value="Update Customer" class="btn btn-primary btn-block"/></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection