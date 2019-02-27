<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Achievement extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'nim', 'team_name', 'achievement', 'prize', 'competition', 'place_of_competition', 'date_of_competition', 'certificate'
    ];
}
