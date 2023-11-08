<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CreateFeedBackRequest;
use App\Models\Feedback;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FeedBackController extends Controller
{
    public function createFeedBack (CreateFeedBackRequest $request) {

        // return ;
        $feedback = Feedback::create($request->only('message','subject')+['user_id' => auth()->id()]);

        foreach ($request->file('images') ?? [] as $image) {
            $uuid = Str::uuid();
            $imageName = $uuid . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/uploadedimages'), $imageName);
            $image_url =  "/uploadedimages/" . $imageName;

            Image::create([
                'feedback_id' => $feedback->id,
                'image_url' => $image_url
            ]);
            
        }

        return commonSuccessMessage("Success");

    }
}
