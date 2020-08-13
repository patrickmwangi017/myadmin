<?php

namespace App\Http\Controllers;
use App\User;
use App\Cart;
use App\Booking;
use App\payment;
use App\feedback;
use App\servicedelivery;
use App\shipment;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use Auth;
use Session;
use DB;
class UserController extends Controller
{
    public function getSignup(){
        return view('user.signup');
    }
    public function postSignup(Request $request){
        $this->validate($request, [
            'Email'=>'Email|required|unique:users',
            'name'=>'required|unique:users',
            'address'=>'required',
            'phone'=>'required|min:10|unique:users',
            'password' => 'required|string|min:4|confirmed',

        ]);
        $user = new User([
            'Email'=> $request->input('Email'),
            'name'=> $request->input('name'),
            'address'=> $request->input('address'),
            'phone'=> $request->input('phone'),
            'password'=> bcrypt($request->input('password')),
        ]);
        $user->save();

        return redirect()->route('user.signin'); 

    }

    public function getSignin(){
        return view('user.signin');
    }
    public function postSignin(Request $request){
        $this->validate($request, [
        'Email' => 'Email|required',
            'password' => 'required|min:4'
        ]);
        if(Auth::attempt(['Email' => $request->input('Email'), 'password' => $request->input('password'), 'is_user'=>'Approved'])){
            return redirect()->route('user.profile');
            }
            return redirect()->back();
        }
        
    public function getProfile(){
        $user = Auth::user();
        return view('user.profile', ['user' => $user]); 
    }

    public function getOrders(){

        $shipments = Auth::user()->shipment;
        $shipments->transform(function($shipment, $key) {
            $shipment->cart = unserialize($shipment->cart);
            return $shipment;
        });
        return view('user.pendingorders', ['shipments' => $shipments]);
        
    }
    public function getApprovedOrders(){

        $shipments = Auth::user()->shipment;
        $shipments->transform(function($shipment, $key) {
            $shipment->cart = unserialize($shipment->cart);
            return $shipment;
        });
        return view('user.approvedorders', ['shipments' => $shipments]);
        
    }
    public function getDeliveredOrders(){

        $shipments = Auth::user()->shipment;
        $shipments->transform(function($shipment, $key) {
            $shipment->cart = unserialize($shipment->cart);
            return $shipment;
        });
        return view('user.deliveredorders', ['shipments' => $shipments]);
        
    }
    public function getpendingservicesbooked(){

        $shipments = Auth::user()->shipment;
        $shipments->transform(function($service, $key) {
            $service->booking = unserialize($service->booking);
            return $service;
        });
        return view('user/pendingservicesbooked', ['shipments' => $shipments]);
        
    }
    public function getapprovedservicesbooked(){

        $shipments = Auth::user()->shipment;
        $shipments->transform(function($service, $key) {
            $service->booking = unserialize($service->booking);
            return $service;
        });
        return view('user/approvedservicesbooked', ['shipments' => $shipments]);
        
    }
    public function getdeliveredservicesbooked(){

        $shipments = Auth::user()->shipment;
        $shipments->transform(function($service, $key) {
            $service->booking = unserialize($service->booking);
            return $service;
        });
        return view('user/deliveredservicesbooked', ['shipments' => $shipments]);
        
    }

    public function getLogout(Request $request){
        Auth::logout();
        $request->session()->forget('cart');
        Session::forget('oldUrl');
        return redirect()->route('user.signin');
    }

    public function getFeedback() {
        return view('user.feedback');
    
    }
    
    public function postFeedback(Request $request){
    
        $feedback = new feedback();
        $feedback->feedbackMessage = $request->input('feedbackMessage');
        $feedback->telephone = $request->input('telephone');
        $feedback->Email = $request->input('Email');
        $feedback->name = $request->input('name');
        Auth::user()->feedback()->save($feedback);
        return redirect()->route('product.index')->with('success', 'Successfully submitted feedback'); 
    
    
    }
    public function update_user_info(Request $request, $user_id) {
        $data= User::find($user_id);
        $data->name = $request->input('name');
        $data->Email = $request->input('Email');
        $data->address = $request->input('address');
        $data->phone = $request->input('phone');
        $data->save();
                  Session::put('message', 'Information is saved Successfully !');
                  return Redirect::back();
                  }


                  public function pendingpayments()
                  {
                      
                    $shipments = Auth::user()->shipment;
                      $shipments->transform(function($shipment, $key) {
                          $shipment->cart = unserialize($shipment->cart);
                          return $shipment;
                      });
                      return view('user/pending', ['shipments' => $shipments]);
                  }
                  public function approvedpayments()
                  {
                      
                    $shipments = Auth::user()->shipment;
                      $shipments->transform(function($shipment, $key) {
                          $shipment->cart = unserialize($shipment->cart);
                          return $shipment;
                      });
                      return view('user/approved', ['shipments' => $shipments]);
                  }
                  public function rejectedpayments()
                  {
                      
                    $shipments = Auth::user()->shipment;
                      $shipments->transform(function($shipment, $key) {
                          $shipment->cart = unserialize($shipment->cart);
                          return $shipment;
                      });
                      return view('user/rejected', ['shipments' => $shipments]);
                  }
public function is_confirmdelivered(Request $request, $shipment_id)
{
    $data1=shipment::find($shipment_id);
        $data1->receivestatus="Received";

    $data1->save();
    return redirect()->back()->with('message', $data1->Email. 'Order has been Approved successfully');
}
}
