<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\payment;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\shipment;
use App\drivers;
use Session;
use App\User;
use App\Cart;
use App\shipmentmanager;
use DB;
use Auth;
use \PDF;

class shipmentmanagerController extends Controller
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
        $drivers = drivers::all();
        $shipments = shipment::all();
        // $orders = Auth::user()->orders;
        $shipments->transform(function($shipment, $key) {
            $shipment->cart = unserialize($shipment->cart);
            return $shipment;
        });
        return view('shipmentmanager.home', ['shipments' => $shipments], ['drivers' => $drivers]);
    }

    public function pendingorders()
    {
        $drivers = drivers::all();
        $shipments = shipment::all();
        // $orders = Auth::user()->orders;
        $shipments->transform(function($shipment, $key) {
            $shipment->cart = unserialize($shipment->cart);
            return $shipment;
        });
        return view('shipmentmanager.pendingorders', ['shipments' => $shipments], ['drivers' => $drivers]);
    }
    public function allocatedorders()
    {
        $drivers = drivers::all();
        $shipments = shipment::all();
        // $orders = Auth::user()->orders;
        $shipments->transform(function($shipment, $key) {
            $shipment->cart = unserialize($shipment->cart);
            return $shipment;
        });
        return view('shipmentmanager.allocatedorders', ['shipments' => $shipments], ['drivers' => $drivers]);
    }

    public function orderreports()
    {
        include(app_path() . '/fpdf.php');
        $shipments = shipment::all();
        $shipments->transform(function($shipment, $key) {
            $shipment->cart = unserialize($shipment->cart);
            return $shipment;
        });
        return view('accountants/orderreports', ['shipments' => $shipments]);
    }

    public function getLogout(Request $request){
        Auth::logout();
        return redirect()->route('shipmentmanager.login');
    }

    
    public function getProfile(){
        $user = Auth::user();
        return view('shipmentmanager.profile', ['user' => $user]); 
    }
    public function update_shipmentmanager_info(Request $request, $user_id) {
        $data= shipmentmanager::find($user_id);
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->address = $request->input('address');
        $data->phone = $request->input('phone');
        $data->save();
                  Session::put('message', 'Information is saved Successfully !');
                  return Redirect::back();
    }
    public function is_allocated(Request $request,$shipment_id){
                    $data1=shipment::find($shipment_id);
                    if($request->cat!=-1)
                    $data1->driver_id=$request->cat;
                    if($request->cat!=-1)
                    $data1->allocation_status="Allocated";
                        
                        $data1->save();

                    $data=drivers::where('id', $data1->driver_id)
                    ->update(['status' => "On Duty"]);
                 return redirect()->back()->with('message', $data1->Email. 'Order has been Approved successfully');

    }

    public function is_saveallocated(Request $request,$shipment_id, $id){
                    $driver=shipment::find($id);
                    $data1=shipment::find($shipment_id);
                        $data1->allocation_status="Allocated";
                        $data1->driver_id=$driver->id;
                    $data1->save();
                    
                    return redirect()->back()->with('message', $data1->Email. 'Order has been Approved successfully');
                }

    
    public function shipmentreport()
    {
        $id=1;
        $drivers = drivers::all();
        $shipments = shipment::all();
        $shipments->transform(function($shipment, $key) {
            $shipment->cart = unserialize($shipment->cart);
            return $shipment;
        });
            $pdf = PDF::loadView('shipmentmanager/shipmentreport',compact(['shipments', 'drivers']));
        return $pdf->stream('ShipmentReport_'.$id.'.pdf');
    }

    public function allocatedriver(Request $request) {
        $data = shipment::where('id',$row->id)
        ->update($data['driver_id'] = $request->cat);
        return redirect()->back()->with('message', $data1->Email. 'Order has been Approved successfully');
    }


    public function save_supplyer_payment(Request $request ) {

        // {{ $driver['id'] }}
        $data = new Supplyerpayment();

        $data['amount'] = $request->data['newpaid'];
        $data['supplyersID'] = $request->data['supplyerID'];
        $data['paymentMethod'] = $request->data['paymentMethod'];
        $data['boxID'] = $request->data['ID'];
        if($data['remarks']!="")
        $data['remarks'] = $request->data['remarks'];

        $total_paid = $request->data['paid']+$data['amount'];

        $data->save();

        $supplyerB = Supplyer::find($data['supplyersID']);

        $supplyer = Supplyer::where('id', $data['supplyersID'])
            ->update(['paid' => $supplyerB->paid+ $data['amount']]);


        if($request->data['total']==$total_paid) {
            $dataStock = array();
            $dataStock['statusPaid'] = 0;

            StockPurchase::where('boxID',$data['boxID'])->update($dataStock);
        }
        else{
            $dataStock = array();
            $dataStock['statusPaid'] = -1;

            StockPurchase::where('boxID',$data['boxID'])->update($dataStock);
        }


    }
}
