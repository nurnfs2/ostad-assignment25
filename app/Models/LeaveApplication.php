<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveApplication extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'category_id', 'start_date', 'end_date', 'reason', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }



    public function leaveCategory()
    {
        return $this->belongsTo(LeaveCategory::class);
    }

}
