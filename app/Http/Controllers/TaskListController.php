<?php

namespace App\Http\Controllers;

use App\Models\TaskList;
use Illuminate\Http\Request;
use PHPUnit\Exception;
use Validator;

class TaskListController extends Controller
{

    public function byDate($ymd)
    {
        return response()->json(TaskList::where('date','=',$ymd)->get(),200);
    }

    public function changeStatus($id)
    {
        $task = TaskList::find($id);
        if ($task->status == 'new') {
            $task->status = 'done';
            try {
                $task->save();
            } catch (\Exception $e) {
                return response()->json('Failed to save changes', 500);
            }
            return response()->json($task, 200);
        } else {
            return response()->json(['message' => 'The task has already been marked as completed'], 200);
        }
    }

    public function delete($id)
    {
        try {
            TaskList::destroy($id);
        } catch (\Exception $e) {
            return response()->json('Failed to delete task', 500);
        }
        return response()->json(['message' => 'Task deleted'], 200);
    }

    public function addNewTask(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'text' => 'required|max:128',
            'date' => 'required|date_format:Y-m-d'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $task = new TaskList();
        $task->NewTaskCheck($request->input('date'));
        if (!$task->taskAddStatus) {
            return $task->taskAddMessage;
        }
        $task->fill(array_merge($validator->validated(), ['status' => 'new']));
        try {
            $task->save();
        } catch (\Exception $e) {
            return response()->json('Failed to add task', 500);
        }

    }
}
