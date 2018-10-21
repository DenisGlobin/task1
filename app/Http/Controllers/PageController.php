<?php

namespace App\Http\Controllers;

use App\Order;
use App\Page;
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
    public function viewPage($id)
    {
        $page = Page::find($id);
        $data = [
            'title' => 'Форма для заказа',
            'name' => $page['name'],
            'id' => $page['id'],
        ];
        return view('pages.page', $data);
    }
    public function addOrder(Request $request)
    {
        $order = $this->createOrderObject($request->all());
        //dd($order);
        if(!($order instanceof Order)){
            return back()->with('error', "Can't record your order");
        }
        return view('pages.index')->with('success', "Your order was added");
    }
    private function createOrderObject(array $data)
    {
        return Order::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'page_id' => $data['id'],
        ]);
    }
}
