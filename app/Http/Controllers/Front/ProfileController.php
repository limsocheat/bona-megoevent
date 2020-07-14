<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Country;
use App\Utils\Uploader;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{

    protected $uploader;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Uploader $uploader)
    {
        $this->middleware('auth');
        $this->uploader = $uploader;
    }

    public function index()
    {
        $user = Auth::user();
        $Country = Country::select('id', 'name')->pluck('name', 'id');
        return view('front.manage.profile.index', ['user' => $user, 'countries' => $Country]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'profile.first_name'   => 'required',
            'profile.last_name'    => 'required',
        ]);

        DB::beginTransaction();
        try {

            $user       = Auth::user();
            $user->update([
                'type'  => $request->input('type'),
            ]);
            $profile    = $request->input('profile');

            if ($request->file('profile.image')) {
                $profile['avatar'] = $this->uploader->uploadImage($request->file('profile.image'));
            }

            $user->profile()->updateOrCreate([], $profile);
            DB::commit();
            return redirect()->route('manage.profile.index')->with('success', 'Profile Updated Succesfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
