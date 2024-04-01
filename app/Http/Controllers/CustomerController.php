<?php

namespace App\Http\Controllers;

use App\Models\Customer;

use Illuminate\Http\Request;

class CustomerController extends CrudController
{
    public function __construct()
    {
        parent::__construct(Customer::class);
    }
}
