<?php

namespace App\Jobs;

use App\Page;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CalculateConversionRate implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $pages;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->pages = Page::get();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->pages as $page) {
            $page->today_cr = $this->getConversionRate($page, '=', Carbon::today());
            $page->yesterday_cr = $this->getConversionRate($page, '=', Carbon::yesterday());
            $page->week_cr = $this->getConversionRate($page, '>=', Carbon::today()->subWeek());
            $page->save();
        }
    }

    /**
     * Get conversion rate
     *
     * @param Page $page
     * @param string $operator
     * @param Carbon $date
     * @return float|int
     */
    public function getConversionRate(Page $page, string $operator = '=', Carbon $date)
    {
        $visited = $page->visitor()->where('page_id', $page['id'])
            ->whereDate('created_at', $operator, $date)->count();
        $ordered = $page->order()->where('page_id', $page['id'])
            ->whereDate('created_at', $operator, $date)->count();
        if($visited == 0) {
            return 0;
        }
        return $ordered / $visited;
    }
}
