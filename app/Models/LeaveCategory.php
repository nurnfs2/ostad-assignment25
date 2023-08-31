<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name'];


    public function leaveApplications()
    {
        return $this->hasMany(LeaveApplication::class);
    }

}
