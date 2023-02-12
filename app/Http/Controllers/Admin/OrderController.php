<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends MY_Controller
{
    public $table = 'orders';

    public function index()
    {
    }
    public function orders()
    {
        $data['orders'] =  $this->_getAll($this->table);
        return view('admin.orders.order', $data);
    }

    public function create_order()
    {
        $this->table;
    }
}
