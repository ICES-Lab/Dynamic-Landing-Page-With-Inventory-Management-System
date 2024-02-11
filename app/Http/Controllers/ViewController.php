<?php

namespace App\Http\Controllers;

use App\Models\ContactDetails;
use App\Models\MainDetails;
use App\Models\MainPages;
use App\Models\SubPages;
use App\Models\SubPagesRight;
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
        $data = MainPages::select('name', 'slug', 'head_icon_pic','content','quote','page_pic','is_layout')->where('is_active','=',1)->where('slug', $slug)->firstOrFail();
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
        if($data->is_layout==0){
            $viewData = [
                'data' => $data,
                'contacts' => $contacts,
                'footer' => $footer,
                'header' => $header,
            ];
            $data->mission = MainDetails::where('is_active', '=', 1)->latest()->pluck('mission')->first();
            return view('main_page_incharge',$viewData);
        }
        else{
            $subpages = SubPages::whereHas('mainPage', function ($query) use ($slug) {
                $query->where('slug', $slug);
            })->where('is_active', '=', 1)->select('name','slug','active_img')->get();
            foreach($subpages as $subpage){
            $subpage->detail = SubPagesRight::whereHas('subPage', function ($query) use ($subpage) {
                $query->where('name', $subpage->name);
            })->where('is_active', '=', 1)->latest()->pluck('content')->first();
            }
            $viewData = [
                'subpages' => $subpages,
                'data' => $data,
                'contacts' => $contacts,
                'footer' => $footer,
                'header' => $header,
            ];
            return view('main_page',$viewData);
        }
    }
    public function sub_pages($mainSlug, $subSlug){
        dd($mainSlug,$subSlug);
    }
}
