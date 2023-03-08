<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Task;
use App\Models\User;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all tasks
        $tasks = Task::with('admin')->with('user')->paginate(10);
        // dd($tasks);

        return view('tasks.list')
           ->with('tasks',$tasks);
    }

    /**
     * Display statistics.
     *
     * @return \Illuminate\Http\Response
     */
    public function statistics()
    {
        // get top 10 users task holders
        $top10UsersHolders = User::withCount('tasks')
            ->having('tasks_count', '>', 0)
            ->take(10)
            ->orderBy('tasks_count', 'DESC')
            ->get();
        // dd($top10UsersHolders);

        return view('tasks.statistics')
           ->with('users',$top10UsersHolders);
    }

    /**
     * Display a form for adding new task.
     *
     */
     public function create()
     {
         // get all Admins
         $admins = User::select('id', 'name', 'is_admin')
                ->where('is_admin', 1)
                ->get();

         // get all Users
         $users = User::select('id', 'name', 'is_admin')
               ->where('is_admin', 0)
               ->get();


         return view('tasks.create')
            ->with('admins',$admins)
            ->with('users', $users);
     }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
     {
         // dd($request->all());
         // return view('tasks.create');

        //  $validated = $request->validate([
        //     'title' => 'required|max:255',
        //     'description' => 'required',
        //     'assigned_to_id' => 'required|exists:',
        // ]);
        //
        // Validator::make($data, [
        //     'email' => [
        //         'required',
        //         Rule::exists('staff')->where(function ($query) {
        //             return $query->where('account_id', 1);
        //         }),
        //     ],
        // ]);

        $Task = Task::create([
            "title"=> $request->title,
            "description"=> $request->description,
            "assigned_to_id"=> $request->assigned_to_id,
            "assigned_by_id"=> $request->assigned_by_id
        ]);

        return redirect('/');

     }

}
