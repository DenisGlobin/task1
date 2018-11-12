<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Visitor;

class SaveUsersInfo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data = array();
    /**
     * Create a new job instance.
     *
     * @param array $userdata
     * @return void
     */
    public function __construct(array $userdata)
    {
        $this->data = $userdata;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Visitor::create([
            'user_agent' => $this->data['user_agent'],
            'ip' => $this->data['ip'],
            'http_referer' => $this->data['referer'],
            'page_id' => $this->data['page_id'],
        ]);
    }
}
