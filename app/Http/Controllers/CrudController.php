<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CrudController extends Controller
{
    protected $template = null;
    protected $model = null;
    protected $model_base = null;

    public function __construct($model)
    {
        $this->template = Str::snake(class_basename($model));
        $this->model = new $model;
        $this->model_base = $model;
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

    public function store(Request $request)
    {
        $model = new $this->model_base;
        $model->fill( $request->all() );
        $model->save();
        return redirect('/' . $this->template . 's');
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
        return $this->editData($this->model->find($id), $request);
    }

    public function editData(Model $model, Request $request)
    {
        return $this->view($this->template . '.edit', [ $this->template => $model ]);
    }

    public function update(Request $request, string $id)
    {
        $model = $this->model->find($id);
        $model->fill( $request->all() );
        $model->update();
        return redirect('/' . $this->template . 's');
    }

    public function destroy(string $id)
    {
        $model = $this->model->find($id);
        $model->delete();
    }
}