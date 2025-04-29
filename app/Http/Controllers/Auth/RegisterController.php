<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Referral;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'referral' => ['nullable', 'string', 'exists:users,referral_code'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // Generate a unique referral code
        $referralCode = Str::upper(Str::random(8));
       // $referralUrl = url('/register') . '?referral=' . $referralCode;

        

        
        // Check if referral code is valid and get referrer
        $referrer = isset($data['referral']) 
            ? User::where('referral_code', $data['referral'])->first()
            : null;

        // Create the user
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'referral_code' => $referralCode,
            'referred_by' => $referrer ? $referrer->id : null,
        ]);
        //dd($user->referral_url);

        // Create referral record if applicable
        if ($referrer) {
            Referral::create([
                'referrer_id' => $referrer->id,
                'referee_id' => $user->id,
                'status' => 'success',
                'reward_status' => 'paid'
            ]);

            // Increment referrer's count
            $referrer->increment('referral_count');
        }
        return $user;
    }
}