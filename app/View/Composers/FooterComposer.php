<?php

namespace App\View\Composers;

use Illuminate\View\View;
use App\Models\User;

class FooterComposer
{
//    #22
    public function compose(View $view): void
    {
        $view->with('userCountFromClass', User::count());
    }
}
