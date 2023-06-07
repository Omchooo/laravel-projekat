<?php

namespace App\Http\Requests;

use App\Models\Ad;
use App\Models\Form;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use Illuminate\Support\Str;

class FormsRequest extends FormRequest
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
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'nullable',
            'bio' => 'nullable',
            'file' => 'required|mimes:txt,pdf,docx,doc|max:5000'
        ];
    }

    public function getData($ad)
    {
        $data = $this->validated() + [
            'ad_id' => $ad->id
        ];


        //----------pdf konverter----------
        // if ($this->hasFile('file'))
        // {
        //     /* Set the PDF Engine Renderer Path */
        // $domPdfPath = base_path('vendor/dompdf/dompdf');
        // Settings::setPdfRendererPath($domPdfPath);
        // Settings::setPdfRendererName('DomPDF');

        // //Load word file
        // $Content = IOFactory::load($this->file);

        // $name = Str::random(25);
        // //Save it into PDF
        // $PDFWriter = IOFactory::createWriter($Content,'PDF');
        // $PDFWriter->save($data['file'] = 'storage/' . $directory . $name . '.pdf');
        // Storage::put($directory, $data['file']);
        // }
        //------------------kraj pdf konvertera---------

        $directory = Form::makeDirectory();
        $data['file'] = $this->file->store($directory);


        return $data;
    }
}
