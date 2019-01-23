<?php

namespace App;
use App\order;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class user extends Model
{
    //
    protected $fillable = ['username', 'first_name', 'last_name', 'email', 'password'];

    public static function find($id)
    {
        $client = new Client(); //GuzzleHttp\Client
        $token = 'L4CduC0neM4raB45580o5TeD';
        $result = $response = $client->get("localhost:3000/user/$id/$token");

        $result = json_decode($result->getBody(), true);
        $user = new user();
        $user->id = $result['id'];
        $user->username = $result['username'];
        $user->last_name = $result['last_name'];
        $user->first_name = $result['first_name'];
        $user->email = $result['email'];
        $user->mailtoken = $result['mailtoken'];

        return $user;

    }

    public function roles()
    {
        return $this->belongsToMany('App\Role', 'role_user');
    }

    public function addRole($rolename)
    {
        $role = role::where('name', $rolename)->first();
        DB::table('role_user')->insert([
            ['role_id' => $role->id, 'user_id' => $this->id],
        ]);

    }

    public function hasRole($rolename)
    {
        $roles = $this->roles;
        foreach ($roles as $role) {
            if (strtolower($role->name) == strtolower($rolename)) {
                return true;
            }

        }

    }

    public function votedEvent()
    {
        return $this->belongsToMany('App\Event', 'voteforevent');
    }

    public function voteForEvent($eventid)
    {

        DB::table('voteforevent')->insert([
            ['event_id' => $eventid, 'user_id' => $this->id],
        ]);
    }

    public function unVoteForEvent($eventid)
    {

        DB::table('voteforevent')->where('event_id', $eventid)->where('user_id', $this->id)->delete();
    }

    public function hasVotedForEvent($eventid)
    {
        foreach ($this->votedEvent as $event) {
            if ($event->id == $eventid) {return true;}
        }
        return false;
    }



    public function orders(){
        return $this->hasMany('App\order','user_id');
    }
 
    public function cart(){
        foreach ($this->orders as $order) {
            if(!$order->validate){
                return $order;
            }
        }
        $cart = new order();
        $cart->validate=0;
        $cart->user_id=$this->id;
        $cart->save();
        return $cart;

    }

    //All interactions with events
    public function events(){
        return $this->belongsToMany('App\event','event_user');
    }

    public function hasSubscribedToEvent($eventid){
        foreach ($this->events as $e) {
            if($e->id == $eventid){
                return true;
            }
        }
        return false;
    }

    public function subscribeToEvent($eventid){
        $this->events()->attach($eventid);
    }
    public function unSubscribeToEvent($eventid){
        $this->events()->detach($eventid);
    }







}
