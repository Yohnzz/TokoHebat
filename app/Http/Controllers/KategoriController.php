<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Http\Requests\KategoriRequest;
use app\Interface\KategoriInterface;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    protected $repo;

    public function __construct(KategoriInterface $repo)
    {
        $this->repo = $repo;
    }

    public function index(){
        try {
            $data = $this->repo->getAll();
            return ResponseHelper::success($data, __('alert.success_index_kategori'));
        } catch (\Throwable $e) {
            return ResponseHelper::error(null, __('alert.fail_index_kategori'). $e->getMessage());
        }
    }

    public function store(KategoriRequest $request){
        try {
            $data = $this->repo->create($request->validated());
            return ResponseHelper::success($data, __('alert.success_store_kategori'));
        } catch (\Throwable $e) {
            return ResponseHelper::error(null, __('alert.fail_store_kategori'). $e->getMessage());
        }
    }

    public function show($id){
        try {
            $data = $this->repo->getById($id);
            return ResponseHelper::success($data, __('alert.success_show_kategori'));
        } catch (\Throwable $e) {
            return ResponseHelper::error(null, __('alert.fail_show_kategori'). $e->getMessage());
        }
    }
    public function update(KategoriRequest $request, $id){
        try {
            $data = $this->repo->update($id, $request->validated());
            return ResponseHelper::success($data, __('alert.success_update_kategori'));
        } catch (\Throwable $e) {
            return ResponseHelper::error(null, __('alert.fail_update_kategori'). $e->getMessage());
        }
    }
    public function destroy($id){
        try {
            $data = $this->repo->delete($id);
            return ResponseHelper::success($data, __('alert.success_destroy_kategori'));
        } catch (\Throwable $e) {
            return ResponseHelper::error(null, __('alert.fail_destroy_kategori'). $e->getMessage());
        }
    }

}
