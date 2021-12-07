<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskList extends Model
{
    protected $table = 'task_list';
    public $timestamps = false;
    use HasFactory;

    public function NewTaskCheck($date){
        return $date;
    }
}
