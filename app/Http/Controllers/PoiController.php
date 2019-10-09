<?php

namespace App\Http\Controllers;

use App\Poi;
use App\State;
use App\City;
use Illuminate\Http\Request;

use App\Http\Requests;

class PoiController extends Controller
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
        $title = trans('app.point_of_interest');
        $point_of_interests = Poi::with('districts')->get();

        $districts = City::select('id', 'city_name')->get();

        //dd($districts);

        return view('admin.point_of_interest.index', compact('title', 'point_of_interests', 'districts'));
    }

    public function districts() {
        $districts = City::select('id', 'city_name')->get();
        return response()->json(['districts' => $districts]);
    }

    public function byDistrict(Request $request) {
        $rules = [
            'district' => 'required',
        ];

        $this->validate($request, $rules);

        $query = Poi::where('searchable', 'Y');
        $district = $request->district;

        $query->whereHas('districts', function ($q) use ($district) {
            $q->where('district_id', $district);
        });

        $pois = $query->get();
        return response()->json(['pois' => $pois]);
    }

    public function all()
    {
        // $categories = Category::with('options')->where('value_type', 'chooser')->get();
        // return response()->json([
        //     'code' => 0,
        //     'data' => $categories
        // ]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$districts = City::whereStateId(2481)->select('id', 'city_name')->get();
        $districts = City::select('id', 'city_name')->get();
        return view('admin.point_of_interest.create', compact('districts'));
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
            'name' => 'required',
            'type' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'districts' => 'required',
        ];

        //dd($request->all());

        $this->validate($request, $rules);

        // $data = [
        //     'category_name' => $request->category_name,
        //     'icon_active'   => $request->icon_active,
        //     'is_vertical' => $request->is_vertical ? 'Y' : 'N',
        //     'description' => $request->description,
        //     'type' => $request->type,
        //     'value_type' => $request->value_type,
        // ];

        $poi = Poi::create([
            'place_name' => $request->name,
            'type' => $request->type,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'searchable' => isset($request->searchable) ? 'Y' : 'N'
        ]);

        $poi->districts()->sync($request->districts);

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
        // $categories = Category::all();
        // $title = trans('app.edit_category');
        // $edit_category = Category::find($id);

        // //dd($edit_category);

        // if ( ! $edit_category)
        //     return redirect(route('parent_categories'))->with('error', trans('app.request_url_not_found'));

        // return view('admin.edit_category', compact('title', 'categories', 'edit_category'));

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
        // $rules = [
        //     'category_name' => 'required',
        //     //'icon_idle' => 'required',
        //     //'icon_active' => 'required',
        //     'type' => 'required',
        //     'value_type' => 'required'
        //     //'is_vertical' => 'required'
        // ];

        // $this->validate($request, $rules);

        // $data = [
        //     'category_name' => $request->category_name,
        //     //'icon_idle'   => $request->icon_idle,
        //     'icon_active'   => $request->icon_active,
        //     'is_vertical' => $request->is_vertical ? 'Y' : 'N',
        //     'description' => $request->description,
        //     'type' => $request->type,
        //     'value_type' => $request->value_type,
        // ];
        
        // Category::whereId($id)->update($data);

        // return back()->with('success', trans('app.category_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        // $id = $request->data_id;
        
        // $delete = Category::where('id', $id)->delete();
        // if ($delete){
        //     return ['success' => 1, 'msg' => trans('app.category_deleted_success')];
        // }
        // return ['success' => 0, 'msg' => trans('app.error_msg')];
        Poi::find($id)->delete();
        return redirect('/dashboard/poi')->with('success', 'Амжилттай устгалаа.');
    }
}
