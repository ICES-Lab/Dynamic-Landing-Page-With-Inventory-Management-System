<?php

namespace App\Http\Controllers;

use App\Models\ContactDetails;
use App\Models\MainDetails;
use App\Models\MainPages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ViewController extends Controller
{
    public function home(){
        $contacts = ContactDetails::select('contact','type','target','icon')->get();
        foreach($contacts as $details){
            $details->icon_code = $details->iconcode->code;
        }
        $data = MainDetails::select('logo', 'link', 'lab_name', 'vision', 'what_we_do', 'what_we_do_pic', 'icon1', 'icon2', 'icon1_name', 'icon2_name')
        ->where('is_active', '=', 1)
        ->latest()
        ->first();
        $data->icon1_code = $data->iconcode1->code;
        $data->icon2_code = $data->iconcode2->code;
        $footer = MainPages::select('name', 'slug')
                ->where('is_active', '=', 1)
                ->where('infoot', 1)
                ->get();
        $header = MainPages::select('name', 'slug')
                ->where('is_active', '=', 1)
                ->where('inhead', 1)
                ->get();
        // Storage::disk('public')->makeDirectory('SubPages');
        $viewData = [
            'data' => $data,
            'contacts' => $contacts,
            'footer' => $footer,
            'header' => $header,
        ];
        return view('home',$viewData);
    }
    public function main_pages($slug){
        $contacts = ContactDetails::select('contact','type','target','icon')->get();
        foreach($contacts as $details){
            $details->icon_code = $details->iconcode->code;
        }
        $data = MainPages::select('name','head_icon_pic','content','quote','page_pic','is_layout')->where('is_active','=',1)->where('slug', $slug)->firstOrFail();
        $footer = MainPages::select('name', 'slug')
                ->where('is_active', '=', 1)
                ->where('infoot', 1)
                ->get();
        $header = MainPages::select('name', 'slug')
                ->where('is_active', '=', 1)
                ->where('inhead', 1)
                ->get();
        $data->link = MainDetails::where('is_active', '=', 1)->latest()->pluck('link')->first();
        $data->lab_name = MainDetails::where('is_active', '=', 1)->latest()->pluck('lab_name')->first();
        $data->logo = MainDetails::where('is_active', '=', 1)->latest()->pluck('logo')->first();
        $data->vision = MainDetails::where('is_active', '=', 1)->latest()->pluck('vision')->first();
        $viewData = [
            'data' => $data,
            'contacts' => $contacts,
            'footer' => $footer,
            'header' => $header,
        ];
        if($data->is_layout==0){
            $data->mission = MainDetails::where('is_active', '=', 1)->latest()->pluck('mission')->first();
            return view('main_page_incharge',$viewData);
        }
        else{
            return view('main_page',$viewData);
        }
    }
}
