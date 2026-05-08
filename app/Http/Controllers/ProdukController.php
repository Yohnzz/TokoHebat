<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Http\Requests\ProdukRequest;
use App\Interface\ProdukInterface;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    protected $repo;
    public function __construct(ProdukInterface $repo){
        $this->repo = $repo;
    }
        public function index(){
            try {
                $data = $this->repo->getAll();
                return ResponseHelper::success($data, __('alert.success_index_produk'));
            } catch (\Throwable $e) {
                return ResponseHelper::error(null, __('alert.fail_index_produk'). $e->getMessage());
            }
        }
    
        public function store(ProdukRequest $request){
            try {
                $data = $this->repo->create($request->validated());
                return ResponseHelper::success($data, __('alert.success_store_produk'));
            } catch (\Throwable $e) {
                return ResponseHelper::error(null, __('alert.fail_store_produk'). $e->getMessage());
            }
        
        }
    
        public function show($id){
            try {
                $data = $this->repo->getById($id);
                return ResponseHelper::success($data, __('alert.success_show_produk'));
            } catch (\Throwable $e) {
                return ResponseHelper::error(null, __('alert.fail_show_produk'). $e->getMessage());
            }
        }

        public function update(ProdukRequest $request, $id){
            try {
                $data = $this->repo->update($id, $request->validated());
                return ResponseHelper::success($data, __('alert.success_update_produk'));
            } catch (\Throwable $e) {
                return ResponseHelper::error(null, __('alert.fail_update_produk'). $e->getMessage());
            }
        }
    
        public function destroy($id){
            try {
                $data = $this->repo->delete($id);
                return ResponseHelper::success($data, __('alert.success_destroy_produk'));
            } catch (\Throwable $e) {
                return ResponseHelper::error(null, __('alert.fail_destroy_produk'). $e->getMessage());
            }
        }
}
