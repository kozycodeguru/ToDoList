<?php


namespace App\Http\Traits;

use Carbon\Carbon;

/**
 * 
 */
trait TaskTrait
{
    public $todoDateFormatting = true;
    public function getToDoDateAttribute($value){
        if($this->getToDoDateFormatting)
        {
            return Carbon::parse($value)->toFormattedDatatring();
        }
        else
        {
            return $this->attributes['todo_date']=$value;
        }
    }
}
