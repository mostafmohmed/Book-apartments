<?php

namespace App\Http\Controllers;

use App\Api\ApiResponse;
use App\Models\Booking;
use App\Models\User;
use App\service\bookingRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class bookcontroller extends Controller
{

 public   $booking;
    public function __construct(bookingRepository $booking ) {
        $this->booking = $booking;
    } 
    public function create(Request $request,$apartment){
return  $this->booking->create($request,$apartment);
    }
}
