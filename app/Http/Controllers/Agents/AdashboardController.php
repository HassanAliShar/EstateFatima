<?php

namespace App\Http\Controllers\Agents;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Booking_installment;
use App\Models\Franchise;
use App\Models\Franchise_expence;
use App\Models\Plot;
use App\Models\User;
use Illuminate\Http\Request;

class AdashboardController extends Controller
{
    public function index(){
        $available_plots = Plot::where('status',0)->get()->count();
        $purchased_plots =Booking::where('created_by',auth()->user()->id)->get()->count();

        $total_price = 0;
        $booking_id = 0;
        $booking = Booking::with('installments')->where('created_by',auth()->user()->id)->get();

        // dd($booking);
        foreach($booking as $row){
            $total_price +=$row->down_payment;
            foreach($row->installments as $irow){
                $total_price += $irow->installment_amount;
            }
        }
        // $installment = Booking_installment::all();

        $total_expanses = 0;
        $user = User::with('franchise')->find(auth()->user()->id);
        // dd($user);
        $expanse = Franchise_expence::where('user_id',auth()->user()->id)->get();
        foreach($expanse as $xrow){
            $total_expanses += $xrow->amount;
        }

        // $franchise = Franchise::where('user_id',auth()->user()->id)->first();
        // $franchise->total_amount = $total_price;
        // $franchise->save();
        // dd($purchased_plots);
        return view('agents.pages.dashboard',compact('available_plots','purchased_plots','total_price','total_expanses','user'));
    }
}
