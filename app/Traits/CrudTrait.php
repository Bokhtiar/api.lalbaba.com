<?php

namespace App\Traits;

trait CrudTrait
{
    use ApiResponseTrait;

    public function scopeIndex($q)
    {
        return $q->get();
    }

    public function scopeInActive($q)
    {
        return $q->where('status',0);
    }

    public function scopeExpress($q)
    {
        return $q->where('type', 'express');
    }

    public function scopeH24d7($q)
    {
        return $q->where('type','24/7');
    }

    public function scopeDelivery($q, $request)
    {
        if($request == 'express'){
            return $this->Express();
        }else if($request == '24/7'){
           return $this->H24d7();
        }else{
            $error = "Product Delivery Type Not Seleted";
            return $this->ErrorResponse($error);
        }
    }



    public function scopeActive($q)
    {
        return $q->where('status',1);
    }

    public function scopeSearchBy($q, $search_key)
    {
        return $q->where('name','like','%'.$search_key.'%');
    }



    public function scopeStatus($q, $model)
    {
        if($model->status == 0){
            $model->status = 1;
            $model->save();
        }else{
            $model->status = 0;
            $model->save();
        }
    }

}
