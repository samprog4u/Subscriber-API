<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Subscriber;
use App\Models\Website;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //
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
            'email' => 'required|email:filter',
            'website_id' => 'required|numeric',
        ])->validate();

        //checking if user already subscribe to a particular website
        $userSubscribe = Subscriber::where('email', $request->email)->where('website_id', $request->website_id)->first();
        if ($userSubscribe) {
           // user already subscribe to this website
            $error = [
                'status'=> false,
                'message'=> 'Opps! You have already subscribed to this webiste'
            ];
            return response()->json($error, 400);
        }
        //checking if website id exist
        $webs = Website::find($request->website_id);
        if (!$webs) {
           // website does not exist
            $error = [
                'status'=> false,
                'message'=> 'Opps! This webiste does no exist, check and try again'
            ];
            return response()->json($error, 400);
        }
        //creating the user subscriber
        $subscribe = Subscriber::create($request->all());
        if($subscribe)
        {
            $message = [
                'status'=> true,
                'message'=> 'Great! You have successfully subscribe to our webiste'
            ];
            return response()->json($message, 201);
        }
        $error = [
            'status'=> false,
            'message'=> 'Opps! Unable to create subscription to our webiste, please try again'
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
