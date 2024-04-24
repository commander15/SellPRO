@extends('common.view', [
    'id' => 'sellers',
    'title' => 'Edit Seller',
    'sub_title' => 'Upgrade !'
])

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header"><h3 class="text-center font-weight-light my-4">Update Account</h3></div>
                <div class="card-body">
                    <form method="POST" action="{{ url('/sellers') . '/' . $seller->id }}">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="inputFirstName" name="name" value="{{ $seller->name }}" type="text" placeholder="Enter your first name">
                                <label for="inputFirstName">Name</label>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="inputEmail" value="{{ $seller->email }}" type="email" name="email" placeholder="name@example.com">
                            <label for="inputEmail">Email address</label>
                        </div>
                            @if ($seller->id == Auth::user()->id)
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="inputPassword" name="password" type="password" placeholder="Create a password">
                                    <label for="inputPassword">Password</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" name="password2" id="inputPasswordConfirm" type="password" placeholder="Confirm password">
                                    <label for="inputPasswordConfirm">Confirm Password</label>
                                </div>
                            </div>
                        </div>
                            @endif
                        <div class="mt-4 mb-0">
                            <div class="d-grid"><input type="submit" value="Update Account" class="btn btn-primary btn-block"/></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection