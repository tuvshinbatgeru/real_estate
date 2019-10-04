<?php

namespace App\Http\Controllers;

use App\Ad;
use App\AdsCategory;
use App\Brand;
use App\Category;
use App\City;
use App\Country;
use App\Media;
use App\Poi;
use App\Payment;
use App\Report_ad;
use App\State;
use App\Sub_Category;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = trans('app.all_ads');
        $ads = Ad::with('city', 'country', 'state')->whereStatus(1)->orderBy('id', 'desc')->paginate(20);

        return view('admin.all_ads', compact('title', 'ads'));
    }

    public function all(Request $request) {
        if($request->filter) {
            $optionIds = [];
            $options = '';

            $len = count($request->filter);
            $i = 0;

            foreach ($request->filter as $filter) {
                $curFilter = json_decode($filter);
                array_push($optionIds, $curFilter->option_id);
                $options = $options . $curFilter->option_id;

                if($i < $len - 1) {
                    $options = $options . ',';
                }

                $i++;
            }

            $stringBuilder = 'select B.*, C.* from (
                    select ads_id, count(1) as cnt from ads_categories where option_id in (:options)
                    group by ads_id
            ) as A 
            inner join ads as B on A.ads_id = B.id
            left outer join media as C on C.ad_id = B.id';

            if($request->poi_id) {
                $stringBuilder = $stringBuilder . ' inner join ads_poi as D on D.ads_id = B.id';
            }

            $stringBuilder = $stringBuilder . ' where cnt = :cnt';

            if($request->poi_id) {
                $stringBuilder = $stringBuilder . ' AND D.poi_id = ' . $request->poi_id;
            }

            if($request->menu_id) {
                $stringBuilder = $stringBuilder . ' AND B.menu_id = ' . $request->menu_id;
            }

            if($request->purpose) {
                $stringBuilder = $stringBuilder . ' AND B.purpose = "' . $request->purpose . '"';  
            }

            $query = DB::select(DB::raw($stringBuilder), [
                'options' => $options,
                'cnt' => count($optionIds),
            ]);

            $result = $this->arrayPaginator($query, $request);
        } else {
            $query = Ad::with('feature_img');

            if($request->poi_id) {
                $poi = $request->poi_id;
                $query->whereHas('point_of_interests', function ($q) use ($poi) {
                    $q->where('poi_id', $poi);
                });
            }

            if($request->menu_id) {
                $query->where('menu_id', $request->menu_id);
            }

            if($request->purpose) {
                $query->where('purpose', $request->purpose);
            }

            $result = $query->paginate(24);
        }

        // if($request->price_interval) {
        //     $price = explode("-", $request->price_interval);
        //     $query->whereBetween('price_per_unit', $price);    
        // }

        // if($request->size_interval) {
        //     $size = explode("-", $request->size_interval);
        //     $query->whereBetween('square_unit_space', $size);    
        // }

        //dd($query);

        //$result = $query->paginate(15);

        //\Log::info($result);
        
        return response()->json([
            'code' => 0,
            'result' => $result
        ]); 
    }

    public function arrayPaginator($array, $request)
    {
        $page = isset($request->page) ? $request->page : 1;
        $perPage = 15;
        $offset = ($page * $perPage) - $perPage;

        return new LengthAwarePaginator(array_slice($array, $offset, $perPage, true), count($array), $perPage, $page,
            ['path' => $request->url(), 'query' => $request->query()]);
    }

    public function adminPendingAds()
    {
        $title = trans('app.pending_ads');
        $ads = Ad::with('city', 'country', 'state')->whereStatus(0)->orderBy('id', 'desc')->paginate(20);

        return view('admin.all_ads', compact('title', 'ads'));
    }
    public function adminBlockedAds()
    {
        $title = trans('app.blocked_ads');
        $ads = Ad::with('city', 'country', 'state')->whereStatus(2)->orderBy('id', 'desc')->paginate(20);

        return view('admin.all_ads', compact('title', 'ads'));
    }
    
    public function myAds(){
        $title = trans('app.my_ads');

        $user = Auth::user();
        $ads = $user->ads()->with('city', 'country', 'state')->orderBy('id', 'desc')->paginate(20);
        
        return view('admin.my_ads', compact('title', 'ads'));
    }

    public function pendingAds(){
        $title = trans('app.my_ads');

        $user = Auth::user();
        $ads = $user->ads()->whereStatus(0)->with('city', 'country', 'state')->orderBy('id', 'desc')->paginate(20);

        return view('admin.pending_ads', compact('title', 'ads'));
    }

    public function favoriteAds(){
        $title = trans('app.favourite_ads');

        $user = Auth::user();
        $ads = $user->favourite_ads()->with('city', 'country', 'state')->orderBy('id', 'desc')->paginate(20);
        
        return view('admin.favourite_ads', compact('title', 'ads'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = Auth::user()->id;
        $title = trans('app.post_an_ad');
        $categories = Category::with('options')->get();
        $distances = Brand::all();
        $point_of_interests = Poi::all();
        $countries = Country::all();

        $ads_images = Media::whereUserId($user_id)->whereAdId(null)->whereRef('ad')->get();

        //dd($ads_images);
        
        $previous_states = State::where('country_id', 146)->get();
        $previous_cities = City::where('state_id', old('state'))->get();


        return view('admin.create_ad', compact('title', 'categories', 'countries', 'ads_images', 'distances', 'previous_states', 'previous_cities', 'point_of_interests'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $user_id = Auth::user()->id;
        $ads_price_plan = get_option('ads_price_plan');

        $rules = [
            'ad_title'  => 'required',
            'ad_description'  => 'required',
            'point_of_interests' => 'required',
            'purpose'  => 'required',
            'menu_id'  => 'required',
            //'country'  => 'required',
            'seller_name'  => 'required',
            'seller_email'  => 'required',
            'seller_phone'  => 'required',
            'address'  => 'required',
            'latitude'  => 'required',
            'longitude'  => 'required',
        ];

        if( $ads_price_plan != 'all_ads_free'){
            $rules['price_plan'] = 'required';
        }

        $this->validate($request, $rules);

        $title = $request->ad_title;
        $slug = unique_slug($title);

        $is_negotialble = $request->negotiable ? $request->negotiable : 0;
        $mark_ad_urgent = $request->mark_ad_urgent ? $request->mark_ad_urgent : 0;
        $video_url = $request->video_url ? $request->video_url : '';

        $amenities = serialize($request->amenities);
        $distances = serialize($request->distances);

        $data = [
            'title'         => $request->ad_title,
            'menu_id'       => $request->menu_id,
            'slug'          => $slug,
            'description'   => $request->ad_description,
            'type'          => $request->type,
            'price'         => $request->price,
            'is_negotiable' => $is_negotialble,

            'purpose'       => $request->purpose,
            'price_per_unit'       => $request->price_per_unit,
            'unit_type'       => $request->price_unit,
            'square_unit_space'       => $request->square_unit_space,
            'floor'       => $request->floor,
            'beds'       => $request->beds,
            'attached_bath'       => $request->attached_bath,
            'common_bath'       => $request->common_bath,
            'balcony'       => $request->balcony,
            'dining_space'       => $request->dining_space,
            'living_room'       => $request->living_room,
            'amenities'       => $amenities,
            'distances'       => $distances,

            'seller_name'   => $request->seller_name,
            'seller_email'  => $request->seller_email,
            'seller_phone'  => $request->seller_phone,
            'country_id'    => 146, //$request->country,
            'state_id'      => $request->state,
            'city_id'       => $request->city,
            'address'       => $request->address,

            'latitude'       => $request->latitude,
            'longitude'       => $request->longitude,

            'video_url'     => $video_url,
            'price_plan'    => $request->price_plan,
            'mark_ad_urgent' => $mark_ad_urgent,
            'status'        => 1,
            'user_id'       => $user_id,
        ];

        //Check ads moderation settings
        if (get_option('ads_moderation') == 'direct_publish'){
            $data['status'] = 1;
        }

        //if price_plan not in post data, then set a default value, although mysql will save it as enum first value
        if ( ! $request->price_plan){
            $data['price_plan'] = 'regular';
        }

        $created_ad = Ad::create($data);

        /**
         * iF add created
         */
        if ($created_ad){
            //Attach all unused media with this ad
            Media::whereUserId($user_id)->whereAdId(null)->whereRef('ad')->update(['ad_id'=>$created_ad->id]);

            $options = [];
            foreach($request->category_option as $option){
                $separators = explode(".", $option);
                if(count($separators) >= 2) {
                    array_push($options, [
                        'ads_id' => $created_ad->id,
                        'category_id' => $separators[0],
                        'option_id' => $separators[1]
                    ]);    
                }
            }

            //\Log::info($options);
            AdsCategory::insert($options);
            $created_ad->point_of_interests()->sync($request->point_of_interests);
            //$created_ad->categories()->createMany($options);

            //$created_ad->options
            /**
             * Payment transaction login here
             */
            $ads_price = get_ads_price($created_ad->price_plan);
            if ($mark_ad_urgent){
                $ads_price = $ads_price + get_option('urgent_ads_price');
            }

            if ($ads_price){
                //Insert checkout Logic

                $transaction_id = 'tran_'.time().str_random(6);
                // get unique recharge transaction id
                while( ( Payment::whereLocalTransactionId($transaction_id)->count() ) > 0) {
                    $transaction_id = 'reid'.time().str_random(5);
                }
                $transaction_id = strtoupper($transaction_id);

                $currency = get_option('currency_sign');
                $payments_data = [
                    'ad_id'     => $created_ad->id,
                    'user_id'   => $user_id,
                    'amount'    => $ads_price,
                    'payment_method'    => $request->payment_method,
                    'status'    => 'initial',
                    'currency'  => $currency,
                    'local_transaction_id'  => $transaction_id
                ];
                $created_payment = Payment::create($payments_data);

                return redirect(route('payment_checkout', $created_payment->local_transaction_id));
            }

            return redirect(route('pending_ads'))->with('success', trans('app.ad_created_msg'));

        }
        

        //dd($request->input());
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
        $user = Auth::user();
        $user_id = $user->id;

        $title = trans('app.edit_ad');
        $ad = Ad::find($id);

        if (!$ad)
            return view('admin.error.error_404');

        if (! $user->is_admin()){
            if ($ad->user_id != $user_id){
                return view('admin.error.error_404');
            }
        }

        $countries = Country::all();
        $ads_images = Media::whereUserId($user_id)->whereAdId(null)->whereRef('ad')->get();

        $previous_states = State::where('country_id', $ad->country_id)->get();
        $previous_cities = City::where('state_id', $ad->state_id)->get();

        $categories = Category::all();
        $distances = Brand::all();

        return view('admin.edit_ad', compact('title', 'categories', 'countries', 'ads_images', 'ad', 'distances', 'previous_states', 'previous_cities'));

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
        $ad = Ad::find($id);
        $user = Auth::user();
        $user_id = $user->id;

        if (! $user->is_admin()){
            if ($ad->user_id != $user_id){
                return view('admin.error.error_404');
            }
        }
        $mark_ad_urgent = $request->mark_ad_urgent ? $request->mark_ad_urgent : 0;

        $rules = [
            'ad_title'  => 'required',
            'ad_description'  => 'required',
            'type'  => 'required',
            'purpose'  => 'required',
            'country'  => 'required',
            'seller_name'  => 'required',
            'seller_email'  => 'required',
            'seller_phone'  => 'required',
            'address'  => 'required',
            'latitude'  => 'required',
            'longitude'  => 'required',
        ];

        $this->validate($request, $rules);

        $title = $request->ad_title;
        //$slug = unique_slug($title);
        
        $sub_category = Category::find($request->category);
        $is_negotialble = $request->negotiable ? $request->negotiable : 0;
        $brand_id = $request->brand ? $request->brand : 0;
        $video_url = $request->video_url ? $request->video_url : '';

        $amenities = serialize($request->amenities);
        $distances = serialize($request->distances);

        $data = [
            'title'         => $request->ad_title,
            'description'   => $request->ad_description,
            'type'          => $request->type,
            'price'         => $request->price,
            'is_negotiable' => $is_negotialble,

            'purpose'       => $request->purpose,
            'price_per_unit'       => $request->price_per_unit,
            'unit_type'       => $request->price_unit,
            'square_unit_space'       => $request->square_unit_space,
            'floor'       => $request->floor,
            'beds'       => $request->beds,
            'attached_bath'       => $request->attached_bath,
            'common_bath'       => $request->common_bath,
            'balcony'       => $request->balcony,
            'dining_space'       => $request->dining_space,
            'living_room'       => $request->living_room,
            'amenities'       => $amenities,
            'distances'       => $distances,

            'seller_name' => $request->seller_name,
            'seller_email' => $request->seller_email,
            'seller_phone' => $request->seller_phone,
            'country_id' => $request->country,
            'state_id' => $request->state,
            'city_id' => $request->city,
            'address' => $request->address,

            'latitude'       => $request->latitude,
            'longitude'       => $request->longitude,

            'video_url' => $video_url,
            //'mark_ad_urgent' => $mark_ad_urgent,

        ];
        
        $updated_ad = $ad->update($data);

        /**
         * iF add created
         */
        if ($updated_ad){
            //Attach all unused media with this ad
            Media::whereUserId($user_id)->whereAdId(null)->whereRef('ad')->update(['ad_id'=>$ad->id]);
        }

        return redirect()->back()->with('success', trans('app.ad_updated'));
    }


    public function adStatusChange(Request $request){
        $slug = $request->slug;
        $ad = Ad::whereSlug($slug)->first();
        if ($ad){
            $value = $request->value;
            /*
            $ad->status = $value;
            $ad->save();*/
            ad_status_change($ad->id, $value);
            if ($value ==1){
                return ['success'=>1, 'msg' => trans('app.ad_approved_msg')];
            }elseif($value ==2){
                return ['success'=>1, 'msg' => trans('app.ad_blocked_msg')];
            }
            elseif($value ==3){
                return ['success'=>1, 'msg' => trans('app.ad_archived_msg')];
            }
        }
        return ['success'=>0, 'msg' => trans('app.error_msg')];

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $slug = $request->slug;
        $ad = Ad::whereSlug($slug)->first();
        if ($ad){
            $media = Media::whereAdId($ad->id)->get();
            if ($media->count() > 0){
                foreach($media as $m){
                    $storage = Storage::disk($m->storage);
                    if ($storage->has('uploads/images/'.$m->media_name)){
                        $storage->delete('uploads/images/'.$m->media_name);
                    }
                    if ($m->type == 'image'){
                        if ($storage->has('uploads/images/thumbs/'.$m->media_name)){
                            $storage->delete('uploads/images/thumbs/'.$m->media_name);
                        }
                    }
                    $m->delete();
                }
            }
            $ad->delete();
            return ['success'=>1, 'msg' => trans('app.media_deleted_msg')];
        }
        return ['success'=>0, 'msg' => trans('app.error_msg')];
    }

    public function getSubCategoryByCategory(Request $request){
        $category_id = $request->category_id;
        $brands = Sub_Category::whereCategoryId($category_id)->select('id', 'category_name', 'category_slug')->get();
        return $brands;
    }

    public function getBrandByCategory(Request $request){
        $category_id = $request->category_id;
        $brands = Brand::whereCategoryId($category_id)->select('id', 'brand_name')->get();
        return $brands;
    }

    public function getStateByCountry(Request $request){
        $country_id = $request->country_id;
        $states = State::whereCountryId($country_id)->select('id', 'state_name')->get();
        return $states;
    }

    public function getCityByState(Request $request){
        $state_id = $request->state_id;
        $cities = City::whereStateId($state_id)->select('id', 'city_name')->get();
        return $cities;
    }

    public function getParentCategoryInfo(Request $request){
        $category_id = $request->category_id;
        $sub_category = Category::find($category_id);
        $category = Category::find($sub_category->category_id);
        return $category;
    }

    public function uploadAdsImage(Request $request){
        $user_id = Auth::user()->id;

        if ($request->hasFile('images')){
            $image = $request->file('images');
            $valid_extensions = ['jpg','jpeg','png'];

            if ( ! in_array(strtolower($image->getClientOriginalExtension()), $valid_extensions) ){
                return ['success' => 0, 'msg' => implode(',', $valid_extensions).' '.trans('app.valid_extension_msg')];
            }

            $file_base_name = str_replace('.'.$image->getClientOriginalExtension(), '', $image->getClientOriginalName());

            $resized = Image::make($image)->resize(640, null, function ($constraint) {
                $constraint->aspectRatio();
            })->stream();
            $resized_thumb = Image::make($image)->resize(320, 213)->stream();

            $image_name = strtolower(time().str_random(5).'-'.str_slug($file_base_name)).'.' . $image->getClientOriginalExtension();

            $imageFileName = 'uploads/images/'.$image_name;
            $imageThumbName = 'uploads/images/thumbs/'.$image_name;

            try{
                //Upload original image
                $is_uploaded = current_disk()->put($imageFileName, $resized->__toString(), 'public');

                if ($is_uploaded) {
                    //Save image name into db
                    $created_img_db = Media::create(['user_id' => $user_id, 'media_name'=>$image_name, 'type'=>'image', 'storage' => get_option('default_storage'), 'ref'=>'ad']);

                    //upload thumb image
                    current_disk()->put($imageThumbName, $resized_thumb->__toString(), 'public');
                    $img_url = media_url($created_img_db, false);
                    return ['success' => 1, 'img_url' => $img_url];
                } else {
                    return ['success' => 0];
                }
            } catch (\Exception $e){
                return $e->getMessage();
            }

        }
    }
    /**
     * @param Request $request
     * @return array
     */

    public function deleteMedia(Request $request){
        $media_id = $request->media_id;
        $media = Media::find($media_id);

        $storage = Storage::disk($media->storage);
        if ($storage->has('uploads/images/'.$media->media_name)){
            $storage->delete('uploads/images/'.$media->media_name);
        }

        if ($media->type == 'image'){
            if ($storage->has('uploads/images/thumbs/'.$media->media_name)){
                $storage->delete('uploads/images/thumbs/'.$media->media_name);
            }
        }

        $media->delete();
        return ['success'=>1, 'msg'=>trans('app.media_deleted_msg')];
    }

    /**
     * @param Request $request
     * @return array
     */
    public function featureMediaCreatingAds(Request $request){
        $user_id = Auth::user()->id;
        $media_id = $request->media_id;

        Media::whereUserId($user_id)->whereAdId('0')->whereRef('ad')->update(['is_feature'=>'0']);
        Media::whereId($media_id)->update(['is_feature'=>'1']);

        return ['success'=>1, 'msg'=>trans('app.media_featured_msg')];
    }

    /**
     * @return mixed
     */
    
    public function appendMediaImage(){
        $user_id = Auth::user()->id;
        $ads_images = Media::whereUserId($user_id)->whereAdId(null)->whereRef('ad')->get();

        //dd($ads_count

        return view('admin.append_media', compact('ads_images'));
    }

    /**
     * Listing
     */

    public function listing(Request $request){
        $ads = Ad::active();

        $premium_ads = Ad::activePremium();

        $query = "";
        if ($request->q){
            $ads = $ads->where(function($ads) use($request){
                $ads->where('title','like', "%{$request->q}%")->orWhere('description','like', "%{$request->q}%");
            });

            $query = $request->q;
        }

        if ($request->type){
            $ads = $ads->whereType($request->type);
        }
        // if ($request->country){
        //     $ads = $ads->whereCountryId($request->country);
        // }
        // if ($request->state){
        //     $ads = $ads->whereStateId($request->state);
        // }
        // if ($request->city){
        //     $ads = $ads->whereCityId($request->city);
        // }
        // if ($request->min_price){
        //     $ads = $ads->where('price', '>=', $request->min_price);
        // }
        // if ($request->max_price){
        //     $ads = $ads->where('price', '<=', $request->max_price);
        // }
        // if ($request->adType){
        //     if ($request->adType == 'business') {
        //         $ads = $ads->business();
        //     }elseif ($request->adType == 'personal'){
        //         $ads = $ads->personal();
        //     }
        // }
        // if ($request->user_id){
        //     $ads = $ads->whereUserId($request->user_id);
        // }
        // if ($request->shortBy){
        //     switch ($request->shortBy){
        //         case 'price_high_to_low':
        //             $ads = $ads->orderBy('price', 'desc');
        //             break;
        //         case 'price_low_to_height':
        //             $ads = $ads->orderBy('price', 'asc');
        //             break;
        //         case 'latest':
        //             $ads = $ads->orderBy('id', 'desc');
        //             break;
        //     }
        // }else{
        //     $ads = $ads->orderBy('id', 'desc');
        // }

        $ads_per_page = get_option('ads_per_page');
        $ads = $ads->with('city');
        $ads = $ads->paginate($ads_per_page);

    
        //Check max impressions
        $max_impressions = get_option('premium_ads_max_impressions');
        $premium_ads = $premium_ads->where('max_impression', '<', $max_impressions);
        $take_premium_ads = get_option('number_of_premium_ads_in_listing');
        if ($take_premium_ads > 0){
            $premium_order_by = get_option('order_by_premium_ads_in_listing');
            $premium_ads = $premium_ads->take($take_premium_ads);
            $last_days_premium_ads = get_option('number_of_last_days_premium_ads');

            $premium_ads = $premium_ads->where('created_at', '>=', Carbon::now()->timezone(get_option('default_timezone'))->subDays($last_days_premium_ads));

            if ($premium_order_by == 'latest'){
                $premium_ads = $premium_ads->orderBy('id', 'desc');
            }elseif ($premium_order_by == 'random'){
                $premium_ads = $premium_ads->orderByRaw('RAND()');
            }

            $premium_ads = $premium_ads->get();

        }else{
            $premium_ads = false;
        }
  
        $title = trans('app.search_properties');
        $countries = Country::all();

        $selected_categories = Category::find($request->category);
        $selected_sub_categories = Category::find($request->sub_category);

        $filters = Category::with('options')->get();

        $selected_countries = Country::find($request->country);
        $selected_states = State::find($request->state);
        //dd($selected_countries->states);

        $agents = User::whereActiveStatus('1')->whereFeature('1')->whereUserType('user')->take(10)->orderBy('id', 'desc')->get();
        //dd($filters);
        //return view($this->theme.'listing', compact('top_categories', 'ads', 'title', 'countries', 'selected_categories', 'selected_sub_categories', 'selected_countries', 'selected_states', 'premium_ads', 'agents'));
        return view($this->theme.'listing', compact('query', 'filters', 'ads', 'title', 'countries', 'selected_categories', 'selected_sub_categories', 'selected_countries', 'selected_states', 'premium_ads', 'agents'));
    }

    /**
     * @param $slug
     * @return mixed
     */
    public function singleAd($slug){
        $limit_regular_ads = get_option('number_of_free_ads_in_home');
        $ad = Ad::whereSlug($slug)->first();

        if (! $ad){
            return view('theme.error_404');
        }
        
        if ( ! $ad->is_published()){
            if (Auth::check()){
                $user_id = Auth::user()->id;
                if ($user_id != $ad->user_id){
                    return view('theme.error_404');
                }
            }else{
                return view('theme.error_404');
            }
        }else{
            $ad->view = $ad->view+1;
            $ad->save();
        }

        $title = $ad->title;
        $ad_agent_id = $ad->user_id;

        //Get distances
        $distances = Brand::all();
        // $indore_ammenties = Category::whereCategoryType('indoor')->get();
        // $outdoor_ammenties = Category::whereCategoryType('outdoor')->get();
        //Get Related Ads, add [->whereCountryId($ad->country_id)] for more specific results
        $related_ads = Ad::active()->whereUserId($ad_agent_id)->where('id', '!=',$ad->id)->with('city')->limit($limit_regular_ads)->orderByRaw('RAND()')->take(5)->get();

        $agents = User::whereActiveStatus('1')->whereFeature('1')->whereUserType('user')->take(10)->orderBy('id', 'desc')->get();

        return view($this->theme.'single_ad', compact('ad', 'title', 'distances', 'related_ads', 'agents'));
    }

    public function embeddedAd($slug){
        $ad = Ad::whereSlug($slug)->first();
        return view($this->theme.'embedded_ad', compact('ad'));
    }

    /**
     * @param Request $request
     */
    
    public function switchGridListView(Request $request){
        session(['grid_list_view' => $request->grid_list_view]);
    }

    /**
     * @param Request $request
     * @return array
     */
    public function reportAds(Request $request){
        $ad = Ad::whereSlug($request->slug)->first();
        if ($ad) {
            $data = [
                'ad_id' => $ad->id,
                'reason' => $request->reason,
                'email' => $request->email,
                'message' => $request->message,
            ];
            Report_ad::create($data);
            return ['status'=>1, 'msg'=>trans('app.ad_reported_msg')];
        }
        return ['status'=>0, 'msg'=>trans('app.error_msg')];
    }
    
    
    public function reports(){
        $reports = Report_ad::orderBy('id', 'desc')->with('ad')->paginate(20);
        $title = trans('app.ad_reports');

        return view('admin.ad_reports', compact('title', 'reports'));
    }

    public function deleteReports(Request $request){
        Report_ad::find($request->id)->delete();
        return ['success'=>1, 'msg' => trans('app.report_deleted_success')];
    }
    
    public function reportsByAds($slug){
        $user = Auth::user();

        if ($user->is_admin()){
            $ad = Ad::whereSlug($slug)->first();
        }else{
            $ad = Ad::whereSlug($slug)->whereUserId($user->id)->first();
        }

        if (! $ad){
            return view('admin.error.error_404');
        }

        $reports = $ad->reports()->paginate(20);

        $title = trans('app.ad_reports');
        return view('admin.reports_by_ads', compact('title', 'ad', 'reports'));

    }
    
}
