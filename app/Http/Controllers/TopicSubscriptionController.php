<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\TopicSubscription;
use Illuminate\Http\Request;

class TopicSubscriptionController extends Controller
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
    public function store(Request $request, Topic $topic)
    {
        $topic->subscribe($request->userId);
        return response()->json([
            'url' => config('app.url'), 
            'topic' => $topic->title
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TopicSubscription  $topicSubscription
     * @return \Illuminate\Http\Response
     */
    public function show(TopicSubscription $topicSubscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TopicSubscription  $topicSubscription
     * @return \Illuminate\Http\Response
     */
    public function edit(TopicSubscription $topicSubscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TopicSubscription  $topicSubscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TopicSubscription $topicSubscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TopicSubscription  $topicSubscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Topic $topic)
    {
        $topic->unsubscribe();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function publish(Request $request, Topic $topic)
    {
        return response()->json([
            'topic' => $topic->title,
            'data' => $request->data,
        ]);
    }
}
