<?php

namespace App\Models;

use App\Traits\ApiResponseTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Traits\CrudTrait;

class Product extends Model
{
    use HasFactory;
    use CrudTrait;
    use ApiResponseTrait;

    protected $table='products';
    protected $primaryKey='product_id';

    protected $fillable = [
        'product_id',
        'name',
        'category_id',
        'category_name',
        'price',
        'body',
        'image',
        'type',
        'quantity',
        'alert_quantity'
    ];

    public function scopeValidation($value, $request){
        return Validator::make($request, [
            'name' => 'string | required | min:3',
            'category_id' => 'required',
            'price' => 'required',
            'body' => 'required',
            'type' => 'required',
            'quantity' => 'required',
            'alert_quantity' => 'required'
        ])->validate();
    }

    public function scopeImage($value, $request){
        $image=$request->file('image');
            if ($image){
            $image_name=Str::random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/product/image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
                if ($success) {
                    return $image_url;
                    }
                }
    }

    public function scopeFindId($q, $id)
    {
        return self::find($id);
    }


    public function scopeAvailableProduct()
    {
        self::where('quantity', 1);
    }


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }
}
