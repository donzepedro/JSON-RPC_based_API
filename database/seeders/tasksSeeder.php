<?php

namespace Database\Seeders;

use App\Models\TaskList;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class tasksSeeder extends Seeder
{
    public function run()
    {
        TaskList::factory()
            ->count(10)
            ->create();
    }
}
