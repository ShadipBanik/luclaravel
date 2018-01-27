<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Channel;
use App\Thread;
use App\User;
class AdminController extends Controller
{
    public function index()
    {
        $channel = Channel::all();
        $threads = Thread::all();
        $userAll = User::all();
        $id = Auth()->id();
        $user = User::find($id);

        $user_role = $user->role;

        if($user_role === 'user'){
            return redirect('home');
        }

    	return view('admin.index', compact('user','userAll','threads', 'channel'));
    }

    public function show(){

        $userAll = User::all();
        $id = Auth()->id();
        $user = User::find($id);

        $user_role = $user->role;


        if($user_role === 'user'){
            return redirect('home');
        }

        $threads = Thread::paginate(15);

        return view('admin.threads', compact('threads','userAll'));
    }

    public function user(){

        $threads = Thread::all();
        $id = Auth()->id();
        $user_id = User::find($id);

        $user_role = $user_id->role;

        if($user_role === 'user'){
            return redirect('home');
        }

        $user = User::latest()->paginate(10);
        return view('admin.user', compact('user','threads'));
    }

    public function destroy($channel, Thread $thread)
    {

        $thread->delete();
        if (request()->wantsJson()) {
            return response([], 204);
        }
        return redirect('admin/threads');
    }

    public function userDestroy($id)
    {

        $user = User::find($id);

        $thread = Thread::where('user_id', $id);

        $user->delete($id);

        $thread->delete();

        return redirect('admin/user');
    }
}
