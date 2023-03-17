<?php

namespace App\Http\Controllers;

use App\Models\veriler;
use Illuminate\Http\Request;

class borsaController extends Controller
{
    public function borsaSearch(Request $request)
    {
        $search=$request['search'];
        $data=veriler::where('isin', 'like', '%' . $search . '%')
            ->orWhere('issuer', 'like', '%' . $search . '%')
            ->orWhere('type', 'like', '%' . $search . '%')
            ->orWhere('country', 'like', '%' . $search . '%')
            ->orWhere('currency', 'like', '%' . $search . '%')
            ->get();
        if (count($data)==1){
            return view('front.arama',['data'=>$data]);
        }else{
            return view('front.cokluarama',['data'=>$data]);
        }
        return view('front.arama');

    }
}
