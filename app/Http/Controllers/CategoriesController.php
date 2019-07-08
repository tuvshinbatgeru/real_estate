<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     * parent categories
     */
    public function index()
    {
        $title = trans('app.categories');
        $categories = Category::all();

        return view('admin.categories', compact('title', 'categories'));
    }

    public function all()
    {
        $categories = Category::with('options')->get();
        return response()->json([
            'code' => 0,
            'data' => $categories
        ]); 
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
        $rules = [
            'category_name' => 'required',
            'icon_active' => 'required',
            'type' => 'required',
            'value_type' => 'required'
        ];

        $this->validate($request, $rules);

        $data = [
            'category_name' => $request->category_name,
            'icon_active'   => $request->icon_active,
            'is_vertical' => $request->is_vertical ? 'Y' : 'N',
            'description' => $request->description,
            'type' => $request->type,
            'value_type' => $request->value_type,
        ];

        $category = Category::create($data);

        if($request->value_type == 'chooser') {
            $options = [];
            foreach($request->category_option as $option){
                array_push($options, [
                    //'category_id' => $category->id,
                    'option' => $option
                ]);
            }

            $category->options()->createMany($options);
        }

        return back()->with('success', trans('app.category_created'));
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
        $categories = Category::all();
        $title = trans('app.edit_category');
        $edit_category = Category::find($id);

        if ( ! $edit_category)
            return redirect(route('parent_categories'))->with('error', trans('app.request_url_not_found'));

        return view('admin.edit_category', compact('title', 'categories', 'edit_category'));

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
        //dd($request->all());
        $rules = [
            'category_name' => 'required',
            //'icon_idle' => 'required',
            'icon_active' => 'required',
            //'is_vertical' => 'required'
        ];

        $this->validate($request, $rules);

        $data = [
            'category_name' => $request->category_name,
            //'icon_idle'   => $request->icon_idle,
            'icon_active'   => $request->icon_active,
            'is_vertical' => $request->is_vertical ? 'Y' : 'N'
        ];
        
        Category::whereId($id)->update($data);

        return back()->with('success', trans('app.category_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->data_id;
        
        $delete = Category::where('id', $id)->delete();
        if ($delete){
            return ['success' => 1, 'msg' => trans('app.category_deleted_success')];
        }
        return ['success' => 0, 'msg' => trans('app.error_msg')];

    }
}
