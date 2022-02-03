<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Option;
use App\Models\Question;
use Database\Seeders\Categories;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class Questions extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::all();
        return response()->json([$questions, 'question fetched']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->all());
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required|string|max:255',

        // ]);


        // if ($validator->fails()) {
        //     return response()->json($validator->errors());
        // }
        // dd($request->input("question_name"));
        $question =  Question::create([
            'name' => $request->input("question_name"),
            'category_id' => $request->input('category_id')
        ]);


        Option::insert([
            [
                'name' => $request->input('option1'),
                'question_id' => $question->id
            ],
            [
                'name' => $request->input('option2'),
                'question_id' => $question->id
            ],
            [
                'name' => $request->input('option3'),
                'question_id' => $question->id
            ],
            [
                'name' => $request->input('option4'),
                'question_id' => $question->id
            ]
        ]);

        return response()->json([$question, 'question created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Question::find($id);
        $question_options = Question::find($id)->options()->get();
        $question_category = Question::find(1)->category()->first();
        if (is_null($data)) {
            return response()->json('Data not found', 404);
        }
        return response()->json($data);
    }

    /**
     * Show the form for listing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function list($id)
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $question = Question::find($id);
        $question->name = $request->name;

        $question->save();

        return response()->json(['Program updated successfully.', $question]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Question::find($id)->delete();
        return response()->json('Question deleted');
    }
}
