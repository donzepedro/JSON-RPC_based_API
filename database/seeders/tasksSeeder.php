<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class tasksSeeder extends Seeder
{
    public function run()
    {
        for($i=1; $i <= 4; $i++) {
            DB::table('task_list')->insert([
                'status'=>'new',
                'text'=>'lorem ipsum '.$i,
                'date' => \Carbon\Carbon::now()->toDateTimeString()
            ]);
        }
    }
}
