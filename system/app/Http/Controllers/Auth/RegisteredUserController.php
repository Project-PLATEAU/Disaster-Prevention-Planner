<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

use App\Models\AddressList;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $addressList = AddressList::all();
        return view('auth.register', ['addressList' => $addressList]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'address1'  => ['required', 'string', 'max:255'],
            'address2'  => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password'  => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $addressList = AddressList::all();
        $address = array();
        foreach ($addressList as $item) {
            $address[$item->id] = $item->name;
        }

        $userId = (String) Str::uuid();

        $user = User::create([
            'user_id'       => $userId,
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
            'role'          => 'member',
            'address'       => $address[$request->address1] . $request->address2,
            'area_list_id'  => 2
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('resident.index.initial'));
    }
}
