<?php

namespace App\Http\Controllers;

use App\Order;
use App\Page;
use App\Visitor;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $data = [
            'pages' => Page::get(),
        ];
        return view('pages.index', $data);
    }

    public function viewPage($id, Request $request)
    {
        $page = Page::findOrFail($id);
        /*$page = Page::find($id);
        if($page == null){
            return view('pages.index', ['pages' => Page::get()]);
        }*/
        $data = [
            'title' => 'Форма для заказа',
            'name' => $page['name'],
            'id' => $page['id'],
        ];

        $userdata = [
            'user_agent' => $request->header('user-agent'),
            'ip' => $request->ip(),
            'referer' => $request->server('HTTP_REFERER'),
            'page_id' => $id,
        ];
        $this->saveVisitor($userdata);

        return view('pages.page', $data);
    }

    public function addOrder(Request $request)
    {
        $order = $this->saveOrder($request->all());
        if(!($order instanceof Order)){
            return back()->with('error', "Can't record your order");
        }
        $data = [
            'pages' => Page::get(),
        ];
        return view('pages.index', $data)->with('success', "Your order was added");
    }

    private function saveOrder(array $data)
    {
        return Order::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'page_id' => $data['id'],
        ]);
    }

    private function saveVisitor(array $data)
    {
        return Visitor::create([
            'user_agent' => $data['user_agent'],
            'ip' => $data['ip'],
            'http_referer' => $data['referer'],
            'page_id' => $data['page_id'],
        ]);
    }
}
