<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Turn;
use App\Services\TurnService;

class TurnController extends Controller
{
    private $service;

    public function __construct(TurnService $service)
    {
        $this->service = $service;
    }
    
    public function getList()
    {
        return $this->service->getList();
    }
}