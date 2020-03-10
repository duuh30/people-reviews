<?php

namespace App\Http\Controllers;

use App\Entities\Question;
use App\Entities\Review;
use App\User;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('reviews.index', [
            'reviews' => [
                'pending'  => auth()->user()->pendingReviews(),
                'approved' => auth()->user()->reviewed()
            ]
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if ($request->isMethod('POST')) {
            $questions = [];

            foreach($request->get('questions') as $key => $question) {
                $questions[$key] = [
                  'reviewer_id' => auth()->user()->id,
                  'question_id' => $key,
                ];

                if(isset($question['value'])) {
                    $questions[$key]['value']   = $question['value'];
                    $questions[$key]['message'] = null;
                }

                if (isset($question['message'])) {
                    $questions[$key]['value']   = 0;
                    $questions[$key]['message'] = $question['message'];
                }
            }

            $user->reviews()->createMany($questions);

            return redirect('reviews')->withStatus(__('Reviews successfully created.'));

        } else {
            $review = Review::where(['reviewer_id' => auth()->user()->id, 'reviewed_id' => $user->id])->first();

            if ($review) {
                return redirect('reviews');
            }

            return view('reviews.create', [
                'user' => $user,
                'questions' => Question::orderBy('choice', 'DESC')->get(),
            ]);
        }
    }
}
