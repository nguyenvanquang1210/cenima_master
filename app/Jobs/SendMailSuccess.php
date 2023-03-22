<?php

namespace App\Jobs;

use App\Mail\SendMailMuaVe;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailSuccess implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $dataMail;

    public function __construct($dataMail)
    {
        $this->dataMail = $dataMail;
    }

    public function handle()
    {
        Mail::to($this->dataMail['email'])->send(new SendMailMuaVe($this->dataMail));
    }
}
