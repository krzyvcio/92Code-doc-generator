<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;

abstract class Controller
{
    public function __construct(
        public Request $request
    ) {
    }
}