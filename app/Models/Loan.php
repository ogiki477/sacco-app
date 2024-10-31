<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $table = 'loans';

    static  public function getLoanStaff($staff_id){

        return self::select('loans.*','loan_types.type_name','loan_plans.Months')
            
            ->join('loan_types','loan_types.id','=','loans.loan_types_id')
            ->join('loan_plans','loan_plans.id','=','loans.loan_plans_id')
            
            ->where('loans.staff_id', '=',$staff_id)
            ->orderBy('loans.id','desc')->get();

    }
}
