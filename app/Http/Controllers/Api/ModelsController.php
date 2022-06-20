<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Models;
use App\Services\ModelsService;

class ModelsController extends Controller
{
    private $service;

    public function __construct(ModelsService $service)
    {
        $this->service = $service;
    }

    public function getList()
    {
        return $this->service->getList();
    }

    public function get($id)
    {
        return $this->service->get($id);
    }

    public function store(Request $request)
    {
        return $this->service->store($request);
    }

    public function update(Request $request, $id)
    {
        return $this->service->update($request, $id);
    }

    public function delete($id)
    {
        return $this->service->destroy($id);
    }
}
