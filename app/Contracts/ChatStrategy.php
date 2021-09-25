<?php

namespace App\Contracts;

use Illuminate\Http\Request;

interface ChatStrategy
{
    public function HandleMessage(Request $request): array;
}
