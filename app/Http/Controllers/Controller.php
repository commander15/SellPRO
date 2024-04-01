<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected $message = null;

    protected function view(string $view, array $data = [])
    {
        if ($this->message) {
            $data['message'] = $this->message;
            $this->message = null;
        }

        return view($view, $data);
    }

    protected function reportSuccess($message = null) 
    {
        if (!$message)
            $message = 'Data saved !';        
        $this->showMessage($message, 'success');
    }

    protected function reportFaillure($message = null)
    {
        if (!$message)
            $message = 'Error during data saving !';
        $this->showMessage($message,'warning');
    }

    protected function showMessage($message = null, $type)
    {
        $this->message['content'] = $message;
        $this->message['type'] = $type;
    }
}
