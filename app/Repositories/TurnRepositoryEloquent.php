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
        return $this->model->create($data);
    }

    public function getList()
    {
        return $this->model->all();
    }

    public function get($id)
    {
        return $this->model->findOrFail($id);
    }

    public function update(array $data, $id, Exception $exception)
    {
       

        $this->isHttpException($exception);

       if($this->model->find($id)->update($data)) {
            $turn = Turn::where('id', $id)->first();
            return $turn;

       } else {
            return "Error";
       }

      
    }

    public function destroy($id)
    {
        return $this->model->find($id)->delete();
    }
}

?>