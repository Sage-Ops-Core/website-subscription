<?php

namespace App\Http\Controllers;

use App\Models\Subscribers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Subscription extends Controller
{
    //
public function subscribe(Request $request){
    $rules=array(
        'email' => 'required|email|max:50'
    );
    $messages=array(
        'email.required' => 'Please enter a valid email.',
    );

    $validator=Validator::make($request->all(),$rules,$messages);
    if($validator->fails())
    {
        $messages=$validator->messages();
        $errors=$messages->all();
        return response()->json($errors, 500);

    }else{
        $subscriber = Subscribers::create($request->all());
        return response()->json($subscriber, 201);
    }

}

    public function unsubscribe($id){
        $subscriber = Subscribers::findOrFail($id);
        $subscriber->delete();
        return response()->json("Unsubscribed Successfully", 204);
    }

}
