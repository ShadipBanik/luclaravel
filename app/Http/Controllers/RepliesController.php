<?php
namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Notifications\YouWereMentioned;
use App\Reply;
use App\Thread;
use App\User;
use Illuminate\Auth\Access\AuthorizationException;



class RepliesController extends Controller
{
    /**
     * Create a new RepliesController instance.
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'index']);
    }

    /**
     * Fetch all relevant replies.
     *
     * @param int $channelId
     * @param Thread $thread
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index($channelId, Thread $thread)
    {
        return $thread->replies()->paginate(20);
    }

    /**
     * Persist a new reply.
     *
     * @param  integer $channelId
     * @param  Thread $thread
     * @param  CreatePostRequest $form

     * @return \Illuminate\Database\Eloquent\Model
     */

    public function store($channelId, Thread $thread, CreatePostRequest $form)
    {

           $reply= $thread->addReply([

                'body' => request('body'),
                'user_id' => auth()->id()
            ]);

           preg_match_all('/\@([^\s\.]+)/',$reply->body,$matches);

        foreach ($matches[1] as $name){

               $user=User::whereName($name)->first();
                if($user){

               $user->notify(new YouWereMentioned($reply));
                }
           }

               return $reply->load('owner');


    }

    /**
     * Update an existing reply.
     * @param Reply $reply
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     * @throws AuthorizationException
     */
    public function update(Reply $reply)
    {
        $this->authorize('update', $reply);

        $this->validate(request(), ['body' => 'required|spamfree']);

        $reply->update(request(['body']));


    }

    /**
     * Delete the given reply.
     *
     * @param  Reply $reply
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     * @throws AuthorizationException
     */
    public function destroy(Reply $reply)
    {
        $this->authorize('update', $reply);
        $reply->delete();
        if (request()->expectsJson()) {
            return response(['status' => 'Reply deleted']);
        }
        return back();
    }


}