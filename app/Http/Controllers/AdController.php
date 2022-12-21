<?php

namespace App\Http\Controllers;

// use App\Http\Requests\AdRequest;

use App\Enums\Role;
use App\Http\Requests\AdRequest;
use App\Models\Ad;
use App\Models\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdController extends Controller
{
    public function index(Ad $ad)
    {

        $query = Ad::query();
        if (request()->query('trash')) {
            $query->onlyTrashed();
        }
        if (request()->user()->role->value === Role::Admin->value) {
            // DB::enableQueryLog();
        $ads = $query->latest()->paginate(15);
        // dump(DB::getQueryLog());
        }
        else {
            // DB::enableQueryLog();
            $ads = $query->latest()->where('user_id', request()->user()->id)->paginate(15);
            // dump(request()->user()->id);
            // dump(DB::getQueryLog());
        }
        // dump(Role::Admin->value);
        // dump(request()->user()->role->value);
        // DB::enableQueryLog();
        // $forms = Form::latest()->where("ad_id", $ad->id)->get();
        // dump(DB::getQueryLog());
        // dump($forms);
        $adInt = $query->count();
        // dump($adInt);

        return view('ad.index', compact('ads', 'adInt'));
    }

    public function show(Ad $ad, Request $request) //Ad $ad -> implicit binding
    {
        // $segment = request()->segment(3);
        // dump($segment);
        // DB::enableQueryLog();
        // $companies = $user->companies()->orderBy('name')->pluck('name', 'id'); //primjer #1
        // $ads = $ad->where("url", $segment)->get(); //primjer #2
        // $adId = $ad->where("url", $segment)->pluck('id');
        // dump($adId);
        // dump($ad->id);
        $forms = Form::latest()->where("ad_id", $ad->id)->get();//->paginate(15);
        // dump(DB::getQueryLog());
        return view('ad.show', compact('ad', 'forms'));
    }

    public function create()
    {
        if (request()->user()->role->value === Role::Admin->value) {
            abort(403, "Zabranjen pristup");
        }

        return view('ad.create');
    }

    public function store(AdRequest $request)
    {
        Ad::create($request->getData());
        // dd($request->getData());
        return redirect()->route('ads.index')->with('message', "Oglas je uspješno napravljen");
    }

    public function destroy($id)
    {
        // if (request()->user()->role->value === Role::Admin->value) {
        //     abort(403, "Zabranjen pristup");
        // }

        $ad = Ad::find($id);
        $ad->delete();
        return back()->with('message', "Oglas je uspješno ugašen");
    }

    public function restore($id)
    {
        // if (request()->user()->role->value === Role::Admin->value) {
        //     abort(403, "Zabranjen pristup");
        // }

        $ad = Ad::onlyTrashed()->find($id);
        $ad->restore();
        return back()->with('message', "Oglas je uspješno obnovljen");
    }

    public function forceDelete($id)
    {
        // if (request()->user()->role->value === Role::Admin->value) {
        //     abort(403, "Zabranjen pristup");
        // }

        $ad = Ad::onlyTrashed()->find($id);
        $ad->forceDelete();
        return back()->with('message', "Oglas je uspješno izbrisan");
    }
}
