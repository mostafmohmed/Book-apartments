<?php

namespace App\Http\Controllers;

use App\Http\Requests\apartmentreqest;
use App\Http\Requests\updateapartmentreqest;
use App\service\apartmentRepository;
use Illuminate\Http\Request;

class apartmentcontroller extends Controller
{
    public $apartment;
    public function __construct(apartmentRepository $apartment) {
        $this->apartment = $apartment;
    }
    public function create(apartmentreqest  $request){
      return  $this->apartment->create($request);
    }
    public function update(updateapartmentreqest  $request,$id){
        return  $this->apartment->update($id,$request);
    }
    public function delete(  $id){
        return  $this->apartment->delete($id);
    }
}
