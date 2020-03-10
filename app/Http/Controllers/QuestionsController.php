<?php

namespace App\Http\Controllers;

use App\Entities\Question;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('questions.index', [
            'questions' => Question::all(),
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        if ($request->isMethod('POST')) {
            $request->merge(['choice' => $request->has('choice')]);

            Question::create($request->all());

            return back()->withStatus(__('Question successfully registered.'));
        } else {
            return view('questions.create');
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(Request $request, $id)
    {
        if ($request->isMethod('POST')) {
            $question = Question::find($id);

            $request->merge(['choice' => $request->has('choice')]);
            $question->update($request->all());

            return back()->withStatus(__('Question successfully updated.'));
        } else {
            return view('questions.edit', [
                'question' => Question::find($id),
            ]);
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $question = Question::findOrFail($id);

        $question->delete();

        return redirect('questions');
    }
}
