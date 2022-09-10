<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Referral;
use App\Models\User;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    use ApiResponseTrait;

    // public function store(Request $request)
    // {
    //     if($request->referral_code){
    //         if(Auth::user()->referral_code == $request->referral_code){ //owner referral code not use 
    //             return $this->ErrorResponse("Your Referrel Code not for your");
    //         }else{ //owner referral code not use
    //             $referral = Referral::where('referral_code', $request->referral_code)
    //                                 ->where('user_id', Auth::id())->first();
                
    //             if($referral){//owner her referral code multiple user give the code one use can use one time not multiple time
    //                 return $this->ErrorResponse("you have already you this referral code");
    //             }else{//owner her referral code multiple user give the code one use can use one time not multiple time
                    
    //                 /**store referral code table  */
    //                 $referral_amount = 10; 
    //                 $rfl = new Referral;
    //                 $rfl->user_id = Auth::id();
    //                 $rfl->referral_code = $request->referral_code;
    //                 $rfl->referral_price = $referral_amount;
    //                 $rfl->save();

    //                 /**balance calculate */
    //                 $referral_balance = $referral_amount;
    //                 $payment_balance = $request->total_balance - $referral_amount;
                    
    //                 $validated = Order::query()->Validation($request->all());
    //                 if($validated){
    //                     try{
    //                         DB::beginTransaction();
                            
    //                         $order = Order::create([
    //                             'f_name' => $request->f_name,
    //                             'l_name' => $request->l_name,
    //                             'email' => $request->email,
    //                             'phone' => $request->phone,
    //                             'type' => $request->type,
    //                             'user_id' => Auth::user()->id,
    //                             'address_1' => $request->address_1,
    //                             'address_2' => $request->address_2,
    //                             'message' => $request->message,
    //                             'payment_number' => $request->payment_number,
    //                             'payment_type' => $request->payment_type,
    //                             'total_balance' => $request->total_balance,
    //                             'payment_balance' => $payment_balance,
    //                             'referral_balance' => $referral_balance,
    //                             'referral_type' => 'suggested'
    //                         ]);

    //                         if (!empty($order)) {
    //                             foreach (Cart::item_cart($request->type) as $cart) {
    //                                 $cart['order_id']=$order->order_id;
    //                                 $cart->save();
    //                             }
    //                             DB::commit();
    //                             $message = "Order Successfully Done..!";
    //                             return $this->SuccessResponse($message);
    //                         }
    //                         throw new \Exception('Invalid About Information');
    //                     }catch(\Exception $ex){
    //                         return $this->ErrorResponse($ex->getMessage());
    //                         DB::rollBack();
    //                     }
    //                 }
    //             }//owner her referral code multiple user give the code one use can use one time not multiple time
    //         }//owner referral code not use
    //     }else{
    //         /**referral balance [referal model check] */
    //         $referral_wallet_amount = Referral::referral_wallet();
    //         if($referral_wallet_amount != 0){ //check wallet amount
    //             /**above 600 without no order */
    //             if($request->total_balance <= 600){
    //                 return $this->SuccessResponse("minimun order balance above 600Taka");
    //             }
                
    //             /** referral amount update user wallet */
    //             $admin_referal_waller_set = 3;
    //             /** user wallet balance updated*/
    //             $user_wallet_update = $referral_wallet_amount - $admin_referal_waller_set;
                
    //             /** wallet balance deposite */
    //             $payment_balance =  $request->total_balance - $admin_referal_waller_set;
                
    //             /** how much use amount her referel wallet  */
    //             $referral_balance = $admin_referal_waller_set;

    //             $user = User::find(Auth::id());
    //             $user->referral_wallet = $user_wallet_update;
    //             $user->save();

    //             $validated = Order::query()->Validation($request->all());
    //                 if($validated){
    //                     try{
    //                         DB::beginTransaction();
                            
    //                         $order = Order::create([
    //                             'f_name' => $request->f_name,
    //                             'l_name' => $request->l_name,
    //                             'email' => $request->email,
    //                             'phone' => $request->phone,
    //                             'type' => $request->type,
    //                             'user_id' => Auth::user()->id,
    //                             'address_1' => $request->address_1,
    //                             'address_2' => $request->address_2,
    //                             'message' => $request->message,
    //                             'payment_number' => $request->payment_number,
    //                             'payment_type' => $request->payment_type,
    //                             'total_balance' => $request->total_balance,
    //                             'payment_balance' => $payment_balance,
    //                             'referral_balance' => $referral_balance,
    //                             'referral_type' => 'owner'
    //                         ]);

    //                         if (!empty($order)) {
    //                             foreach (Cart::item_cart($request->type) as $cart) {
    //                                 $cart['order_id']=$order->order_id;
    //                                 $cart->save();
    //                             }
    //                             DB::commit();
    //                             $message = "Order Successfully Done..!";
    //                             return $this->SuccessResponse($message);
    //                         }
    //                         throw new \Exception('Invalid About Information');
    //                     }catch(\Exception $ex){
    //                         return $this->ErrorResponse($ex->getMessage());
    //                         DB::rollBack();
    //                     }
    //                 }
                
    //         }
            
            
    //         $validated = Order::query()->Validation($request->all());
    //                 if($validated){
    //                     try{
    //                         DB::beginTransaction();
                            
    //                         $order = Order::create([
    //                             'f_name' => $request->f_name,
    //                             'l_name' => $request->l_name,
    //                             'email' => $request->email,
    //                             'phone' => $request->phone,
    //                             'type' => $request->type,
    //                             'user_id' => Auth::user()->id,
    //                             'address_1' => $request->address_1,
    //                             'address_2' => $request->address_2,
    //                             'message' => $request->message,
    //                             'payment_number' => $request->payment_number,
    //                             'payment_type' => $request->payment_type,
    //                             'total_balance' => $request->total_balance,
    //                             'payment_balance' => $request->total_balance,
    //                             'referral_balance' => 0,
    //                             'referral_type' => 'no-referral'
    //                         ]);

    //                         if (!empty($order)) {
    //                             foreach (Cart::item_cart($request->type) as $cart) {
    //                                 $cart['order_id']=$order->order_id;
    //                                 $cart->save();
    //                             }
    //                             DB::commit();
    //                             $message = "Order Successfully Done..!";
    //                             return $this->SuccessResponse($message);
    //                         }
    //                         throw new \Exception('Invalid About Information');
    //                     }catch(\Exception $ex){
    //                         return $this->ErrorResponse($ex->getMessage());
    //                         DB::rollBack();
    //                     }
    //                 }

    //         return $this->SuccessResponse("order successfuly"); 
    //     }
       
            
        
    // }


    public function store(Request $request)
    {
        
        $referral_balance = null;
        $payment_balance = null;
        $coupone_balance = null;
        /**check user referral type */
        if($request->referral_type){
            /**another referral coe use */
            if($request->referral_type == "another" && $request->referral_code){
                /**user not use her referral code */
                if(Auth::user()->referral_code == $request->referral_code){
                    return $this->ErrorResponse("Your Referrel Code not for your");
                }

                /**same user and same referral code not use multiple time */
                $referralExist = Referral::where('user_id', Auth::id())
                                    ->where('referral_code', $request->referral_code)
                                    ->first();
                if($referralExist){
                    return $this->ErrorResponse("you have already you this referral code");
                }
                    /**store referral code table  */ 
                    $admin_set_referral_amount = 10;
                    $rfl = new Referral;
                    $rfl->user_id = Auth::id();
                    $rfl->referral_code = $request->referral_code;
                    $rfl->referral_price = $admin_set_referral_amount;
                    $rfl->save();

                    /**owner referral code balance add */
                    $user_rfl_blnc = User::where("referral_code", $request->referral_code)->first();
                    $user_rfl_blnc->referral_wallet = $user_rfl_blnc->referral_wallet + $admin_set_referral_amount; 
                    $user_rfl_blnc->save();
                    
                    /**balance calculate */
                    $referral_balance = $admin_set_referral_amount;
                    $payment_balance = $request->total_balance - $admin_set_referral_amount;

            }

            /**user referral balance */
            if($request->referral_type == "owner"){

                /**admin set how much use this wallet balance */
                $admin_referal_wallet_set = 3;

                /**referral balance check */
                $referral_wallet_amount = Referral::referral_wallet();
                if($admin_referal_wallet_set >= $referral_wallet_amount){
                    return $this->SuccessResponse("Referral balance empty");
                }

                /**min 600 taka avobe for order  */
                if($request->total_balance <= 600){
                    return $this->SuccessResponse("minimun order balance above 600Taka");
                }
            
                /** user wallet balance updated*/
                $referral_wallet_amount = Referral::referral_wallet();
                $user_wallet_update = $referral_wallet_amount-$admin_referal_wallet_set;
                
                $user = User::find(Auth::id());
                $user->referral_wallet = $user_wallet_update;
                $user->save();



                /** wallet balance deposite */
                $payment_balance =  $request->total_balance - $admin_referal_wallet_set;
                
                /** how much use amount her referel wallet  */
                $referral_balance = $admin_referal_wallet_set;
            }
        }

        /**check coupone code */
        if($request->coupone_code){

            /**this coupone code details information */
            $coupone = Coupon::where('code', $request->coupone_code)->first();

            /**check minimum order price */
            if($request->total_balance <= $coupone->min_price){
                return $this->SuccessResponse("Minimum order is" . $coupone->min_price  );
            }

            /**check coupone code discount percentage */
            if($coupone->discount_percentage != null){
                /**check max price */
                if($request->total_balance >= $coupone->max_price){
                    $coupone_balance = $coupone->discount_percentage * 10;
                    //return $this->SuccessResponse($coupone_balance); 
                    $payment_balance = $request->total_balance - $coupone_balance;
                }else{
                    /**calculate percentage */
                    $coupone_balance = $coupone->discount_percentage * $request->total_balance / 100;
                    $payment_balance = $request->total_balance - $coupone_balance;
                }
                
            }

            /**check coupone code discount flat */
            if($coupone->discount_flat != null){
                $coupone_balance = $coupone->discount_flat;
                $payment_balance =  $request->total_balance - $coupone->discount_flat;
            }
        }
        
        /**store in database order table */
        $validated = Order::query()->Validation($request->all());
        if($validated){
            try{
                DB::beginTransaction();
                
                $order = Order::create([
                    'f_name' => $request->f_name,
                    'l_name' => $request->l_name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'type' => $request->type,
                    'user_id' => Auth::user()->id,
                    'address_1' => $request->address_1,
                    'address_2' => $request->address_2,
                    'message' => $request->message,
                    'payment_number' => $request->payment_number,
                    'payment_type' => $request->payment_type,
                    'total_balance' => $request->total_balance,
                    'payment_balance' =>  isset($payment_balance) ? $payment_balance : $request->total_balance,
                    'referral_balance' => isset($referral_balance) ? $referral_balance : 0,
                    'referral_type' => $request->referral_type,
                    'coupone_balance' => isset($coupone_balance) ? $coupone_balance : 0,
                    'coupone_code' => $request->coupone_code,
                ]);

                if (!empty($order)) {
                    foreach (Cart::item_cart($request->type) as $cart) {
                        $cart['order_id']=$order->order_id;
                        $cart->save();
                    }
                    DB::commit();
                    return $this->SuccessResponse("order successfuly"); 
                }
                throw new \Exception('Invalid About Information');
            }catch(\Exception $ex){
                return $this->ErrorResponse($ex->getMessage());
                DB::rollBack();
            }
        }
                    
    }
}

    

