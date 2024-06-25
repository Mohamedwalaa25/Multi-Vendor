<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Intl\Countries;
use Symfony\Component\Intl\Languages;
use Symfony\Component\Intl\Locales;


class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        $countries = Countries::getNames('en');
        $local = Languages::getNames('en');
        return view('dashboard.profile.edit', compact('user', 'countries', 'local'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'birthdate' => ['nullable', 'date', 'before:today'],
            'gender' => ['in:male,female'],
            'country' => ['required', 'string', 'size:2'],

        ]);
        $user->profile->fill($request->all())->save();

        return redirect()->route('profile.edit')->with('success', 'Profile Updated !');
    }
}
