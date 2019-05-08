<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GradeClassification extends Model
{
    use SoftDeletes;

    protected $dates = ['deteled_at'];

    protected $fillable = [
        'grade_id', 'nim'
    ];
}
