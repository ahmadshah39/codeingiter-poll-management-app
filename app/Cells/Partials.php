<?php

namespace App\Cells;

class Partials
{
    public function header():string
    {
        $user = auth()->user();
        $menus = [
            [
                "name" => 'Polls',
                "path" => '/polls',
            ],
            [
                "name" => 'Poll results',
                "path" => '/polls-results',
            ],
        ];
        return view('partials/header', ['user' => $user , 'menus' => $menus]);
    }
}