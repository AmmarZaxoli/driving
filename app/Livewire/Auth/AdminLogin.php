<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use App\Models\Account;
use Illuminate\Support\Facades\Hash;
class AdminLogin extends Component
{
    public $name = '';
    public $password = '';
    public $remember = false;

    protected $rules = [
        'name' => 'required',
        'password' => 'required',
    ];

    protected $messages = [
        'name.required' => 'تکایە ناڤ بنڤیسە.',
        'password.required' => 'تکایە وشەی نهێنی بنڤیسە.',
    ];

    public function login()
    {
        $this->validate();

        $throttleKey = Str::lower($this->name) . '|' . request()->ip();

        if (RateLimiter::tooManyAttempts($throttleKey, 5)) {

            $seconds = RateLimiter::availableIn($throttleKey);

            $this->addError('name', "گەلەک جاران تاقی کر! {$seconds} چرکە چاوەڕێ بکە.");

            return;
        }

        $account = Account::where('name', $this->name)->first();

        if (!$account || !Hash::check($this->password, $account->password)) {

            RateLimiter::hit($throttleKey);

            $this->addError('name', 'ناڤ یان وشەی نهێنی خەتەلە.');

            return;
        }

        Auth::guard('admin')->login($account, $this->remember);

        session()->regenerate();

        RateLimiter::clear($throttleKey);

        return redirect()->route('admin.dashboard');
    }

    public function render()
    {
        return view('livewire.auth.admin-login');
    }
}
