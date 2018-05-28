<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use App\Http\Validators\NoteValidator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('user',['id'=>2,'name'=>'Abned','password'=>'fanabned1996']);
        Validator::extend('unique_note', function ($attribute, $value, $parameters, $validator) {
            return (new NoteValidator())->validate($attribute,$value,$parameters,$validator);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
