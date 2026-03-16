<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class AdminLogin extends Component
{
    // پێدڤییە ئەڤ متغیرە ل ڤێرێ بن دا کو د لاپەڕەی (Blade) دا دیار بن
    public $name = '';
    public $password = '';
    public $remember = false;

    // ڕێساێن پشکنینێ (Validation Rules)
    protected $rules = [
        'name' => 'required|min:3',
        'password' => 'required',
    ];

    // public function login()
    // {
    //     // ١. ئەنجامدانا پشکنینێ (Validation)
    //     $this->validate();

    //     // ٢. پاراستن ژ هاککەران (Rate Limiting)
    //     $throttleKey = Str::lower($this->name) . '|' . request()->ip();
    //     if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
    //         $seconds = RateLimiter::availableIn($throttleKey);
    //         $this->addError('name', "گەلەک جاران تە تاقی کر! هیڤییا $seconds چرکێن دی بکێ.");
    //         return;
    //     }

    //     // ٣. تاقیکرنا چوونەژوورێ د خشتەیێ Accounts دا ب ڕێکا Guard-ێ ئەدمینی
    //     if (Auth::guard('admin')->attempt(['name' => $this->name, 'password' => $this->password], $this->remember)) {
    //         session()->regenerate();
    //         RateLimiter::clear($throttleKey);
    //         return redirect()->route('admin.dashboard');
    //     }

    //     // ٤. ئەگەر خەتەلە بوو، "Hit"ەکێ ل فایەروۆڵی بدە
    //     RateLimiter::hit($throttleKey);
    //     $this->addError('name', 'ناڤ یان پاسۆردێ ئەدمینی خەتەلە.');
    // }


    public function login()
{
    $this->validate();

    // ١. گەڕیان ل دووڤ ئەکااونتی د خشتەیێ accounts دا ب ڕێکا ناڤی
    $account = \App\Models\Account::where('name', $this->name)->first();

    // ٢. پشکنینا پاسۆردی ب شێوەیەکێ سادە (وەک تە دڤێت)
    if ($account && $account->password === $this->password) {
        
        // ٣. ئەگەر درست بوو، ب شێوەیەکێ دەستی Login بکە د ناڤ Guard-ێ ئەدمینی دا
        auth()->guard('admin')->login($account, $this->remember);

        session()->regenerate();
        
        return redirect()->route('admin.dashboard');
    }

    // ٤. ئەگەر خەتەلە بوو
    $this->addError('name', 'ناڤ یان پاسۆردێ ئەدمینی خەتەلە.');
}

    public function render()
    {
        // دڵنیا ببە کو فایلی Blade ل ڤێرێ یە
        return view('livewire.auth.admin-login');
    }
}