<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Mail\PostMail;
use App\Mail\TestMail;
use App\Models\Notifications;
use App\Models\Posts;
use App\Models\Subscribers;
use App\Models\Websites;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class Post extends Controller
{
    public function post(Request $request){
        $rules=array(
            'title' => 'required',
            'description' => 'required',
            'website_id' => 'required'
        );

        $validator=Validator::make($request->all(),$rules);

        if($validator->fails())
        {
            $messages=$validator->messages();
            $errors=$messages->all();
            return response()->json($errors, 500);

        }else{
            $post = Posts::firstOrCreate($request->all());
            $noti = [
                "website_id"=>$post->website_id,
                "post_id"=>$post->id,
                "notified"=>0
            ];
            $notification = Notifications::firstOrCreate($noti);

            $details = [
                'title' => $post->title,
                'description' => $post->description,
            ];


            $subscribers = Subscribers::where('website_id',$post->website_id)->get();



//            if($notification->notified === 0) {
               foreach ($subscribers as $key => $value) {
                   $details['email'][] = $value->email;
               }
            ;

            dispatch(new SendEmailJob($details));
//               $notification->update(['notified'=>1]);
//           }
            return response()->json($notification, 201);
        }

    }

}
