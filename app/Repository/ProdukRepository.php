<?php
namespace App\Repository;

use App\Interface\ProdukInterface;
use App\Models\Produk;

class ProdukRepository implements ProdukInterface
{
    protected $model;
    public function __construct(Produk $model){
        $this->model = $model;
    }

    public function getAll(){
        return $this->model->with('kategori')->get();
    }
    public function create($request){
        return $this->model->create($request);
    }
    public function getById($id){
        return $this->model->with('kategori')->findOrFail($id);
    }
    public function update($id, $request){
        $produk = $this->model->findOrFail($id);
        return $produk->update($request);
    }
    public function delete($id){
        $produk = $this->model->findOrFail($id);
        return $produk->delete();
    }
}