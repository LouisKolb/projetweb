<?php
use App\product;
use App\user;
use App\event;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/product',function(){
    $data = new stdClass();
    $products = product::get();
    $data->data=$products;
    return response()->json($data);
});

Route::get('/events',function(){
    $data = new stdClass();
    $events= event::get();
    $arr = array();
    $count = 0;
    foreach ($events as $p) {
        $p->recurency= $p->recurency();
        array_push($arr,$p);
      
    }
    $data->data=$arr;
    
    return response()->json($data);
});







Route::get('/users',function(){
    $data = new stdClass();
    $users= user::get();
    $arr = array();
    foreach ($users as $u) {
        $roles = "";
        foreach ($u->roles as $r) {
            $roles .=$r->name.' ';
        }
        $u->rolesstring = $roles;
        array_push($arr,$u);
      
    }
    $data->data=$arr;
    
    return response()->json($data);
    
    return response()->json($data);
});