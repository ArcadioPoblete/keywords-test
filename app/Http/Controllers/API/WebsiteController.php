<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Website;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
	/**
	 * List all the websites
	 *
	 * @param Request $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function index(Request $request)
	{
		$websites = Website::all();
		return response()->json($websites);
	}

	/**
	 * Get a specific website using the user domain input
	 *
	 * @param Request $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function search(Request $request)
	{
		// The domain sent from the input
		$domain = $request->domain;
		
		//Query build
		$getDomain = Website::where('url', 'LIKE', '%'.$domain.'%')->get();

		if(empty($domain)){
			return response()->json(['error' => 'Invalid Domain']);
		}else{
			return response()->json($getDomain);
		}	

	}
}
