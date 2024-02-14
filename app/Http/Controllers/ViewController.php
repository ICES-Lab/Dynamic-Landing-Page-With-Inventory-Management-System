<?php

namespace App\Http\Controllers;

use App\Models\ContactDetails;
use App\Models\Incharges;
use App\Models\InchargesBottom;
use App\Models\InchargesMedium;
use App\Models\InchargesSocialMedia;
use App\Models\InchargesTop;
use App\Models\MainDetails;
use App\Models\MainPages;
use App\Models\SubPages;
use App\Models\SubPagesLeft;
use App\Models\SubPagesRight;
use App\Models\SubPagesSocialMedia;
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
        $slides = SubPages::whereHas('mainPage', function($query) {
            $query->where('in_slider', 1);
        })->where('is_active','=',1)->select('name','active_img')->get();
        foreach($slides as $slide){
        $slide->content = SubPagesRight::whereHas('subPage', function ($query) use ($slide) {
            $query->where('name', $slide->name);
        })->where('is_active', '=', 1)->where('in_sub_page', '=', 1)->latest()->pluck('content')->first();
        }
        $in_home = SubPages::whereHas('mainPage', function($query) {
            $query->where('in_home', 1);
        })->where('is_active','=',1)->latest()->take(3)->select('name','slug','active_img','main_page_id')->get();
        foreach($in_home as $home){
        $home->main = MainPages::where('id','=',$home->main_page_id)->pluck('slug')->first();
        $home->detail = SubPagesRight::whereHas('subPage', function ($query) use ($home) {
            $query->where('name', $home->name);
        })->where('is_active', '=', 1)->where('in_sub_page', '=', 1)->latest()->pluck('content')->first();
        }
        $in_foot = SubPages::whereHas('mainPage', function($query) {
            $query->where('in_home_foot', 1);
        })->where('is_active','=',1)->latest()->take(4)->select('slug','active_img','main_page_id')->get();
        foreach($in_foot as $foot){
            $foot->main = MainPages::where('id','=',$foot->main_page_id)->pluck('slug')->first();
            }
        // Storage::disk('public')->makeDirectory('Incharges');
        $viewData = [
            'data' => $data,
            'slides' => $slides,
            'in_home' => $in_home,
            'in_foot' => $in_foot,
            'contacts' => $contacts,
            'footer' => $footer,
            'header' => $header,
        ];
        // dd($viewData);
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
            $incharge = Incharges::where('is_active', '=', 1)->select('name','slug','department','level','email','profile_img')->get();
            $in_foot = SubPages::whereHas('mainPage', function($query) {
                $query->where('in_home_foot', 1);
            })->where('is_active','=',1)->latest()->take(4)->select('slug','active_img','main_page_id')->get();
            foreach($in_foot as $foot){
                $foot->main = MainPages::where('id','=',$foot->main_page_id)->pluck('slug')->first();
                }
            $viewData = [
                'data' => $data,
                'incharge' => $incharge,
                'contacts' => $contacts,
                'in_foot' => $in_foot,
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
            })->where('in_sub_page', '=', 1)->where('is_active', '=', 1)->latest()->pluck('content')->first();
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
        $check = MainPages::where('is_active','=',1)->where('slug', $mainSlug)->pluck('is_layout')->first();
        $contacts = ContactDetails::select('contact','type','target','icon')->get();
        foreach($contacts as $details){
            $details->icon_code = $details->iconcode->code;
        }
        $footer = MainPages::select('name', 'slug')
                ->where('is_active', '=', 1)
                ->where('infoot', 1)
                ->get();
        $header = MainPages::select('name', 'slug')
                ->where('is_active', '=', 1)
                ->where('inhead', 1)
                ->get();
        if($check==1){
            $data = SubPages::select('name','img1','img2','img3')->where('is_active','=',1)->where('slug', $subSlug)->firstOrFail();
            $left = SubPagesLeft::whereHas('subPage', function ($query) use ($subSlug) {
                $query->where('slug', $subSlug);
            })->where('is_active', '=', 1)->select('title','content','img1','img2')->get();
            $right = SubPagesRight::whereHas('subPage', function ($query) use ($subSlug) {
                $query->where('slug', $subSlug);
            })->where('is_active', '=', 1)->select('title','content')->get();
            $social = SubPagesSocialMedia::whereHas('subPage', function ($query) use ($subSlug) {
                $query->where('slug', $subSlug);
            })->where('is_active', '=', 1)->select('icon','target', 'link')->get();
            foreach($social as $socialmedia){
                $socialmedia->icon_code = $socialmedia->iconcode->code;
            }
            $viewData = [
                'data' => $data,
                'left' => $left,
                'right' => $right,
                'social' => $social,
                'contacts' => $contacts,
                'footer' => $footer,
                'header' => $header,
            ];
            $data->link = MainDetails::where('is_active', '=', 1)->latest()->pluck('link')->first();
            $data->lab_name = MainDetails::where('is_active', '=', 1)->latest()->pluck('lab_name')->first();
            $data->logo = MainDetails::where('is_active', '=', 1)->latest()->pluck('logo')->first();
            $data->vision = MainDetails::where('is_active', '=', 1)->latest()->pluck('vision')->first();
            return view('sub_page',$viewData);
        }
        else{
            $data = Incharges::where('is_active', '=', 1)->where('slug', '=', $subSlug)->select('name','slug','department','level','email','profile_img')->first();
            $viewData = [
                'data' => $data,
                'contacts' => $contacts,
                'footer' => $footer,
                'header' => $header,
            ];
            $data->social = InchargesSocialMedia::whereHas('incharge', function ($query) use ($data) {
                $query->where('name', $data->name);
            })->where('is_active', '=', 1)->select('link','icon_img')->get();
            $data->top = InchargesTop::whereHas('incharge', function ($query) use ($data) {
                $query->where('name', $data->name);
            })->where('is_active', '=', 1)->select('id','title')->get();
            foreach($data->top as $top){
                $top->medium = InchargesMedium::whereHas('top', function ($query) use ($top) {
                    $query->where('title', $top->title);
                })->where('is_active', '=', 1)->select('title')->get();
                foreach($top->medium as $medium){
                    $medium->bottom = InchargesBottom::whereHas('medium', function ($query) use ($medium) {
                        $query->where('title', $medium->title);
                    })->where('is_active', '=', 1)->select('content','medium_id')->get();
                }
            }
            // dd($data);
            $data->head_icon_pic = MainPages::where('slug','=',$mainSlug)->pluck('head_icon_pic')->first();
            $data->link = MainDetails::where('is_active', '=', 1)->latest()->pluck('link')->first();
            $data->lab_name = MainDetails::where('is_active', '=', 1)->latest()->pluck('lab_name')->first();
            $data->logo = MainDetails::where('is_active', '=', 1)->latest()->pluck('logo')->first();
            $data->vision = MainDetails::where('is_active', '=', 1)->latest()->pluck('vision')->first();
            return view('faculty',$viewData);
        }
    }
}
