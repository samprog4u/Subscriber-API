<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Post;
use App\Models\Subscriber;
use App\Models\Website;
use App\Jobs\SendEmailJob;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return Post::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validating user inputs
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:posts',
            'description' => 'required',
            'website_id' => 'required|numeric',
        ])->validate();
        //checking if website id exist
        $webs = Website::find($request->website_id);
        if (!$webs) {
           // website does not exist
            $error = [
                'status'=> false,
                'message'=> 'Opps! This website does no exist, check and try again'
            ];
            return response()->json($error, 400);
        }
        //creating the post
        $post = Post::create($request->all());
        if($post)
        {
            $userSubscribers = Subscriber::where('website_id', $request->website_id)->get();
            foreach($userSubscribers as $userSubscriber)
            {
                $data = [
                    'email' => $userSubscriber->email,
                    'title' => $request->title,
                    'description' => $request->description,
                ];
                dispatch(new SendEmailJob($data));
            }
            $message = [
                'status'=> true,
                'message'=> 'Great! You have successfully post to this webiste'
            ];
            return response()->json($message, 201);
        }
        $error = [
            'status'=> false,
            'message'=> 'Opps! Unable to post to this webiste, please try again'
        ];
        return response()->json($error, 400);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
