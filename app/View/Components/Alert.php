<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    public $type;
    public $message;

    public function __construct($type = 'info', $message = '')
    {
        $this->type = $type;
        $this->message = $message;
    }

//#15
    public function inlineStyle(): string
    {
        return match ($this->type) {
            'success' => 'background-color: #d4edda; color: #155724;',
            'error' => 'background-color: #f8d7da; color: #721c24;',
            'warning' => 'background-color: #fff3cd; color: #856404;',
            default => 'background-color: #e2e3e5; color: #383d41;',
        };
    }

    public function render()
    {
        return view('components.alert');
    }
}

