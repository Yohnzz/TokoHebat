<?php
namespace App\Repository;

use App\Interface\KategoriInterface;
use App\Models\Kategori;

class KategoriRepository implements KategoriInterface
{
    protected $model;
    public function __construct(Kategori $model){
        $this->model = $model;
    }

    public function getAll(){
        return $this->model->all();
    }
    public function create($request){
        return $this->model->create($request);
    }
    public function getById($id){
        return $this->model->findOrFail($id);
    }
    public function update($id, $request){
        $kategori = $this->model->findOrFail($id);
        return $kategori->update($request);
    }
    public function delete($id){
        $kategori = $this->model->findOrFail($id);
        return $kategori->delete();
    }
}