<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class events extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "events";
    protected $fillable = [
        'user_id',
        'title',
        'start_date',
        'end_date',
        'recurrence_time',
        'recurrence_day',
        'recurrence_months',
        'created_at',
    ];
}
