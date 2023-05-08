<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Booking_installment;
use App\Models\Booking_order;
use App\Models\Franchise;
use App\Models\Franchise_expence;
use App\Models\Plot;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $total_plots = Plot::all()->count();
        $available_plots = Plot::where('status',0)->get()->count();
        $purchased_plots = Plot::where('status',1)->get()->count();

        $total_price = 0;
        $booking = Booking::all();
        foreach($booking as $row){
            $total_price +=$row->down_payment;
        }
        $installment = Booking_installment::all();
        foreach($installment as $irow){
            $total_price += $irow->installment_amount;
        }
        $total_expanses = 0;
        $expanse = Franchise_expence::all();
        foreach($expanse as $xrow){
            $total_expanses += $xrow->amount;
        }
        $total_franchises = Franchise::all()->count();

        // dd($purchased_plots);
        return view('pages.dashboard',compact('total_plots','available_plots','purchased_plots','total_price','total_expanses','total_franchises'));
    }
}
