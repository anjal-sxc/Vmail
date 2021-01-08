<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sent extends Model
{
    //
    protected $fillable = [
        'to', 'subject', 'body', 'user_id',
    ];
    /**
     * @var mixed
     */

    use SoftDeletes;


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
