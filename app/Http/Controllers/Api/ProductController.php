<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait;

class ProductController extends Controller
{
    use ApiResponseTrait;

    public function index(Request $request)
    {
        try {
            $results = Product::query()
            ->Delivery($request->type)
            ->Active()
            ->get();
            return $this->SuccessResponse($results);
        } catch (\Throwable $th) {
            return $this->ErrorResponse($th->getMessage());
        }
    }

    public function show(Request $request)
    {
        try {
            $results = Product::query()->FindId($request->id);
            return $this->SuccessResponse($results);
        } catch (\Throwable $th) {
            return $this->ErrorResponse($th->getMessage());
        }
    }

    public function search(Request $request)
    {
        try {
            $results=Product::orwhere('name','like','%'.$request->searchKey.'%')->Active()->get();
            return $this->SuccessResponse($results);
        } catch (\Throwable $th) {
            return $this->ErrorResponse($th->getMessage());
        }
    }

    public function categoryProduct(Request $request)
    {
        try {
            $results = Product::query()->Delivery($request->type)
                    ->where('category_id', $request->id)->Active()->get();
            return $this->SuccessResponse($results);
        } catch (\Throwable $th) {
            return $this->ErrorResponse($th->getMessage());
        }
    }

    public function subCategoryProduct(Request $request)
    {
        //dd($request->id .''. $request->type);
        try {
            $results = Product::query()->Delivery($request->type)
                    ->where('subcategory_id', $request->id)->Active()->get();
            return $this->SuccessResponse($results);
        } catch (\Throwable $th) {
            return $this->ErrorResponse($th->getMessage());
        }
    }

}
