<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    use HasFactory;

    protected $table = 'web_logo';

    public function getLogo(){

        if(!empty($this->logo) && file_exists('upload/logo/'.$this->logo)){
            return url('upload/logo/'.$this->logo);
        }
    }
}
