<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BoothType;
use App\Utils\Uploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BoothTypeController extends Controller
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
        $booth_types  = BoothType::select('*')->get();
        return view('admin.booth_type.index', [
            'booth_types'    => $booth_types
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.booth_type.create');
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
            'name' => 'required|string|max:255'
        ]);

        DB::beginTransaction();
        try{
            $data         = $request->all();

            if ($request->file('new_image')) {
                $data['image'] =$this->uploader->uploadImage($request->file('new_image'));
            }

            BoothType::create($data);

            DB::commit();
            return redirect()->route('admin.booth_type.index');
        
        }catch(\Exception $e){
             DB::rollBack();
             return redirect()->back()->with('error', $e->getMessage());
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
        $booth_type  = BoothType::findOrFail($id);
        return view('admin.booth_type.edit', [
            'booth_type' => $booth_type
        ]);
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
        
        $booth_type   = BoothType::findOrFail($id);

        $request->validate([
            'name'  => 'required',

        ]);
        DB::beginTransaction();
        try{
            $data       = $request->all();
            
            if ($request->file('new_image')) {
                $data['image'] =$this->uploader->uploadImage($request->file('new_image'));
            }
            $booth_type->update($data);

            DB::commit();
            return redirect()->route('admin.booth_type.index');
            
        }catch (\Exception $e){
                DB::rollBack();
                return redirect()->back()->with('error',$e->getMessage());

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
        $booth_type   = BoothType::findOrFail($id);
        DB::beginTransaction();
        try{
            $booth_type->delete();
            DB::commit();
            return redirect()->route('admin.booth_type.index');
           
        }catch(\Exception $e){
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
        
    }
}
