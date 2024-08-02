<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Console\Commands\SendEmailsCommand;
use App\Console\Commands\SendScheduledNotes;
use Illuminate\Support\Facades\Schedule;


Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::command(SendScheduledNotes::class)->timezone('Africa/Lagos')->dailyAt('12:00:00');