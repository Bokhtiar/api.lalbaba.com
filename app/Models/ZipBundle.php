<?php

namespace App\Models;

use App\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class ZipBundle extends Model
{
    use HasFactory; 
    use CrudTrait;
    protected $table='zip_bundles';
    protected $primaryKey='zip_bundle_id';

    protected $fillable = [
        'title',
        'zip_codes',
        'price',
        'body'
    ];

    public function scopeValidation($value, $request){
        return Validator::make($request, [
            'title' => 'string | required | max:15 | min:3',
            'zip_codes' => 'required'
        ])->validate();
    }

}
