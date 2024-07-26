<?php
namespace App\service;

use App\Api\ApiResponse;
use App\Http\Requests\apartmentreqest;
use App\Models\Apartment;
use Exception;

class apartmentRepository implements apartmentinterface{
public function create( $request)
{

    try {
           
        $news_type=Apartment::create($request->all());
        
        return  ApiResponse::sendResponse(201, 'create sucess');
    }
    catch (Exception $e) {
        return    ApiResponse::sendResponse(401,$e->getMessage());
    }
}
public function update($id,$request){
    try {
           
        $news_type=Apartment::find($id)->update($request->all());
        
        return  ApiResponse::sendResponse(201, 'update  sucess');
    }
    catch (Exception $e) {
        return    ApiResponse::sendResponse(401,$e->getMessage());
    }
}
public function index(){

}
public function delete($id){
    try {
           
        $news_type=Apartment::find($id)->delete();
        
        return  ApiResponse::sendResponse(201, 'delete  sucess');
    }
    catch (Exception $e) {
        return    ApiResponse::sendResponse(401,$e->getMessage());
    }
}

}