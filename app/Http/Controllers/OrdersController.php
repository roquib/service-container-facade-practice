<?php

namespace App\Http\Controllers;

use App\Contracts\OrderRepositoryInterface;

class OrdersController extends Controller
{
    protected $order;

    public function __construct(OrderRepositoryInterface $order)
    {
        $this->order = $order;
    }

    public function index()
    {
        return $this->order->getAll();
    }
}
