<?php

namespace App\Http\Controllers;

use App\Page;
use App\Visitor;
use Illuminate\Http\Request;

class ConversionRateController extends Controller
{
    public function index()
    {
        $pages = Page::get();
        foreach ($pages as $page) {
            $visited = $page->visitor()->where('page_id', $page['id'])->get();
            //dd($visited);
        }

        $data = [
            'pages' => Page::get(),
        ];
        return view('pages.cr', $data);
    }
}
