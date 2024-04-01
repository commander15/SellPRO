<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CrudController extends Controller
{
    protected $template = null;
    protected $model = null;

    public function __construct($model)
    {
        $this->template = Str::snake(class_basename($model));
        $this->model = new $model;
    }

    public function index()
    {
        return $this->view($this->template . '.index', $this->indexData());
    }

    public function indexData($columns = [ "*" ])
    {
        return [ $this->template . 's' => $this->model->all($columns) ];
    }
    public function create()
    {
        return $this->view($this->template . '.add');
    }

    public function show(string $id)
    {
        return $this->showData($this->model->find($id));
    }

    public function showData(Model $model)
    {
        return $this->view($this->template . '.show', [ $this->template => $model ]);
    }

    public function edit(string $id, Request $request)
    {
        return $this->editData($this->model->from, $request);
    }

    public function editData(Model $model, Request $request)
    {
        return $this->view($this->template . '.edit', [ $this->template => $model ]);
    }
}