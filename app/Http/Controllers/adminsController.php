<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HTTP\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Order;
use Session;
use App\Cart;
use DB;
use App\feedback;
use App\shipment;
use App\supply;
use App\suppliers;
use App\admins;
use App\User;
use App\accountants;
use App\Product;
use App\ordermanager;
use App\shipmentmanager;
use App\stockmanager;
use App\drivers;
use App\masons;
use PDF;
use invoice;
// use Auth;

class adminsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admins');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $feedback = feedback::all();
         
        return view('admins/home', ['feedback' => $feedback]);
    }
    public function dashboard()
    {
         
        return view('admins/dashboard');
        
    }
    public function archived()
    {
            $feedback = feedback::all();
         
        return view('admins/archived', ['feedback' => $feedback]);
    }
    
    public function inbox(Request $request, $feedback_id)
    {
            $feedback = feedback::find($feedback_id);
         
        return view('admins/inbox', ['feedback' => $feedback]);
    }

    public function users()
    {
            $users = User::all();
         
        return view('admins/users', ['users' => $users]);
    }
    public function is_useredit(Request $request, $id)
    {
        $users = User::find($id);   
        return view('admins/useredit', ['users' => $users]);
    
    }
    public function is_userapprove(Request $request, $id)
    {
            $users = User::find($id);
            $users->is_user="Approved";
            $users->save();
         
            return Redirect::back()->with('message','User Successfully Approved');
    }
    public function is_userreject(Request $request, $id)
    {
            $users = User::find($id);
            $users->is_user="Rejected";
            $users->save();
         
            return Redirect::back()->with('message','User Successfully Rejected');
    }
    public function is_userarchive(Request $request, $id)
    {
            $users = User::find($id);
            $users->is_user="Archived";
            $users->save();
         
            return Redirect::back()->with('message','User Successfully Archived');
    }

    public function update_user_info(Request $request, $id) {
        $data= User::find($id);
        $data->name = $request->input('name');
        $data->Email = $request->input('Email');
        $data->phone = $request->input('phone');
        $data->town = $request->input('town');
        $data->postaladdress = $request->input('postaladdress');
        $data->password = bcrypt($request->input('password'));
        $data->save();
                
                  return Redirect::back()->with('message','User Data Updated successfully');
    }
    
    public function add_new_user(Request $request) {

        // $this->validate($request, [
        //         'Email'=>'Email|required|unique:users',
        //         'name'=>'required|unique:users',
        //         'address'=>'required',
        //         'phone'=>'required|min:10|unique:users',
        //         'password' => 'required|string|min:4|confirmed',
    
        //     ]);
        $data= new user();
        $data->name = $request->input('name');
        $data->Email = $request->input('Email');
        $data->phone = $request->input('phone');
        $data->town = $request->input('town');
        $data->postaladdress = $request->input('postaladdress');
        $data->password = bcrypt($request->input('password'));
        $data->save();
       
                return Redirect::to('admins/users')->with('message','New Customer Was Added Successfully');
    }
   
    public function accountants()
    {
            $accountants = accountants::all();
         
        return view('admins/accountants', ['accountants' => $accountants]);
    }

    public function update_accountant_info(Request $request, $id) {
        $data= accountants::find($id);
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->address = $request->input('address');
        $data->password = bcrypt($request->input('password'));
        $data->save();
                
                  return Redirect::back()->with('message','Accountant Data Updated successfully');
    }
    
    public function add_new_accountant(Request $request) {
        $data= new accountant();
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->address = $request->input('address');
        $data->password = bcrypt($request->input('password'));
        $data->save();
       
                return Redirect::to('admins/accountants')->with('message','New Accountant Was Added Successfully');
    }

    public function is_accountantedit(Request $request, $id)
    {
        $accountants = accountants::find($id);   
        return view('admins/accountantedit', ['accountants' => $accountants]);
    
    }
    public function is_accountantapprove(Request $request, $id)
    {
            $accountants = accountants::find($id);
            $accountants->is_accountant="Approved";
            $accountants->save();
         
            return Redirect::back()->with('message','accountant Successfully Approved');
    }
    public function is_accountantreject(Request $request, $id)
    {
            $accountants = accountants::find($id);
            $accountants->is_accountant="Rejected";
            $accountants->save();
         
            return Redirect::back()->with('message','accountant Successfully Rejected');
    }
    public function is_accountantarchive(Request $request, $id)
    {
            $accountants = accountants::find($id);
            $accountants->is_accountant="Archived";
            $accountants->save();
         
            return Redirect::back()->with('message','accountant Successfully Archived');
    }
   
    public function ordermanagers()
    {
            $ordermanagers = ordermanager::all();
         
        return view('admins/ordermanagers', ['ordermanagers' => $ordermanagers]);
    }


    public function update_ordermanager_info(Request $request, $id) {
        $data= ordermanager::find($id);
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->address = $request->input('address');
        $data->password = bcrypt($request->input('password'));
        $data->save();
                
                  return Redirect::back()->with('message','Ordermanager Data Updated successfully');
    }
    
    public function add_new_ordermanager(Request $request) {
        $data= new ordermanager();
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->address = $request->input('address');
        $data->password = bcrypt($request->input('password'));
        $data->save();
       
                return Redirect::to('admins/ordermanager')->with('message','New Ordermanager Was Added Successfully');
    }
    public function is_ordermanageredit(Request $request, $id)
    {
        $ordermanagers = ordermanager::find($id);   
        return view('admins/ordermanageredit', ['ordermanagers' => $ordermanagers]);
    
    }
    public function is_ordermanagerapprove(Request $request, $id)
    {
            $ordermanagers = ordermanager::find($id);
            $ordermanagers->is_ordermanager="Approved";
            $ordermanagers->save();
         
            return Redirect::back()->with('message','ordermanager Successfully Approved');
    }
    public function is_ordermanagerreject(Request $request, $id)
    {
            $ordermanagers = ordermanager::find($id);
            $ordermanagers->is_ordermanager="Rejected";
            $ordermanagers->save();
         
            return Redirect::back()->with('message','ordermanager Successfully Rejected');
    }
    public function is_ordermanagerarchive(Request $request, $id)
    {
            $ordermanagers = ordermanager::find($id);
            $ordermanagers->is_ordermanager="Archived";
            $ordermanagers->save();
         
            return Redirect::back()->with('message','ordermanager Successfully Archived');
    }
    public function shipmentmanagers()
    {
            $shipmentmanagers = shipmentmanager::all();
         
        return view('admins/shipmentmanagers', ['shipmentmanagers' => $shipmentmanagers]);
    }

    public function update_shipmentmanager_info(Request $request, $id) {
        $data= shipmentmanager::find($id);
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->address = $request->input('address');
        $data->password = bcrypt($request->input('password'));
        $data->save();
                
                  return Redirect::back()->with('message','Shipmentmanager Data Updated successfully');
    }
    
    public function add_new_shipmentmanager(Request $request) {
        $data= new shipmentmanager();
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->address = $request->input('address');
        $data->password = bcrypt($request->input('password'));
        $data->save();
       
                return Redirect::to('admins/shipmentmanagers')->with('message','New Shipmentmanager Was Added Successfully');
    }

    public function is_shipmentmanageredit(Request $request, $id)
    {
        $shipmentmanagers = shipmentmanager::find($id);   
        return view('admins/shipmentmanageredit', ['shipmentmanagers' => $shipmentmanagers]);
    
    }
    public function is_shipmentmanagerapprove(Request $request, $id)
    {
            $shipmentmanagers = shipmentmanager::find($id);
            $shipmentmanagers->is_shipmentmanager="Approved";
            $shipmentmanagers->save();
         
            return Redirect::back()->with('message','shipmentmanager Successfully Approved');
    }
    public function is_shipmentmanagerreject(Request $request, $id)
    {
            $shipmentmanagers = shipmentmanager::find($id);
            $shipmentmanagers->is_shipmentmanager="Rejected";
            $shipmentmanagers->save();
         
            return Redirect::back()->with('message','shipmentmanager Successfully Rejected');
    }
    public function is_shipmentmanagerarchive(Request $request, $id)
    {
            $shipmentmanagers = shipmentmanager::find($id);
            $shipmentmanagers->is_shipmentmanager="Archived";
            $shipmentmanagers->save();
         
            return Redirect::back()->with('message','shipmentmanager Successfully Archived');
    }
    public function stockmanagers()
    {
            $stockmanagers = stockmanager::all();
         
        return view('admins/stockmanagers', ['stockmanagers' => $stockmanagers]);
    }

    public function update_stockmanager_info(Request $request, $id) {
        $data= stockmanager::find($id);
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->address = $request->input('address');
        $data->password = bcrypt($request->input('password'));
        $data->save();
                
                  return Redirect::back()->with('message','Stockmanager Data Updated successfully');
    }
    
    public function add_new_stockmanager(Request $request) {
        $data= new stockmanager();
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->address = $request->input('address');
        $data->password = bcrypt($request->input('password'));
        $data->save();
       
                return Redirect::to('admins/stockmanagers')->with('message','New Stockmanager Was Added Successfully');
    }

    public function is_stockmanageredit(Request $request, $id)
    {
        $stockmanagers = stockmanager::find($id);   
        return view('admins/stockmanageredit', ['stockmanagers' => $stockmanagers]);
    
    }
    public function is_stockmanagerapprove(Request $request, $id)
    {
            $stockmanagers = stockmanager::find($id);
            $stockmanagers->is_stockmanager="Approved";
            $stockmanagers->save();
         
            return Redirect::back()->with('message','stockmanager Successfully Approved');
    }
    public function is_stockmanagerreject(Request $request, $id)
    {
            $stockmanagers = stockmanager::find($id);
            $stockmanagers->is_stockmanager="Rejected";
            $stockmanagers->save();
         
            return Redirect::back()->with('message','stockmanager Successfully Rejected');
    }
    public function is_stockmanagerarchive(Request $request, $id)
    {
            $stockmanagers = stockmanager::find($id);
            $stockmanagers->is_stockmanager="Archived";
            $stockmanagers->save();
         
            return Redirect::back()->with('message','stockmanager Successfully Archived');
    }
    public function drivers()
    {
            $drivers = drivers::all();
         
        return view('admins/drivers', ['drivers' => $drivers]);
    }

    public function update_driver_info(Request $request, $id) {
        $data= drivers::find($id);
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->address = $request->input('address');
        $data->password = bcrypt($request->input('password'));
        $data->save();
                
                  return Redirect::back()->with('message','Driver Data Updated successfully');
    }
    
    public function add_new_driver(Request $request) {
        $data= new driver();
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->address = $request->input('address');
        $data->password = bcrypt($request->input('password'));
        $data->save();
       
                return Redirect::to('admins/drivers')->with('message','New Driver Was Added Successfully');
    }
    public function is_driveredit(Request $request, $id)
    {
        $drivers = drivers::find($id);   
        return view('admins/driveredit', ['drivers' => $drivers]);
    
    }
    public function is_driverapprove(Request $request, $id)
    {
            $drivers = drivers::find($id);
            $drivers->is_driver="Approved";
            $drivers->save();
         
            return Redirect::back()->with('message','driver Successfully Approved');
    }
    public function is_driverreject(Request $request, $id)
    {
            $drivers = drivers::find($id);
            $drivers->is_driver="Rejected";
            $drivers->save();
         
            return Redirect::back()->with('message','driver Successfully Rejected');
    }
    public function is_driverarchive(Request $request, $id)
    {
            $drivers = drivers::find($id);
            $drivers->is_driver="Archived";
            $drivers->save();
         
            return Redirect::back()->with('message','driver Successfully Archived');
    }



    public function suppliers()
    {
        $products = Product::all();
            $suppliers = suppliers::all();
         
        return view('admins/suppliers', ['suppliers' => $suppliers], ['products' => $products]);
    }

    public function update_supplier_info(Request $request, $id) {
        $data= suppliers::find($id);
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->product = $request->input('cat');
        $data->password = bcrypt($request->input('password'));
        $data->save();
                
                  return Redirect::back()->with('message','Supplier Data Updated successfully');
    }
    
    public function request_supply(Request $request, $id) {
        $suppliers= suppliers::find($id);
        $data= new supply();
        $data->supplier_id = $suppliers->id;
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->product = $request->input('product');
        $data->quantity = $request->input('quantity');
        $data->comment = $request->input('comment');
        $data->save();
                
                  return Redirect::back()->with('message','Supply Requested successfully');
    }

    public function add_new_supplier(Request $request) {
        $data= new suppliers();
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->password = bcrypt($request->input('password'));
        $data->product = $request->input('cat');
       
    
        
        $data->save();
       
                return Redirect::to('adminssuppliers')->with('message','New Supplier Was Added Successfully');
    }

    public function is_supplieredit(Request $request, $id)
    {
        $products = Product::all();
        $suppliers = suppliers::find($id);   
        return view('admins/supplieredit', ['suppliers' => $suppliers], ['products' => $products]);
    
    }
    public function is_requestsupply(Request $request, $id)
    {
        $products = Product::all();
        $suppliers = suppliers::find($id);   
        return view('admins/requestsupply', ['suppliers' => $suppliers], ['products' => $products]);
    
    }

    public function is_supplierapprove(Request $request, $id)
    {
            $suppliers = suppliers::find($id);
            $suppliers->is_supplier="Approved";
            $suppliers->save();
         
            return Redirect::back()->with('message','supplier Successfully Approved');
    }
    public function is_supplierreject(Request $request, $id)
    {
            $suppliers = suppliers::find($id);
            $suppliers->is_supplier="Rejected";
            $suppliers->save();
         
            return Redirect::back()->with('message','supplier Successfully Rejected');
    }
    public function is_supplierarchive(Request $request, $id)
    {
            $suppliers = suppliers::find($id);
            $suppliers->is_supplier="Archived";
            $suppliers->save();
         
            return Redirect::back()->with('message','supplier Successfully Archived');
    }

    public function is_supplyconfirmed(Request $request, $id)
    {
        
            $supplies = supply::find($id);
            $supplies->receive_status="Received";
            $supplies->save();
    
    $products=Product::where('productName', $supplies->product)->get()->first(); 
    $quantity=$products->quantity_available; 
    $qty=$supplies->quantity + $quantity; 
 $data1=Product::where('productName', $supplies->product)
    ->update(['quantity_available' => $qty]);
    
         
            return Redirect::back()->with('message','supply Successfully Confirmed');
    }

    public function supply()
    {
        $products=Product::all();
            $supplies = supply::all();
         
        return view('admins/supply', ['supplies' => $supplies], ['products' => $products]);
    }

    public function masons()
    {
            $masons = masons::all();
         
        return view('admins/masons', ['masons' => $masons]);
    }

    public function update_mason_info(Request $request, $id) {
        $data= masons::find($id);
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->address = $request->input('address');
        $data->password = bcrypt($request->input('password'));
        $data->save();

                
                  return Redirect::back()->with('message','Mason Data Updated successfully');
    }
    
    public function add_new_mason(Request $request) {
        $data= new mason();
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->phone = $request->input('phone');
        $data->address = $request->input('address');
        $data->password = bcrypt($request->input('password'));
        $data->save();
       
                return Redirect::to('admins/masons')->with('message','New Mason Was Added Successfully');
    }
    public function is_masonedit(Request $request, $id)
    {
        $masons = masons::find($id);   
        return view('admins/masonedit', ['masons' => $masons]);
    }
    public function is_masonapprove(Request $request, $id)
    {
            $masons = masons::find($id);
            $masons->is_mason="Approved";
            $masons->save();
         
            return Redirect::back()->with('message','mason Successfully Approved');
    }
    public function is_masonreject(Request $request, $id)
    {
            $masons = masons::find($id);
            $masons->is_mason="Rejected";
            $masons->save();
         
            return Redirect::back()->with('message','mason Successfully Rejected');
    }
    public function is_masonarchive(Request $request, $id)
    {
            $masons = masons::find($id);
            $masons->is_mason="Archived";
            $masons->save();
         
            return Redirect::back()->with('message','mason Successfully Archived');
    }
    public function search (Request $request){
        $search = $request->get('search');
    $shipments = DB::table('shipments')->where('name', 'like', '%' .$search. '%')->paginate(5);

    return view('admins/home', ['shipments'=>$shipments]);
    
    }

    public function getLogout(Request $request){
        Auth::logout();
        return redirect()->route('admins.login');
    }
    public function getProfile(){
        $user = Auth::user();
        return view('admins.profile', ['user' => $user]); 
    }
   

                  public function replymessage(Request $request, $id) {
                    $feedback= feedback::find($id);
                    $feedback->reply = $request->input('reply');
                    $feedback->save();
                            
                              return Redirect::back()->with('message','Reply sent successfully');
                }

                public function feedback_archive(Request $request, $id) {
                    $feedback= feedback::find($id);
                    $feedback->status == "Archived";
                    $feedback->save();
                            
                              return Redirect::back()->with('message','Feedback Archived successfully');
                }
                public function feedback_unarchive(Request $request, $id) {
                    $feedback= feedback::find($id);
                    $feedback->status == "Pending";
                    $feedback->save();
                            
                              return Redirect::back()->with('message','Feedback Removed From Archive');
                }
                

public function customersreport()
    {
        $id=1;
        $customers = User::all();

        $pdf = PDF::loadView('admins/customersreport',compact(['customers']));
        return $pdf->stream('DriversReport_'.$id.'.pdf');

    }

    public function driversreport()
    {

        $id=1;
        $drivers = drivers::all();

        $pdf = PDF::loadView('admins/driversreport',compact(['drivers']));
        return $pdf->stream('DriversReport_'.$id.'.pdf');
        
    }

    public function masonsreport()
    {
        $id=1;
        $suppliers = suppliers::all();

        $pdf = PDF::loadView('admins/masonsreport',compact(['suppliers']));
        return $pdf->stream('SupplierssReport_'.$id.'.pdf');
        
    }

    public function accountantsreport()
    { 
        $id=1;
        $accountants = accountants::all();

        $pdf = PDF::loadView('admins/accountantsreport',compact(['accountants']));
        return $pdf->stream('AccountantsReport_'.$id.'.pdf');
    }



    public function ordermanagersreport()
    {
        include(app_path() . '/fpdf.php');
        $shipments = shipment::all();
        // $orders = Auth::user()->orders;
        $shipments->transform(function($shipment, $key) {
            $shipment->cart = unserialize($shipment->cart);
            return $shipment;
        });
        return view('admins/ordermanagersreport', ['shipments' => $shipments]);
    }

    public function shipmentmanagersreport()
    {

        $id=1;
        $shipmentmanagers = shipmentmanager::all();

        $pdf =PDF::loadView('admins/shipmentmanagersreport',compact(['shipmentmanagers']));
        return $pdf->stream('ShipmentmanagersReport_'.$id.'.pdf');
    }

    public function stockmanagersreport()
    {
        include(app_path() . '/fpdf.php');
        $shipments = shipment::all();
        // $orders = Auth::user()->orders;
        $shipments->transform(function($shipment, $key) {
            $shipment->cart = unserialize($shipment->cart);
            return $shipment;
        });
        return view('admins/stockmanagersreport', ['shipments' => $shipments]);
    }
}

