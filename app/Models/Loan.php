<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $table = 'loans';

    static  public function getLoanStaff($staff_id){

        return self::select('loans.*')
            ->where('loans.staff_id', '=',$staff_id)
            ->orderBy('loans.id','desc')->get();

    }
}
