<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Utils\Uploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{

    protected $uploader;

    public function __construct(Uploader $uploader)
    {
        $this->uploader = $uploader;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'                  => 'required',
            'registration_number'   => 'required'
        ]);

        $data       = $request->all();
        $data['user_id']    = Auth::user()->id;
        if ($request->file('logo')) {
            $data['logo'] =  $this->uploader->uploadImage($request->file('logo'));
        }
        $company    = Company::create($data);

        if ($company) {
            return redirect()->route('manage.profile.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $company    = Company::findOrFail($id);


        $request->validate([
            'name'                  => 'required',
            'registration_number'   => 'required'
        ]);

        $data       = $request->all();
        if ($request->file('logo')) {
            $data['logo'] =  $this->uploader->uploadImage($request->file('logo'));
        }
        $company->update($data);

        if ($company) {
            return redirect()->route('manage.profile.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
