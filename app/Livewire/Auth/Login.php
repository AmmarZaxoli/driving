<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\Coach;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class Login extends Component
{
    public $name = '';
    public $password = '';
    public $remember = false;

    protected $rules = [
        'name' => 'required',
        'password' => 'required',
    ];

    // public function login()
    // {
    //     $this->validate();

    //     $throttleKey = Str::lower($this->name) . '|' . request()->ip();

    //     if (RateLimiter::tooManyAttempts($throttleKey, 5)) {

    //         $seconds = RateLimiter::availableIn($throttleKey);

    //         $this->addError('name', "گەلەک تە تاقی کر! هیڤییا $seconds چرکێن دی بکێ.");

    //         return;
    //     }

    //     $coach = Coach::where('name', $this->name)->first();

    //     if ($coach && $coach->password === $this->password) {

    //         Auth::login($coach, $this->remember);

    //         session()->regenerate();

    //         RateLimiter::clear($throttleKey);

    //         return redirect()->route('indexdriver');
    //     }

    //     RateLimiter::hit($throttleKey);

    //     $this->addError('name', 'ناڤ یان پاسۆرد نەدروستن.');
    // }


    public function login()
    {
        $this->validate();

        $throttleKey = Str::lower($this->name) . '|' . request()->ip();

        if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
            $seconds = RateLimiter::availableIn($throttleKey);
            $this->addError('name', "گەلەک تە تاقی کر! هیڤییا $seconds چرکێن دی بکێ.");
            return;
        }

        // ل ڤێرێ گوهۆڕینێ بکە: بکارئینانا Guard-ێ تایبەت
        if (Auth::guard('coach')->attempt(['name' => $this->name, 'password' => $this->password], $this->remember)) {

            session()->regenerate();
            RateLimiter::clear($throttleKey);

            return redirect()->route('indexdriver');
        }

        RateLimiter::hit($throttleKey);
        $this->addError('name', 'ناڤ یان پاسۆرد نەدروستن.');
    }
    public function render()
    {
        return view('livewire.auth.login');
    }
}
