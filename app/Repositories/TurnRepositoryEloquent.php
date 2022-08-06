<?php 

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Models\Turn;

class TurnRepositoryEloquent implements TurnRepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function store(array $data)
    {
        try{
            return $this->model->create($data);

           }catch(\Exception $e){
             return "Error";
           }
    }

    public function getList()
    {
        return $this->model->all();
    }

    public function get($id)
    {
        return $this->model->find($id);
    }

    public function update(array $data, $id)
    {
        return $this->model->find($id)->update($data);
    }

    public function destroy($id)
    {
        return $this->model->find($id)->delete();
    }
}

?>