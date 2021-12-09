<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskList extends Model
{
    protected $table = 'task_list';
    protected $fillable = ['text','status','date'];
    public $taskAddStatus;
    public $taskAddMessage;
    public $timestamps = false;
    use HasFactory;

    public function newTaskCheck($date){
        if(strtotime($date) < strtotime(date('Y-m-d'))){
            $this->taskAddMessage = 'you can\'t add a new task in the past';
            $this->taskAddStatus = false;
        }elseif(strtotime($date) > strtotime($date)+604800){
            $this->taskAddMessage = 'you can\'t add a new task in the future for more than 7 days';
            $this->taskAddStatus = false;
        }elseif(count(self::where('date','=',$date)->where('status','=','new')->get()) >= 5){
            $this->taskAddMessage = 'you can\'t add a more then 5 tasks at this date';
            $this->taskAddStatus = false;
        }else{
            $this->taskAddMessage = 'ok';
            $this->taskAddStatus = true;
        }

    }
}
