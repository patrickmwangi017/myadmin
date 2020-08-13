<?php
use Illuminate\Support\Facades\Input;
use App\Product;
use App\services;
use App\supply;
use App\accountants;
use App\ordermanager;
use App\shipmentmanager;
use App\stockmanager;
use App\shipment;
use App\drivers;
use App\masons;
use App\servicedelivery;
use App\Order;
use App\Cart;
use App\payment;
use App\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', ['uses'=>'productsController@getIndex',
'as'=>'product.index'
]);

Route::get('/feedback', [
    'uses'=>'UserController@getFeedback',
     'as'=>'feedback',
     'middleware'=> 'auth'
]);

Route::post('/feedback', [
    'uses'=>'UserController@postFeedback',
     'as'=>'feedback',
     'middleware'=> 'auth'
]);

 // ADMIN STARTS HERE
 Route::get('/adminprofile', [
    'uses'=>'adminsController@getProfile',
    'as'=>'admins.profile'
]);
Route::get('/adminslogout', [
    'uses'=>'adminsController@getLogout',
    'as'=>'admins.logout'
]);

Route::get('accountantsreport', 'adminsController@accountantsreport')->name('admins/accountantsreport');
Route::get('ordermanagersreport', 'adminsController@ordermanagersreport')->name('admins/ordermanagersreport');
Route::get('customersreport', 'adminsController@customersreport')->name('admins/customersreport');
Route::get('shipmentmanagersreport', 'adminsController@shipmentmanagersreport')->name('admins/shipmentmanagersreport');
Route::get('stockmanagersreport', 'adminsController@stockmanagersreport')->name('admins/stockmanagersreport');
Route::get('driversreport', 'adminsController@driversreport')->name('admins/driversreport');
Route::get('masonsreport', 'adminsController@masonsreport')->name('admins/masonsreport');
Route::get('adminsdashboard', 'adminsController@dashboard')->name('admins/dashboard');
Route::get('adminshome', 'adminsController@index')->name('admins/home');
Route::get('adminsusers', 'adminsController@users')->name('admins/users');
Route::get('adminsaccountants', 'adminsController@accountants')->name('admins/accountants');
Route::get('adminssuppliers', 'adminsController@suppliers')->name('admins/suppliers');
Route::get('adminssupply', 'adminsController@supply')->name('admins/supply');
Route::get('adminsordermanagers', 'adminsController@ordermanagers')->name('admins/ordermanagers');
Route::get('adminsshipmentmanagers', 'adminsController@shipmentmanagers')->name('admins/shipmentmanagers');
Route::get('adminsstockmanagers', 'adminsController@stockmanagers')->name('admins/stockmanagers');
Route::get('adminsdrivers', 'adminsController@drivers')->name('admins/drivers');
Route::get('adminsmasons', 'adminsController@masons')->name('admins/masons');
Route::get('admins', 'admins\LoginController@showLoginForm')->name('admins.login');
Route::get('adminsregister', 'admins\RegisterController@showRegistrationForm')->name('admins.register');
Route::post('adminsregister', 'admins\RegisterController@Register');
Route::post('admins', 'admins\LoginController@Login');
Route::post('admins-password/email', 'admins\ForgotPasswordController@sendResetLinkEmail')->name('accountant.password.email');
Route::get('admins-password/reset', 'admins\ForgotPasswordController@showLinkRequestForm')->name('admins.password.request');
Route::post('admins-password/reset', 'admins\ResetPasswordController@reset');
Route::get('admins-password/reset/{token}', 'admins\ForgotPasswordController@showResetForm')->name('admins.password.reset');


// SHIPMENT MANAGER STARTS HERE
Route::get('/shipmentmanagerlogout', [
    'uses'=>'shipmentmanagerController@getLogout',
    'as'=>'shipmentmanager.logout'
]);
Route::get('/shipmentmanagerprofile', [
    'uses'=>'shipmentmanagerController@getProfile',
    'as'=>'shipmentmanager.profile'
]);
// Route::get('modal', 'shipmentmanagerController@modal')->name('modal');
Route::get('shipmentmanagerhome', 'shipmentmanagerController@index')->name('shipmentmanager/home');
Route::get('shipmentmanagershipmentreport', 'shipmentmanagerController@shipmentreport')->name('shipmentmanager/shipmentreport');
Route::get('shipmentmanagerservicedeliveryreport', 'shipmentmanagerController@servicedeliveryreport')->name('shipmentmanager/servicedeliveryreport');
Route::get('shipmentmanagerpendingorders', 'shipmentmanagerController@pendingorders')->name('shipmentmanager/pendingorders');
Route::get('shipmentmanagerallocatedorders', 'shipmentmanagerController@allocatedorders')->name('shipmentmanager/allocatedorders');
Route::get('shipmentmanagerallbookings', 'shipmentmanagerController@allbookings')->name('shipmentmanager/allbookings');
Route::get('shipmentmanagerpendingbookings', 'shipmentmanagerController@pendingbookings')->name('shipmentmanager/pendingbookings');
Route::get('shipmentmanagerallocatedbookings', 'shipmentmanagerController@allocatedbookings')->name('shipmentmanager/allocatedbookings');
Route::get('shipmentmanager', 'shipmentmanager\LoginController@showLoginForm')->name('shipmentmanager.login');
Route::get('shipmentmanagerregister', 'shipmentmanager\RegisterController@showRegistrationForm')->name('shipmentmanager.register');
Route::post('shipmentmanagerregister', 'shipmentmanager\RegisterController@Register');
Route::post('shipmentmanager', 'shipmentmanager\LoginController@Login');
Route::post('shipmentmanager-password/email', 'shipmentmanager\ForgotPasswordController@sendResetLinkEmail')->name('shipmentmanager.password.email');
Route::get('shipmentmanager-password/reset', 'shipmentmanager\ForgotPasswordController@showLinkRequestForm')->name('shipmentmanager.password.request');
Route::post('shipmentmanager-password/reset', 'shipmentmanager\ResetPasswordController@reset');
Route::get('shipmentmanager-password/reset/{token}', 'shipmentmanager\ForgotPasswordController@showResetForm')->name('shipmentmanager.password.reset');

// ACCOUNTANTS START HERE
Route::get('/accountantslogout', [
    'uses'=>'accountantsController@getLogout',
    'as'=>'accountants.logout'
]);
Route::get('/accountantprofile', [
    'uses'=>'accountantsController@getProfile',
    'as'=>'accountants.profile'
]);

    Route::get('accountantsorders', 'accountantsController@orders');
    Route::get('accountantshome', 'accountantsController@index')->name('accountants/home');
    Route::get('accountantspaymentreport', 'accountantsController@paymentreport')->name('accountants/paymentreport');
    Route::get('accountantspending', 'accountantsController@pending')->name('accountants/pending');
    Route::get('accountantsapproved', 'accountantsController@approved')->name('accountants/approved');
    Route::get('accountantsrejected', 'accountantsController@rejected')->name('accountants/rejected');
    Route::get('accountantsrefunded', 'accountantsController@refunded')->name('accountants/refunded');
    Route::get('accountantsarchived', 'accountantsController@archived')->name('accountants/archived');
    Route::get('accountants', 'accountants\LoginController@showLoginForm')->name('accountants.login');
    Route::get('accountantsregister', 'accountants\RegisterController@showRegistrationForm')->name('accountants.register');
    Route::post('accountantsregister', 'accountants\RegisterController@Register');
    Route::post('accountants', 'accountants\LoginController@Login');
    Route::post('accountants-password/email', 'accountants\ForgotPasswordController@sendResetLinkEmail')->name('accountant.password.email');
    Route::get('accountants-password/reset', 'accountants\ForgotPasswordController@showLinkRequestForm')->name('accountants.password.request');
    Route::post('accountants-password/reset', 'accountants\ResetPasswordController@reset');
    Route::get('accountants-password/reset/{token}', 'accountants\ForgotPasswordController@showResetForm')->name('accountants.password.reset');

    // QUICK ACTIONS START HERE
    Route::get('/registered', 'dashboardController@registered')->name('registered');

    Route::get('inbox/{id}', 'adminsController@inbox')->name('inbox');
    Route::get('admins/archived', 'adminsController@archived')->name('admins/archived');
    Route::post('replymessage/{id}', 'adminsController@replymessage')->name('replymessage');
    Route::get('feedback_archive/{id}', 'adminsController@feedback_archive')->name('feedback_archive');
    Route::get('feedback_unarchive/{id}', 'adminsController@feedback_unarchive')->name('feedback_unarchive');
    Route::get('is_userapprove/{id}', 'adminsController@is_userapprove')->name('is_userapprove');
    Route::get('is_userreject/{id}', 'adminsController@is_userreject')->name('is_userreject');
    Route::get('is_userarchive/{id}', 'adminsController@is_userarchive')->name('is_userarchive');
    Route::get('is_useredit/{id}', 'adminsController@is_useredit')->name('is_useredit');
    Route::post('add_new_user', 'adminsController@add_new_user')->name('add_new_user');
    Route::post('update-user-info/{id}', 'adminsController@update_user_info');
    Route::get('is_prodarchive/{id}', 'productsController@is_prodarchive')->name('is_prodarchive');
    Route::get('is_prodapprove/{id}', 'productsController@is_prodapprove')->name('is_prodapprove');
    Route::get('is_prodedit/{id}', 'stockmanagerController@is_prodedit')->name('is_prodedit');
    Route::post('update-product-info/{id}', 'productsController@update_product_info');
    Route::post('add_new_product', 'productsController@add_new_product')->name('add_new_product');

    Route::get('is_accountantapprove/{id}', 'adminsController@is_accountantapprove')->name('is_accountantapprove');
    Route::get('is_accountantreject/{id}', 'adminsController@is_accountantreject')->name('is_accountantreject');
    Route::get('is_accountantarchive/{id}', 'adminsController@is_accountantarchive')->name('is_accountantarchive');
    Route::get('is_accountantedit/{id}', 'adminsController@is_accountantedit')->name('is_accountantedit');
    Route::post('add_new_accountant', 'adminsController@add_new_accountant')->name('add_new_accountant');
    Route::post('update-accountant-info/{id}', 'adminsController@update_accountant_info');

    Route::get('is_ordermanagerapprove/{id}', 'adminsController@is_ordermanagerapprove')->name('is_ordermanagerapprove');
    Route::get('is_ordermanagerreject/{id}', 'adminsController@is_ordermanagerreject')->name('is_ordermanagerreject');
    Route::get('is_ordermanagerarchive/{id}', 'adminsController@is_ordermanagerarchive')->name('is_ordermanagerarchive');
    Route::get('is_ordermanageredit/{id}', 'adminsController@is_ordermanageredit')->name('is_ordermanageredit');
    Route::post('add_new_ordermanager', 'adminsController@add_new_ordermanager')->name('add_new_ordermanager');
    Route::post('update-ordermanager-info/{id}', 'adminsController@update_ordermanager_info');

    Route::get('is_shipmentmanagerapprove/{id}', 'adminsController@is_shipmentmanagerapprove')->name('is_shipmentmanagerapprove');
    Route::get('is_shipmentmanagerreject/{id}', 'adminsController@is_shipmentmanagerreject')->name('is_shipmentmanagerreject');
    Route::get('is_shipmentmanagerarchive/{id}', 'adminsController@is_shipmentmanagerarchive')->name('is_shipmentmanagerarchive');
    Route::get('is_shipmentmanageredit/{id}', 'adminsController@is_shipmentmanageredit')->name('is_shipmentmanageredit');
    Route::post('add_new_shipmentmanager', 'adminsController@add_new_shipmentmanager')->name('add_new_shipmentmanager');
    Route::post('update-shipmentmanager-info/{id}', 'adminsController@update_shipmentmanager_info');

    Route::get('is_stockmanagerapprove/{id}', 'adminsController@is_stockmanagerapprove')->name('is_stockmanagerapprove');
    Route::get('is_stockmanagerreject/{id}', 'adminsController@is_stockmanagerreject')->name('is_stockmanagerreject');
    Route::get('is_stockmanagerarchive/{id}', 'adminsController@is_stockmanagerarchive')->name('is_stockmanagerarchive');
    Route::get('is_stockmanageredit/{id}', 'adminsController@is_stockmanageredit')->name('is_stockmanageredit');
    Route::post('add_new_stockmanager', 'adminsController@add_new_stockmanager')->name('add_new_stockmanager');
    Route::post('update-stockmanager-info/{id}', 'adminsController@update_stockmanager_info');

    Route::get('is_driverapprove/{id}', 'adminsController@is_driverapprove')->name('is_driverapprove');
    Route::get('is_driverreject/{id}', 'adminsController@is_driverreject')->name('is_driverreject');
    Route::get('is_driverarchive/{id}', 'adminsController@is_driverarchive')->name('is_driverarchive');
    Route::get('is_driveredit/{id}', 'adminsController@is_driveredit')->name('is_driveredit');
    Route::post('add_new_driver', 'adminsController@add_new_driver')->name('add_new_driver');
    Route::post('update-driver-info/{id}', 'adminsController@update_driver_info');

    Route::get('is_supplierapprove/{id}', 'adminsController@is_supplierapprove')->name('is_supplierapprove');
    Route::get('is_supplierreject/{id}', 'adminsController@is_supplierreject')->name('is_supplierreject');
    Route::get('is_supplierarchive/{id}', 'adminsController@is_supplierarchive')->name('is_supplierarchive');
    Route::get('is_supplieredit/{id}', 'adminsController@is_supplieredit')->name('is_supplieredit');
    Route::get('is_requestsupply/{id}', 'adminsController@is_requestsupply')->name('is_requestsupply');
    Route::get('is_supplyconfirmed/{id}', 'adminsController@is_supplyconfirmed')->name('is_supplyconfirmed');
    Route::post('add_new_supplier', 'adminsController@add_new_supplier')->name('add_new_supplier');
    Route::post('update-supplier-info/{id}', 'adminsController@update_supplier_info');
    Route::post('request-supply/{id}', 'adminsController@request_supply');


    Route::get('is_masonapprove/{id}', 'adminsController@is_masonapprove')->name('is_masonapprove');
    Route::get('is_masonreject/{id}', 'adminsController@is_masonreject')->name('is_masonreject');
    Route::get('is_masonarchive/{id}', 'adminsController@is_masonarchive')->name('is_masonarchive');
    Route::get('is_masonedit/{id}', 'adminsController@is_masonedit')->name('is_masonedit');
    Route::post('add_new_mason', 'adminsController@add_new_mason')->name('add_new_mason');
    Route::post('update-mason-info/{id}', 'adminsController@update_mason_info');

    Route::get('is_user/{id}', 'productsController@is_user')->name('is_user');
    Route::get('payment_reject/{id}', 'productsController@payment_reject')->name('payment_reject');
    Route::get('payment_archive/{id}', 'productsController@payment_archive')->name('payment_archive');
    Route::get('is_payment/{id}', 'productsController@is_payment')->name('is_payment');
    Route::get('is_refund/{id}', 'productsController@is_refund')->name('is_refund');
    Route::get('is_order/{id}', 'productsController@is_order')->name('is_order');
    Route::get('order_reject/{id}', 'productsController@order_reject')->name('order_reject');
    Route::get('is_booking/{id}', 'servicesController@is_booking')->name('is_booking');
    Route::get('booking_reject/{id}', 'servicesController@booking_reject')->name('booking_reject');
    
    Route::get('is_delivered/{id}', 'driversController@is_delivered')->name('is_delivered');
    Route::get('is_confirmdelivered/{id}', 'UserController@is_confirmdelivered')->name('is_confirmdelivered');
    Route::get('is_offered/{id}', 'masonsController@is_offered')->name('is_offered');
    Route::get('is_conoffered/{id}', 'masonsController@is_offered')->name('is_conoffered');
    Route::get('is_modal/{id1}', 'shipmentmanagerController@is_modal')->name('is_modal');
    Route::post('is_allocated/{id}', 'shipmentmanagerController@is_allocated')->name('is_allocated');
    Route::get('is_saveallocated/{id}', 'shipmentmanagerController@is_saveallocated')->name('is_saveallocated');
    Route::post('allocatedriver', 'shipmentmanagerController@allocatedriver')->name('allocatedriver');
    
    // STOCK MANAGER STARTS HERE
    Route::get('/stockmanagerlogout', [
        'uses'=>'stockmanagerController@getLogout',
        'as'=>'stockmanager.logout'
    ]);
    
Route::get('/stockmanagerprofile', [
    'uses'=>'stockmanagerController@getProfile',
    'as'=>'stockmanager.profile'
]);

Route::get('stockmanagerhome', 'stockmanagerController@index');
Route::get('stockmanagerpublished', 'stockmanagerController@published');
Route::get('stockmanagerarchived', 'stockmanagerController@archived');
Route::get('stockmanagerpending', 'stockmanagerController@pending');
Route::get('stockmanagerdelivered', 'stockmanagerController@delivered');
Route::get('stockmanagerconfirmed', 'stockmanagerController@confirmed');
Route::get('stockmanager', 'stockmanager\LoginController@showLoginForm')->name('stockmanager.login');
Route::get('stockmanagerregister', 'stockmanager\RegisterController@showRegistrationForm')->name('stockmanager.register');
Route::post('stockmanagerregister', 'stockmanager\RegisterController@Register');
Route::post('stockmanager', 'stockmanager\LoginController@Login');
Route::post('stockmanager-password/email', 'stockmanager\ForgotPasswordController@sendResetLinkEmail')->name('stockmanager.password.email');
Route::get('stockmanager-password/reset', 'stockmanager\ForgotPasswordController@showLinkRequestForm')->name('stockmanager.password.request');
Route::post('stockmanager-password/reset', 'stockmanager\ResetPasswordController@reset');
Route::get('stockmanager-password/reset/{token}', 'stockmanager\ForgotPasswordController@showResetForm')->name('stockmanager.password.reset');

// SEARCH STARTS HERE
Route::post('/search', function(){
    $search=Input::get('search');
    if($search !=""){
        $products=Product::where('productName', 'LIKE', '%' .$search. '%')
                               ->orWhere('Price', 'LIKE', '%' .$search. '%')
                               ->get();
                               if(count($products)>0)
                               return view('shop.index', ['products'=>$products])->withDetails($products)->withQuery($products);

    }
    return view('shop.index', ['products'=>$products])->withMessage("No such products found!");
});


Route::post('/searchservices', function(){
    $searchservices=Input::get('searchservices');
    if($searchservices !=""){
        $services=services::where('serviceName', 'LIKE', '%' .$searchservices. '%')
                               ->orWhere('Price', 'LIKE', '%' .$searchservices. '%')
                               ->get();
                               if(count($services)>0)
                               return view('shop.servicesindex', ['services'=>$services])->withDetails($services)->withQuery($services);

    }
    return view('shop.servicesindex', ['services'=>$services])->withMessage("No such services found!");
});


Route::post('/searchapprovedpayments', function(){
    $row=shipment::all();
    $searchapprovedpayments=Input::get('searchapprovedpayments');
    if($searchapprovedpayments !="" && $row->payment_status = "Approved"){
        $shipments = shipment::where('name', 'LIKE', '%' .$searchapprovedpayments. '%')
                               ->orWhere('totalexpected', 'LIKE', '%' .$searchapprovedpayments. '%')
                               ->orWhere('payment_status', 'LIKE', '%' .$searchapprovedpayments. '%')
                               ->get();

                               $shipments->transform(function($shipment, $key) {
                                $shipment->cart = unserialize($shipment->cart);
                                return $shipment;
                            });
                            //    dd($shipments);
                               if(count($shipments)>0)
                               return view('accountants.approved', ['shipments' => $shipments])->withDetails($shipments)->withQuery($shipments);

    }
    return view('accountants.approved', ['shipments' => $shipments])->withMessage("No such Payments found!");
});

Route::post('/searchallpayments', function(){
    $row=shipment::all();
    $searchallpayments=Input::get('searchallpayments');
    if($searchallpayments !=""){
        $shipments = shipment::where('mpesa_code', 'LIKE', '%' .$searchallpayments. '%')
                               ->orWhere('totalexpected', 'LIKE', '%' .$searchallpayments. '%')
                               ->orWhere('payment_status', 'LIKE', '%' .$searchallpayments. '%')
                               ->get();

                               $shipments->transform(function($shipment, $key) {
                                $shipment->cart = unserialize($shipment->cart);
                                return $shipment;
                            });
                            //    dd($shipments);
                               if(count($shipments)>0)
                               return view('accountants.home', ['shipments' => $shipments])->withDetails($shipments)->withQuery($shipments);

    }
    return view('accountants.home', ['shipments' => $shipments])->withMessage("No such Payments found!");
});

Route::post('/searchpendingpayments', function(){
    $row=shipment::all();
    $searchpendingpayments=Input::get('searchpendingpayments');
    if($searchpendingpayments !="" && $row->payment_status = "Pending"){
        $shipments = shipment::where('mpesa_code', 'LIKE', '%' .$searchpendingpayments. '%')
                               ->orWhere('totalexpected', 'LIKE', '%' .$searchpendingpayments. '%')
                               ->get();

                               $shipments->transform(function($shipment, $key) {
                                $shipment->cart = unserialize($shipment->cart);
                                return $shipment;
                            });
                            //    dd($shipments);
                               if(count($shipments)>0)
                               return view('accountants.pending', ['shipments' => $shipments])->withDetails($shipments)->withQuery($shipments);

    }
    return view('accountants.pending', ['shipments' => $shipments])->withMessage("No such Payments found!");
});
Route::post('/searchrejectedpayments', function(){
    $row=shipment::all();
    $searchrejectedpayments=Input::get('searchrejectedpayments');
    if($searchrejectedpayments !="" && $row->payment_status = "Approved"){
        $shipments = shipment::where('name', 'LIKE', '%' .$searchrejectedpayments. '%')
                               ->orWhere('totalexpected', 'LIKE', '%' .$searchrejectedpayments. '%')
                               ->get();

                               $shipments->transform(function($shipment, $key) {
                                $shipment->cart = unserialize($shipment->cart);
                                return $shipment;
                            });
                            //    dd($shipments);
                               if(count($shipments)>0)
                               return view('accountants.rejected', ['shipments' => $shipments])->withDetails($shipments)->withQuery($shipments);

    }
    return view('accountants.rejected', ['shipments' => $shipments])->withMessage("No such Payments found!");
});
Route::post('/searchrefundedpayments', function(){
    $row=shipment::all();
    $searchrefundedpayments=Input::get('searchrefundedpayments');
    if($searchrefundedpayments !="" && $row->payment_status = "Refunded"){
        $shipments = shipment::where('totalexpected', 'LIKE', '%' .$searchrefundedpayments. '%')
                               ->orWhere('name', 'LIKE', '%' .$searchrefundedpayments. '%')
                               ->get();

                               $shipments->transform(function($shipment, $key) {
                                $shipment->cart = unserialize($shipment->cart);
                                return $shipment;
                            });
                            //    dd($shipments);
                               if(count($shipments)>0)
                               return view('accountants.refunded', ['shipments' => $shipments])->withDetails($shipments)->withQuery($shipments);

    }
    return view('accountants.refunded', ['shipments' => $shipments])->withMessage("No such Payments found!");
}); 
// && $row->payment_status = "Refunded"
Route::post('/searchallorders', function(){
    $row=shipment::all();
    $searchallorders=Input::get('searchallorders');
    if($searchallorders !="" && $row->order_shipment = "Order"){
        $shipments = shipment::where('order_status', 'LIKE', '%' .$searchallorders. '%')
                               ->orWhere('name', 'LIKE', '%' .$searchallorders. '%')
                               ->get();

                               $shipments->transform(function($shipment, $key) {
                                $shipment->cart = unserialize($shipment->cart);
                                return $shipment;
                            });
                            //    dd($shipments);
                               if(count($shipments)>0)
                               return view('ordermanager/home', ['shipments' => $shipments])->withDetails($shipments)->withQuery($shipments);

    }
    return view('ordermanager/home', ['shipments' => $shipments])->withMessage("No such Orders found!");
}); 

Route::post('/searchapprovedorders', function(){
    $row=shipment::all();
    $searchapprovedorders=Input::get('searchapprovedorders');
    if($searchapprovedorders !="" && $row->order_shipment = "Order" && $row->order_status = "Approved"){
        $shipments = shipment::where('name', 'LIKE', '%' .$searchapprovedorders. '%')
                               ->get();

                               $shipments->transform(function($shipment, $key) {
                                $shipment->cart = unserialize($shipment->cart);
                                return $shipment;
                            });
                            //    dd($shipments);
                               if(count($shipments)>0)
                               return view('ordermanager/approvedorders', ['shipments' => $shipments])->withDetails($shipments)->withQuery($shipments);

    }
    return view('ordermanager/approvedorders', ['shipments' => $shipments])->withMessage("No such Orders found!");
}); 


Route::post('/searchpendingorders', function(){
    $row=shipment::all();
    $searchpendingorders=Input::get('searchpendingorders');
    if($searchpendingorders !="" && $row->order_shipment = "Order" && $row->order_status = "Pending"){
        $shipments = shipment::where('name', 'LIKE', '%' .$searchpendingorders. '%')
                               ->get();

                               $shipments->transform(function($shipment, $key) {
                                $shipment->cart = unserialize($shipment->cart);
                                return $shipment;
                            });
                            //    dd($shipments);
                               if(count($shipments)>0)
                               return view('ordermanager/pendingorders', ['shipments' => $shipments])->withDetails($shipments)->withQuery($shipments);

    }
    return view('ordermanager/pendingorders', ['shipments' => $shipments])->withMessage("No such Orders found!");
}); 


Route::post('/searchallshipmentorders', function(){
    $drivers=drivers::all();
    $row=shipment::all();
    $searchallshipmentorders=Input::get('searchallshipmentorders');
    if($searchallshipmentorders !="" && $row->order_shipment = "Order" && $row->order_status= "Approved"){
        $shipments = shipment::where('allocation_status', 'LIKE', '%' .$searchallshipmentorders. '%')
                               ->orWhere('name', 'LIKE', '%' .$searchallshipmentorders. '%')
                               ->orWhere('address', 'LIKE', '%' .$searchallshipmentorders. '%')
                               ->get();

                               $shipments->transform(function($shipment, $key) {
                                $shipment->cart = unserialize($shipment->cart);
                                return $shipment;
                            });
                            //    dd($shipments);
                               if(count($shipments)>0)
                               return view('shipmentmanager/home', ['shipments' => $shipments], ['drivers' => $drivers])->withDetails($shipments)->withQuery($shipments);

    }
    return view('ordermanager/home', ['shipments' => $shipments])->withMessage("No such Orders found!");
}); 

Route::post('/searchallocatedorders', function(){
    $drivers=drivers::all();
    $row=shipment::all();
    $searchallocatedorders=Input::get('searchallocatedorders');
    if($searchallocatedorders !="" && $row->order_shipment = "Order" && $row->allocation_status = "Allocated"){
        $shipments = shipment::where('name', 'LIKE', '%' .$searchallocatedorders. '%')
                               ->orWhere('address', 'LIKE', '%' .$searchallocatedorders. '%')
                               ->get();

                               $shipments->transform(function($shipment, $key) {
                                $shipment->cart = unserialize($shipment->cart);
                                return $shipment;
                            });
                            //    dd($shipments);
                               if(count($shipments)>0)
                               return view('shipmentmanager/allocatedorders', ['shipments' => $shipments], ['drivers' => $drivers])->withDetails($shipments)->withQuery($shipments);

    }
    return view('shipmentmanager/allocatedorders', ['shipments' => $shipments])->withMessage("No such Orders found!");
}); 

Route::post('/searchshipmentpendingorders', function(){
    $drivers=drivers::all();
    $row=shipment::all();
    $searchshipmentpendingorders=Input::get('searchshipmentpendingorders');
    if($searchshipmentpendingorders !="" && $row->order_shipment = "Order" && $row->allocation_status = "Pending"){
        $shipments = shipment::where('name', 'LIKE', '%' .$searchshipmentpendingorders. '%')
                               ->orWhere('address', 'LIKE', '%' .$searchallocatedorders. '%')
                               ->get();

                               $shipments->transform(function($shipment, $key) {
                                $shipment->cart = unserialize($shipment->cart);
                                return $shipment;
                            });
                            //    dd($shipments);
                               if(count($shipments)>0)
                               return view('shipmentmanager/pendingorders', ['shipments' => $shipments], ['drivers' => $drivers])->withDetails($shipments)->withQuery($shipments);

    }
    return view('shipmentmanager/pendingorders', ['shipments' => $shipments])->withMessage("No such Orders found!");
}); 


Route::post('/searchdriverall', function(){
    $row=shipment::all();
    $driver = Auth::user();
    $searchdriverall=Input::get('searchdriverall');
    if($searchdriverall !="" && $row->driver_id==$driver->id){
        $shipments=shipment::where('name', 'LIKE', '%' .$searchdriverall. '%')
                               ->orWhere('address', 'LIKE', '%' .$searchdriverall. '%')
                               ->get();
                               if(count($shipments)>0)
                               return view('drivers/home', ['shipments' => $shipments])->withDetails($shipments)->withQuery($shipments);

    }
    return view('drivers/home', ['shipments' => $shipments])->withMessage("No such shipments found!");
});

Route::post('/searchdriverpending', function(){
    $row=shipment::all();
    $driver = Auth::user();
    $searchdriverpending=Input::get('searchdriverpending');
    if($searchdriverpending !="" && $row->driver_id==$driver->id && $row->deliverystatus="Pending"){
        $shipments=shipment::where('name', 'LIKE', '%' .$searchdriverpending. '%')
                               ->orWhere('address', 'LIKE', '%' .$searchdriverpending. '%')
                               ->get();
                               if(count($shipments)>0)
                               return view('drivers/pending', ['shipments' => $shipments])->withDetails($shipments)->withQuery($shipments);

    }
    return view('drivers/pending', ['shipments' => $shipments])->withMessage("No such shipments found!");
});

Route::post('/searchdriverdelivered', function(){
    $row=shipment::all();
    $driver = Auth::user();
    $searchdriverdelivered=Input::get('searchdriverdelivered');
    if($searchdriverdelivered !="" && $row->driver_id==$driver->id && $row->deliverystatus="Delivered"){
        $shipments=shipment::where('name', 'LIKE', '%' .$searchdriverdelivered. '%')
                               ->orWhere('address', 'LIKE', '%' .$searchdriverdelivered. '%')
                               ->get();
                               if(count($shipments)>0)
                               return view('drivers/delivered', ['shipments' => $shipments])->withDetails($shipments)->withQuery($shipments);

    }
    return view('drivers/delivered', ['shipments' => $shipments])->withMessage("No such shipments found!");
});

Route::post('/searchdriverconfirmed', function(){
    $row=shipment::all();
    $driver = Auth::user();
    $searchdriverconfirmed=Input::get('searchdriverconfirmed');
    if($searchdriverconfirmed !="" && $row->driver_id==$driver->id && $row->receivestatus="Received"){
        $shipments=shipment::where('name', 'LIKE', '%' .$searchdriverconfirmed. '%')
                               ->orWhere('address', 'LIKE', '%' .$searchdriverconfirmed. '%')
                               ->get();
                               if(count($shipments)>0)
                               return view('drivers/confirmed', ['shipments' => $shipments])->withDetails($shipments)->withQuery($shipments);

    }
    return view('drivers/confirmed', ['shipments' => $shipments])->withMessage("No such shipments found!");
});


Route::post('/searchmasonall', function(){
    $row=shipment::all();
    $mason = Auth::user();
    $searchmasonall=Input::get('searchmasonall');
    if($searchmasonall !="" && $row->mason_id==$mason->id){
        $shipments=servicedeliveries::where('name', 'LIKE', '%' .$searchmasonall. '%')
                               ->orWhere('address', 'LIKE', '%' .$searchmasonall. '%')
                               ->get();
                               if(count($shipments)>0)
                               return view('masons/home', ['shipments' => $shipments])->withDetails($shipments)->withQuery($shipments);

    }
    return view('masons/home', ['shipments' => $shipments])->withMessage("No such servicedeliveries found!");
});
Route::post('/searchmasonpending', function(){
    $row=shipment::all();
    $mason = Auth::user();
    $searchmasonpending=Input::get('searchmasonpending');
    if($searchmasonpending !="" && $row->mason_id==$mason->id && $row->deliverystatus="Pending"){
        $shipments=servicedeliveries::where('name', 'LIKE', '%' .$searchmasonpending. '%')
                               ->orWhere('address', 'LIKE', '%' .$searchmasonpending. '%')
                               ->get();
                               if(count($shipments)>0)
                               return view('masons/pending', ['shipments' => $shipments])->withDetails($shipments)->withQuery($shipments);

    }
    return view('masons/pending', ['shipments' => $shipments])->withMessage("No such servicedeliveries found!");
});

Route::post('/searchmasondelivered', function(){
    $row=shipment::all();
    $mason = Auth::user();
    $searchmasondelivered=Input::get('searchmasondelivered');
    if($searchmasondelivered !="" && $row->mason_id==$mason->id && $row->deliverystatus="Delivered"){
        $shipments=servicedeliveries::where('name', 'LIKE', '%' .$searchmasondelivered. '%')
                               ->orWhere('address', 'LIKE', '%' .$searchmasondelivered. '%')
                               ->get();
                               if(count($shipments)>0)
                               return view('masons/delivered', ['shipments' => $shipments])->withDetails($shipments)->withQuery($shipments);

    }
    return view('masons/delivered', ['shipments' => $shipments])->withMessage("No such servicedeliveries found!");
});
Route::post('/searchmasonconfirmed', function(){
    $row=shipment::all();
    $mason = Auth::user();
    $searchmasonconfirmed=Input::get('searchmasonconfirmed');
    if($searchmasonconfirmed !="" && $row->mason_id==$mason->id && $row->receivestatus="Received"){
        $shipments=servicedeliveries::where('name', 'LIKE', '%' .$searchmasonconfirmed. '%')
                               ->orWhere('address', 'LIKE', '%' .$searchmasonconfirmed. '%')
                               ->get();
                               if(count($shipments)>0)
                               return view('masons/confirmed', ['shipments' => $shipments])->withDetails($shipments)->withQuery($shipments);

    }
    return view('masons/confirmed', ['shipments' => $shipments])->withMessage("No such servicedeliveries found!");
});

Route::post('/searchallusers', function(){
    $row=User::all();
    $searchallusers=Input::get('searchallusers');
    if($searchallusers !=""){
        $users=User::where('name', 'LIKE', '%' .$searchallusers. '%')
                               ->orWhere('address', 'LIKE', '%' .$searchallusers. '%')
                               ->orWhere('Email', 'LIKE', '%' .$searchallusers. '%')
                               ->orWhere('is_user', 'LIKE', '%' .$searchallusers. '%')
                               ->get();
                               if(count($users)>0)
                               return view('admins/users', ['users' => $users])->withDetails($users)->withQuery($users);

    }
    return view('admins/users', ['users' => $users])->withMessage("No such users found!");
});

Route::post('/searchallaccountants', function(){
    $row=accountants::all();
    $searchallaccountants=Input::get('searchallaccountants');
    if($searchallaccountants !=""){
        $accountants=accountants::where('name', 'LIKE', '%' .$searchallaccountants. '%')
                               ->orWhere('address', 'LIKE', '%' .$searchallaccountants. '%')
                               ->orWhere('email', 'LIKE', '%' .$searchallaccountants. '%')
                               ->orWhere('is_accountant', 'LIKE', '%' .$searchallaccountants. '%')
                               ->get();
                               if(count($accountants)>0)
                               return view('admins/accountants', ['accountants' => $accountants])->withDetails($accountants)->withQuery($accountants);

    }
    return view('admins/accountants', ['accountants' => $accountants])->withMessage("No such accountants found!");
});


Route::post('/searchallshipmentmanagers', function(){
    $row=shipmentmanager::all();
    $searchallshipmentmanagers=Input::get('searchallshipmentmanagers');
    if($searchallshipmentmanagers !=""){
        $shipmentmanagers=shipmentmanager::where('name', 'LIKE', '%' .$searchallshipmentmanagers. '%')
                               ->orWhere('address', 'LIKE', '%' .$searchallshipmentmanagers. '%')
                               ->orWhere('email', 'LIKE', '%' .$searchallshipmentmanagers. '%')
                               ->orWhere('is_shipmentmanager', 'LIKE', '%' .$searchallshipmentmanagers. '%')
                               ->get();
                               if(count($shipmentmanagers)>0)
                               return view('admins/shipmentmanagers', ['shipmentmanagers' => $shipmentmanagers])->withDetails($shipmentmanagers)->withQuery($shipmentmanagers);

    }
    return view('admins/shipmentmanagers', ['shipmentmanagers' => $shipmentmanagers])->withMessage("No such shipmentmanagers found!");
});

Route::post('/searchallstockmanagers', function(){
    $row=stockmanager::all();
    $searchallstockmanagers=Input::get('searchallstockmanagers');
    if($searchallstockmanagers !=""){
        $stockmanagers=stockmanager::where('name', 'LIKE', '%' .$searchallstockmanagers. '%')
                               ->orWhere('address', 'LIKE', '%' .$searchallstockmanagers. '%')
                               ->orWhere('email', 'LIKE', '%' .$searchallstockmanagers. '%')
                               ->orWhere('is_stockmanager', 'LIKE', '%' .$searchallstockmanagers. '%')
                               ->get();
                               if(count($stockmanagers)>0)
                               return view('admins/stockmanagers', ['stockmanagers' => $stockmanagers])->withDetails($stockmanagers)->withQuery($stockmanagers);

    }
    return view('admins/stockmanagers', ['stockmanagers' => $stockmanagers])->withMessage("No such stockmanagers found!");
});

Route::post('/searchalldrivers', function(){
    $row=drivers::all();
    $searchalldrivers=Input::get('searchalldrivers');
    if($searchalldrivers !=""){
        $drivers=drivers::where('name', 'LIKE', '%' .$searchalldrivers. '%')
                               ->orWhere('address', 'LIKE', '%' .$searchalldrivers. '%')
                               ->orWhere('email', 'LIKE', '%' .$searchalldrivers. '%')
                               ->orWhere('is_driver', 'LIKE', '%' .$searchalldrivers. '%')
                               ->get();
                               if(count($drivers)>0)
                               return view('admins/drivers', ['drivers' => $drivers])->withDetails($drivers)->withQuery($drivers);

    }
    return view('admins/drivers', ['drivers' => $drivers])->withMessage("No such drivers found!");
});
Route::post('/searchsupplyall', function(){
    $row=supply::all();
    $searchsupplyall=Input::get('searchsupplyall');
    if($searchsupplyall !=""){
        $supplies=supply::where('product', 'LIKE', '%' .$searchsupplyall. '%')
                               ->orWhere('id', 'LIKE', '%' .$searchsupplyall. '%')
                               ->orWhere('quantity', 'LIKE', '%' .$searchsupplyall. '%')
                               ->orWhere('comment', 'LIKE', '%' .$searchsupplyall. '%')
                               ->get();
                               if(count($supplies)>0)
                               return view('admins/supply', ['supplies' => $supplies])->withDetails($supplies)->withQuery($supplies);

    }
    return view('admins/supply', ['supplies' => $supplies])->withMessage("No such supply found!");
});