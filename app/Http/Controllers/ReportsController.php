<?php

namespace App\Http\Controllers;

use App\Entities\Review;
use App\User;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $user = User::find($request->get('user_id'));
//        dd($user->reviews->groupBy('reviewer_id'));
        if ($request->isMethod('POST')) {

        } else {

        }

        return view('reports.index', [
            'users'    => User::all(),
            'selected' => $user,
            'reviews' => $user ? $user->reviews->where('value', '<>', '0')->groupBy('reviewer_id') : null,
        ]);
    }

}
