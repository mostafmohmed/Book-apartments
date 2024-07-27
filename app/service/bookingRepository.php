<?php
namespace App\service;

use App\Api\ApiResponse;
use App\Http\Requests\apartmentreqest;
use App\Mail\bookingmail;
use App\Models\Apartment;
use App\Models\Booking;
use Exception;
use Illuminate\Support\Facades\Mail;

class bookingRepository  implements bookinginterface {
public function create( $request,$apartment)
{

    try {
           
        $booking=$request->user()->book()->create([
'apartment_id'=>$apartment,
'phone'=>$request->phone,
'email'=>$request ->email,
'National ID'=>$request->National_ID,
 	
'address'=>$request ->address,
        ]);
        Mail::to('01117429622mo@gmail.com')->send(new bookingmail( $booking));
        
        return  ApiResponse::sendResponse(201, 'create sucess',$booking);
    }
    catch (Exception $e) {
        return    ApiResponse::sendResponse(401,$e->getMessage());
    }
}

public function index(){

}
public function delete($id){
    try {
           
        $news_type=Booking::find($id)->delete();
        
        return  ApiResponse::sendResponse(201, 'delete  sucess');
    }
    catch (Exception $e) {
        return    ApiResponse::sendResponse(401,$e->getMessage());
    }
}

}