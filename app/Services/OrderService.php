<?php

namespace App\Services;

use App\Http\Requests\Api\UserLoginRequest;
use App\Models\Order;
use App\Models\User;
use App\Repositories\OrderRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class OrderService
{
    protected $orderRepository;

    /**
     * @param OrderRepository $orderRepository
     */
    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function shipOrder(Request $request)
    {
        return $this->orderRepository->shipOrder($request);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function orderDetail(Request $request)
    {
        return $this->orderRepository->orderDetail($request);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function allOrders(Request $request)
    {
        return $this->orderRepository->allOrders($request);
    }

    public function updateOrder(Request $request)
    {
        return $this->orderRepository->updateOrder($request);
    }
}
