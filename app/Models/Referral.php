<?php

namespace App\Models;

use App\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Referral extends Model
{
    use HasFactory;
    use CrudTrait;

    protected $table='referrals';
    protected $primaryKey='referral_id';

    protected $fillable = [
        'referral_price',
        'referral_code',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function referral_wallet()
    {
        $referral_amount = Auth::user()->referral_wallet;
        return $referral_amount;
    }
}
 