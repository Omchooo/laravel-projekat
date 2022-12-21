<?php

namespace App\Http\Requests;

use App\Models\Ad;
use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class AdRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'country' => 'required',
            'no_places' => 'required',
            'desc' => 'required',
            // 'url' => 'required', //nije potrebno nabrajati jer ovdje generisemo url i slug
            // 'slug' => 'required'
        ];
    }

    public function getData()
    {
        $data = $this->validated() + [
            'user_id' => request()->user()->id
        ];


        // $makeUrl = new Ad();
        // $url = $makeUrl->makeUrl(); //posto je static ne moram ovako
        $url = Ad::makeUrl();
        $data['url'] = $url;
        $data['slug'] = Str::slug($data['title'], "-");

        // $data['url'] = Form::makeUrl();

        return $data;
    }
}
