<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exhibitor;
use App\User;
use App\Utils\Uploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExhibitorController extends Controller
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
        $exhibitors = Exhibitor::select('*')
            ->with('user:id,name,email')
            ->get();
        return view('admin.exhibitor.index', [
            'exhibitors' => $exhibitors
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.exhibitor.create');
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

            'first_name'    => 'required',
            'last_name'     => 'required',
            'name'          => 'required|string|max:255',
            'email'         => 'required|string|email|max:255|unique:users',
            'password'      => 'required|string|min:8|confirmed'
        ]);
        DB::beginTransaction();
        try{

            $data       = $request->except('password', 'role');
            $data['password']   = bcrypt($request->input('password'));
            $user = User::create($data);
            $user->assignRole('exhibitor');

            $data  = $request->all();

            if ($request->file('new_image')) {
                $data['logo'] = $this->uploader->uploadImage($request->file('new_image'));
            }

            $data['user_id'] = $user->id;
            Exhibitor::create($data);
            DB::commit();
            return redirect()->route('admin.exhibitor.index');
          

        }catch (\Exception $e) {
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
        $exhibitor = Exhibitor::findOrFail($id);
        return view('admin.exhibitor.edit', ['exhibitor' => $exhibitor]);
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

        $exhibitor = Exhibitor::findOrFail($id);
        $request->validate([
            'first_name'    => 'required',
            'last_name'     => 'required',
        ]);
        DB::beginTransaction();
        try{

            $data       = $request->all();

            if ($request->file('new_image')) {
                $data['logo'] = $this->uploader->uploadImage($request->file('new_image'));
            }

            $exhibitor->update($data);
            DB::commit();
            return redirect()->route('admin.exhibitor.index');
      
       }catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
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
        $exhibitor   = Exhibitor::findOrFail($id);
        DB::beginTransaction();
        try{
            $exhibitor->delete();
            DB::commit();
            return redirect()->route('admin.exhibitor.index');
        }catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
