<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Policies\NotePolicy;
use App\Models\Note;   

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }

    protected $policies=[
        Note::class => NotePolicy::class
    ];
}
