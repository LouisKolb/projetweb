<?php

namespace App;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class user extends Model
{
    //
    protected $fillable  = ['username','first_name','last_name','email','password'];
   
        public static function find($id){
            $client = new Client(); //GuzzleHttp\Client
            
                $result = $response = $client->get("localhost:3000/user/$id");
                return json_decode($result->getBody());
        }


        public function roles()
        {
            return $this->belongsToMany('App\Role','role_user');
        }



        public function addRole($userid,$rolename){
            $role = role::where('name',$rolename)->first();
            DB::table('role_user')->insert([
                ['role_id' => $role->id, 'user_id' => $userid]
            ]);
            
        }
        
        
        
        
        public function hasRole($rolename){
            $roles = $this->roles;
            foreach($roles as $role){
                if($role->name == $rolename)
                    return true;
            }
            
        }




}
