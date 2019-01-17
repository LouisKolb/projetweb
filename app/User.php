<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    //
    protected $fillable  = ['username','first_name','last_name','email','password'];








        public function roles()
        {
            return $this->belongsToMany('App\Role','role_user');
        }
        public function addRole($rolename){
            $role = role::where('name',$rolename)->first();
            $this->roles()->attach($role->id);
            
        }
        
        
        
        
        public function hasRole($rolename){
            $roles = $this->roles;
            foreach($roles as $role){
                if($role->name == $rolename)
                    return true;
            }
            
        }




}
