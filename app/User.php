<?php

namespace App;

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
        $result = $response = $client->get("localhost:3000/user/$id");

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

}
