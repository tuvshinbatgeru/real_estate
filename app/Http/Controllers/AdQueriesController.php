<?php

namespace App\Http\Controllers;

use App\Ad_queries;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdQueriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     * ad_queries_list
     */
    public function index()
    {
        $title = trans('app.ad_queries');
        $adQueries = Ad_queries::all();

        return view('admin.ad_queries', compact('title', 'adQueries'));
    }
}
