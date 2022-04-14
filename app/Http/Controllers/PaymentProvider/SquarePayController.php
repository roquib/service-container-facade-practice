<?php

namespace App\Http\Controllers\PaymentProvider;

use App\Http\Controllers\Controller;
use App\Interfaces\PaymentInterface;
use Illuminate\Http\Request;

class SquarePayController extends Controller
{
    private $paymentService;

    public function __construct(PaymentInterface $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function index()
    {
        return response()->json([
            'data' => $this->paymentService->pay(5.0),
        ]);
    }
}
