<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BannerBundle;
use App\Models\Product;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class BannerBundleController extends Controller
{
    use ApiResponseTrait;

    public function index ()
    { 
    $item = [];
    
    $results = BannerBundle::all();

        $i =0;
        for ($i; $i < sizeof($results) ; $i++) { 
                $result = $results[$i];
            
            $p = json_decode($result->products);
            $x=0;
            $product = [];
            for ($x; $x < sizeof($p); $x++) { 
                $element = $p[$x];

                    $product[$x] = ([
                        "product" => Product::where("product_id", $element)->first()
                    ]);
            }

            $item[$i] = ([
                "id" => $result->banner_bundle_id,
                "title" => $result->title,
                "image" => $result->image,
                "body" => $result->body,
                "products" => $product
            ]);
        }
        
        return $this->SuccessResponse($item);
    }
}
