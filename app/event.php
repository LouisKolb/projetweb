<?php

namespace App;

use App\user;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class event extends Model
{

    public function pictures()
    {

        return $this->belongsToMany('App\picture', 'event_picture');
    }

    public function votes()
    {
        return $this->belongsToMany('App\event', 'voteforevent');
    }

    public function voteCount()
    {
        return sizeof($this->votes);

    }

    public function addPicture($pictureid)
    {

        DB::table('event_picture')->insert([
            ['event_id' => $this->id, 'picture_id' => $pictureid],
        ]);

    }

    public function participants()
    {
        $participants = array();
        $rows = DB::table('event_user')->where('event_id', $this->id)->get();
        foreach ($rows as $participation) {
            array_push($participants, user::find($participation->user_id));
        }

        return $participants;

    }

    public function recurency()
    {
        $count = DB::table('recurency')->where('event_id', $this->id)->count();
        if (!$count) {
            return 0;
        } else {
            return DB::table('recurency')->where('event_id', $this->id)->first()->days;
        }

    }

    public function addRecurency($days)
    {
        $count = DB::table('recurency')->insert([
            ['event_id' => $this->id, 'days' => $days],
        ]);
    }
    public function removeRecurency()
    {
        DB::table('recurency')->where('event_id', $this->id)->delete();
    }

}
