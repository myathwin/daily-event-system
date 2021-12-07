<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Staff extends Authenticatable
{
    use HasFactory;
    public $table = 'staffs';

    public $fillable = [
       'birthday','image','file','address','phone','status'
    ];
//     public function daily_reports()
//     {
//         return $this->hasMany(DailyReport::class);
//     }
 }
