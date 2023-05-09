<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Models\Block_category;
use App\Models\Booking;
use App\Models\Booking_installment;
use App\Models\Booking_order;
use App\Models\Customer;
use App\Models\Franchise;
use App\Models\Nominee;
use App\Models\Plot;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index(){
        $customer = Customer::with('bookings')->with('booking.plot.block')->get();
        // dd($customer);
        return view('customers.manage',compact('customer'));
    }
    public function add(){
        $blocks = Block::all();
        $block_cat = Block_category::all();
        $franchises = User::with('franchise')->where('role_id',2)->where('status',0)->get();
        return view('customers.add',compact('blocks','block_cat','franchises'));
    }

    public function store(Request $request){
        try{
            $request->validate([
                'name'=>'required|string',
                'email' => 'nullable',
                'mobile_no' => 'required',
                'cnic_no' => 'nullable',
                'phone' => 'nullable',
                'address' => 'required',
                'gender' => 'required',
                'p_address' => 'nullable',
                'passport' => 'nullable',
                'gardion' => 'nullable|string',
                'relation' => 'nullable',
                'n_email' => 'nullable',
                'preferred_choices'=>'required',
                'image' => 'required|image',
                'n_image' => 'required|image',
            ]);
            DB::beginTransaction();
            $customer = new Customer();
            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->mobile_no = $request->mobile_no;
            $customer->cnic_no = $request->cnic_no;
            $customer->phone = $request->phone;
            $customer->perment_address = $request->address;
            $customer->postal_address = $request->p_address;
            $customer->gender = $request->gender;
            if ($files = $request->file('image')){
                // Define upload path
                $destinationPath = public_path('/customer_images/'); // upload path
                // Upload Orginal Image
                $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
                $files->move($destinationPath, $profileImage);

                $insert['image'] = "$profileImage";
                // Save In Database
                $customer->images="$profileImage";
            }
            $customer->passport = $request->passport;
            $customer->guardian = $request->gardion;
            $customer->relation = $request->relation;
            $customer->status = 0;
            $customer->created_by = !is_null($request->created_by) ? $request->created_by : auth()->user()->id;
            $customer->save();
            // $customer = Customer::orderby('id','desc')->first();

            $nominee = new Nominee();
            $nominee->name = $request->n_name;
            $nominee->email = $request->n_email;
            $nominee->mobile_no = $request->n_mobile_no;
            $nominee->cnic_no = $request->n_cnic_no;
            $nominee->phone = $request->n_phone;
            $nominee->perment_address = $request->n_address;
            $nominee->postal_address = $request->n_p_address;
            $nominee->passport = $request->n_passport;
            if ($files = $request->file('n_image')){
                // Define upload path
                $destinationPath = public_path('/customer_images/'); // upload path
                // Upload Orginal Image
                $profileImage = 'nom-'.date('YmdHis') . "." . $files->getClientOriginalExtension();
                $files->move($destinationPath, $profileImage);

                $insert['image'] = "$profileImage";
                // Save In Database
                $nominee->images="$profileImage";
            }
            $nominee->gender = $request->n_gender;
            $nominee->guardian = $request->n_gardion;
            $nominee->relation = $request->n_relation;
            $nominee->customer_id = $customer->id;
            $nominee->save();
            $order = new Booking_order();
            $total_price = $request->total_price - ($request->installment + $request->d_payment);
            $order->total_amount = $total_price;
            $order->created_by = !is_null($request->created_by) ? $request->created_by : auth()->user()->id;
            $order->customer_id = $customer->id;
            $order->status = 0;
            $order->save();
            // $booking_order = Booking_order::orderby('id','desc')->first();
            $booking = new Booking();
            $booking->booking_orders_id = $order->id;
            $booking->customer_id = $customer->id;
            $booking->plot_id = $request->plot;
            $booking->created_by = !is_null($request->created_by) ? $request->created_by : auth()->user()->id;
            $booking->total_amount = $request->total_price;
            $booking->down_payment = $request->d_payment;
            $booking->pre_choice = $request->preferred_choices;
            $booking->save();
            // $last_booking = Booking::orderby('id','desc')->first();
            $installment = new Booking_installment();
            $installment->booking_order_id = $order->id;
            $installment->booking_id = $booking->id;
            $installment->customer_id = $customer->id;
            $installment->installment_amount = $request->installment;
            if($installment->save()){
                $franchise = Franchise::where('user_id',auth()->user()->id)->first();
                if($franchise != null){
                    $franchise->total_amount += $request->installment+$request->d_payment;
                    $franchise->save();
                }
                $plot_status = Plot::find($request->plot);
                $plot_status->status = 1;
                $plot_status->save();
                DB::commit();
                return redirect('customer/add')->with('success','Added Successfully');
            }
            else{
                DB::rollBack();
                return redirect()->back()->with('error','Recode Not Added');
            }
        }
        catch(Exception $ex){
            DB::rollBack();
            return $ex;
            return redirect()->back()->with('error',"Data Not Added");

        }

    }

    public function show_customer($id){
        $customer_info = Customer::find($id);
        // return view('agents.customers.details',);
        return view('customers.details',compact('customer_info'));
    }

    public function view_customer_form($id){
        $customer_info = Customer::with('nominee')->with('booking.plot.block')->find($id);
        // dd($customer_info);
        if(!is_null($customer_info)){
            return view('customers.view_customer_form',compact('customer_info'));
        }
        else{
            $customer_info = Customer::with('nominee')->with('booking.plot.block')->onlyTrashed()->find($id);
            return view('customers.view_customer_form',compact('customer_info'));
        }
    }

    public function update_customer(Request $request){
        $update_cus = Customer::find($request->id);
        // return $request;
        if ($files = $request->file('image')){
            // Define upload path
            $destinationPath = public_path('/customer_images/'); // upload path
            // Upload Orginal Image
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);

            $insert['image'] = "$profileImage";
            // Save In Database
            $update_cus->images="$profileImage";
        }
        $update_cus->name = $request->name;
        $update_cus->email = $request->email;
        $update_cus->mobile_no = $request->mobile_no;
        $update_cus->phone = $request->phone;
        $update_cus->perment_address = $request->address;
        $update_cus->postal_address = $request->p_address;
        $update_cus->passport = $request->passport;
        $update_cus->gender = $request->gender;
        $update_cus->guardian = $request->gardion;
        $update_cus->relation = $request->relation;

        if($update_cus->save()){
            return redirect()->back()->with('success','Customer Info Updated Successfully');
        }
        else{
            return redirect()->back()->with('error','Customer Not Updated');
        }

    }

    public function nominee_details_show($id){
        $data = Customer::find($id);
        $customer_info = Nominee::where('customer_id',$id)->first();
        return view('customers.nominee_details',compact('customer_info','data'));
    }

    public function update_nominee(Request $request){
        $update_cus = Nominee::find($request->id);
        // return $request;
        if ($files = $request->file('image')){
            // Define upload path
            $destinationPath = public_path('/customer_images/'); // upload path
            // Upload Orginal Image
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);

            $insert['image'] = "$profileImage";
            // Save In Database
            $update_cus->images="$profileImage";
        }
        $update_cus->name = $request->name;
        $update_cus->email = $request->email;
        $update_cus->mobile_no = $request->mobile_no;
        $update_cus->phone = $request->phone;
        $update_cus->perment_address = $request->address;
        $update_cus->postal_address = $request->p_address;
        $update_cus->passport = $request->passport;
        $update_cus->gender = $request->gender;
        $update_cus->guardian = $request->gardion;
        $update_cus->relation = $request->relation;

        if($update_cus->save()){
            return redirect('/nominee_details_show/'.$request->customer_id)->with('success','Nominee Updated Successfully');
        }
        else{
            return redirect()->back()->with('error','Customer Not Updated');
        }
    }

    public function destroy(Customer $customer){
        try{
            DB::beginTransaction();
            $booking = Booking::where('customer_id',$customer->id)->first();
            $plot = Plot::find($booking->plot_id);
            $plot->status = 0;
            $plot->save();
            $customer->delete();
            DB::commit();
            return redirect()->back()->with('success',"File Has Been Cancelled Successfully");
        }
        catch(Exception $ex){
            DB::rollBack();
            return redirect()->back()->with('error',"File Not Cancel");
        }
    }

    public function cancelledCustomers(){
        $customer = Customer::with('bookings')->with('booking.plot.block')->onlyTrashed()->get();
        // dd($customer);
        return view('customers.cancelled',compact('customer'));
    }


}
