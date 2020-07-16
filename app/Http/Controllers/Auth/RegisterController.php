<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Country;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Utils\Uploader;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    protected $uploader;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Uploader $uploader)
    {

        $this->uploader = $uploader;
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email'                 => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'              => ['required', 'string', 'min:8', 'confirmed'],
            'type'                  => ['required'],
            'g-recaptcha-response'  => 'required | captcha',
            'profile.first_name'    => ['required'],
            'profile.last_name'     => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        DB::beginTransaction();

        try {
            $user = User::create([
                'name'      => $data['email'],
                'email'     => $data['email'],
                'password'  => Hash::make($data['password']),
                'type'      => $data['type'],
            ]);

            $profile        = $data['profile'];
            if (array_key_exists('profile', $data) && array_key_exists('image', $data['profile'])) {
                $profile['avatar'] = $this->uploader->uploadImage($data['profile']['image']);
            }

            $user->profile()->updateOrCreate([], $profile);

            if ($data['type'] == 'company') {
                $company             = $data['company'];

                if (array_key_exists('company', $data) && array_key_exists('logo', $data['company'])) {
                    $company['logo'] =  $this->uploader->uploadImage($data['company']['logo']);
                }

                $user->company()->updateOrCreate([], $company);
            }

            DB::commit();
            return $user;
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function showRegistrationForm()
    {
        $roles      = Role::select('*')->where('name', '!=', 'administrator')->get();
        $Country   = Country::select('id', 'name')->pluck('name', 'id');

        return view('auth.register', [
            'roles' => $roles,
            'countries' => $Country
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        event(new Registered($user));

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
            ? new Response('', 201)
            : redirect($this->redirectPath('/home'));
    }
}
