<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use App\Http\Requests\CompanyRequest;
use App\Models\User;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function create()
    {
        if (request()->user()->role->value !== Role::Admin->value) {
            abort(403, "Access denied");
        }

        return view('ad.company.create');
    }

    // public function store(CompanyRequest $request)
    // {
    //     // User::create($request->getData());
    //     dd($request->getData());
    //     // return redirect()->route('ads.index')->with('message', "Company has been successfully created!");
    // }
}
