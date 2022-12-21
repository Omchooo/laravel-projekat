<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormsRequest;
use App\Models\Ad;
use App\Models\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FormController extends Controller
{
    // public function index()
    // {
    //     $forms = Form::latest()->paginate(15);

    //     return view('form.index', compact('forms'));
    // }

    public function show(Ad $ad, Form $form)
    {
        // return response()->download(public_path('storage/' . $form->file));
        return view('ad.form.show', compact('ad', 'form'));
    }

    public function create(Ad $ad) //implicit binding
    {
        // $segment = request()->segment(2);
        // dump($segment);
        // dump($this->ad->url);
        // dump($ad->id);
        return view('ad.form.create', compact('ad'));
    }

    public function store(FormsRequest $request, Ad $ad)
    {
        // DB::enableQueryLog();
        // $adId = $ad->with('forms')->get();
        // dump(DB::getQueryLog());
        // dump(request()->segment);
        // dump($adId);
        // dump($request->getData($ad));
        Form::create($request->getData($ad));
        return back()->with('message', "Uspješno ste se prijavili na oglas!");
    }

    public function download(Form $form)
    {
        // dump($form->id);
        // dump(public_path($form->file));
        return response()->download(public_path('storage/' . $form->file));
    }

    // public function destroy($id)
    // {
    //     $form = Form::find($id);
    //     $form->delete();
    //     return back()->with('message', "Form has been successfully deleted");
    // }
}
