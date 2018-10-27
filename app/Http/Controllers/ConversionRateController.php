<?php

namespace App\Http\Controllers;

use App\Page;
use App\Visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ConversionRateController extends Controller
{
    public function index()
    {
        $pages = Page::get();
        foreach ($pages as $page) {
            $page->today_cr = $this->getConversionRate($page, '=', Carbon::today());
            $page->yesterday_cr = $this->getConversionRate($page, '=', Carbon::yesterday());
            $page->week_cr = $this->getConversionRate($page, '>=', Carbon::today()->subWeek());
            $page->save();
        }
        $data = [
            'pages' => Page::get()
        ];
        return view('pages.cr', $data);
    }

    public function getConversionRate(Page $page, string $operator = '=', Carbon $date)
    {
        $visited = $page->visitor()->where('page_id', $page['id'])
                                   ->whereDate('created_at', $operator, $date)->count();
        $ordered = $page->order()->where('page_id', $page['id'])
                                 ->whereDate('created_at', $operator, $date)->count();
        if( $visited == 0){
            return 0;
        }
        return $ordered / $visited;
    }
}
