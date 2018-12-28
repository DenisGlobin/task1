<?php

namespace App\Http\Controllers;

use App\Http\Requests\PageRequest;
use App\Jobs\SaveUsersInfo;
use App\Order;
use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    private $userdata = array();

    /**
     * Record order's info in DB, using the Eloquent model
     *
     * @param array $data
     * @return mixed
     */
    private function saveOrder(array $data)
    {
        return Order::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'page_id' => $data['id'],
        ]);
    }

    /**
     * Get all pages
     *
     * @return mixed
     */
    private function getPages()
    {
        return Page::get();
    }

    public function index()
    {
        $data = [
            'pages' => $this->getPages(),
        ];
        return view('pages.index', $data);
    }

    /**
     * Save user's info and show the page
     * @param $id
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewPage($id, Request $request)
    {
        $page = Page::findOrFail($id);
        $data = [
            'name' => $page['name'],
            'id' => $page['id'],
        ];
        $this->userdata = [
            'user_agent' => $request->header('user-agent'),
            'ip' => $request->ip(),
            'referer' => $request->server('HTTP_REFERER'),
            'page_id' => $id,
        ];
        //save visiting user's info on Queue
        $this->dispatch(new SaveUsersInfo($this->userdata));

        return view('pages.page', $data);
    }

    /**
     * Call the saveOrder method and return to the main page
     *
     * @param PageRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function addOrder(PageRequest $request)
    {
        $order = $this->saveOrder($request->all());
        if(!($order instanceof Order)) {
            $request->session()->flash('error', __('page.error'));
            return back();
        }
        $data = [
            'pages' => $this->getPages(),
        ];
        $request->session()->flash('success', __('page.success'));
        return view('pages.index', $data);
    }
}
