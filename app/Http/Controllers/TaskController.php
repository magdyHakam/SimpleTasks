<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Cache;

use App\Events\TaskCreated;

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
        $tasks = Task::with('admin')->with('user')->simplePaginate(10);

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
        $top10UsersHolders =  Cache::rememberForever('Top10UsersStatistics', function () {
            return User::withCount('tasks')
                ->having('tasks_count', '>', 0)
                ->take(10)
                ->orderBy('tasks_count', 'DESC')
                ->get();
        });

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
         $admins = Cache::remember('admins', 86400, function() { // cache for 1 day (= 86400 sec.)
             return User::select('id', 'name', 'is_admin')
                ->where('is_admin', 1)
                ->get();
         });

         // get all Users
         $users = Cache::remember('users', 86400, function() { // cache for 1 day (= 86400 sec.)
             return User::select('id', 'name', 'is_admin')
                ->where('is_admin', 0)
                ->get();
         });


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
         $validate = Validator::make($request->all(), [
                     'title' => 'required|min:3|max:255',
                     // 'description' => '',
                     'assigned_by_id' => [
                                            'required',
                                            Rule::exists('users', 'id')->where(function (Builder $query) {
                                                return $query->where('is_admin', 1);
                                            }),
                                        ],
                     'assigned_to_id' => [
                                            'required',
                                            Rule::exists('users', 'id')->where(function (Builder $query) {
                                                return $query->where('is_admin', 0);
                                            }),
                                        ],
                 ]);
                 // dd($validate->errors());
        if($validate->fails()){
          return back()->withErrors($validate->errors())->withInput();
        }

        try {
            $Task = Task::create([
                "title"=> $request->title,
                "description"=> $request->description,
                "assigned_to_id"=> $request->assigned_to_id,
                "assigned_by_id"=> $request->assigned_by_id
            ]);
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

         // Dispatching TeaskCreated Event
         $job = (new \App\Jobs\UpdateStatisticsJob());
         dispatch($job);


        return redirect('/');

     }

}
