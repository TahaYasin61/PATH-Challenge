<?php

namespace App\Repositories;

use App\Http\Requests\Api\UserLoginRequest;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class OrderRepository
{
    protected $order;
    protected $user;
    protected $orderProduct;

    /**
     * @param Order $order
     * @param User $user
     * @param OrderProduct $orderProduct
     */
    public function __construct(Order $order, User $user, OrderProduct $orderProduct)
    {
        $this->order = $order;
        $this->user = $user;
        $this->orderProduct = $orderProduct;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function shipOrder(Request $request) // updating the order with shipping date
    {
        $order = $this->order->where('id', $request->order_id)->first();
        if ($order) {
            $orderProducts = $this->orderProduct->where('order_id', $order->id)->get();
            $shippedOrder = $order->update([
                'shipping_date' => Carbon::today()
            ]);
            $responseData['status'] = 1;
            $responseData['order'] = $shippedOrder;
            $responseData['order-products'] = $orderProducts;
            $responseData['message'] = 'Order shipped';
            return response()->json($responseData, 200, [], JSON_UNESCAPED_UNICODE);
        } else {
            $responseData['status'] = 0;
            $responseData['message'] = 'An error occurred while shipping order';
            return response()->json($responseData, 200, [], JSON_UNESCAPED_UNICODE);
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function orderDetail(Request $request) // show detail of an order with given id
    {
        $user = $this->user->where('token', $request->header('token'))->first();


        if ($user) {
            $order = $this->order->where('user_id', $user->id)->where('id', $request->order_id)->first();
            if ($order) {
                $orderProducts = $this->orderProduct->where('order_id', $order->id)->get();
                $responseData['status'] = 1;
                $responseData['order'] = $order;
                $responseData['order-products'] = $orderProducts;
                return response()->json($responseData, 200, [], JSON_UNESCAPED_UNICODE);
            } else {
                $responseData['status'] = 0;
                $responseData['message'] = 'Order not found';
                return response()->json($responseData, 200, [], JSON_UNESCAPED_UNICODE);
            }
        } else {
            $responseData['status'] = 2;
            $responseData['message'] = 'User not found';
            return response()->json($responseData, 200, [], JSON_UNESCAPED_UNICODE);
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function allOrders(Request $request) // showing all orders that belongs to the user
    {
        $user = $this->user->where('token', $request->header('token'))->first();

        if ($user) {
            $orders = $this->order->where('user_id', $user->id)->with('orderProducts')->get();
            if ($orders->count() > 0) {
                $responseData['status'] = 1;
                $responseData['user'] = $user;
                $responseData['orders'] = $orders;
                return response()->json($responseData, 200, [], JSON_UNESCAPED_UNICODE);
            } else {
                $responseData['status'] = 0;
                $responseData['user'] = $user;
                $responseData['message'] = 'No order was found';
                return response()->json($responseData, 200, [], JSON_UNESCAPED_UNICODE);
            }
        } else {
            $responseData['status'] = 2;
            $responseData['message'] = 'User not found';
            return response()->json($responseData, 200, [], JSON_UNESCAPED_UNICODE);
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function updateOrder(Request $request) // updating the product in the order with given id
    {
        $user = $this->user->where('token', $request->header('token'))->first();
        $order = $this->order->where('user_id', $user->id)->where('id', $request->order_id)->first();

        if ($order && $order->shipping_date == null && $user) {
            $orderProduct = $this->orderProduct->where('id', $request->order_product_id)->where('order_id', $order->id)->first();
            if ($orderProduct) {
                $orderProduct->update([
                    'product_id' => $request->product_id ?: $orderProduct->product_id,
                    'quantity' => $request->quantity ?: $orderProduct->quantity
                ]);
                $responseData['status'] = 1;
                $responseData['order-product'] = $orderProduct;
                $responseData['message'] = 'Order product updated';
                return response()->json($responseData, 200, [], JSON_UNESCAPED_UNICODE);
            } else {
                $responseData['status'] = 0;
                $responseData['message'] = 'Order product not found';
                return response()->json($responseData, 200, [], JSON_UNESCAPED_UNICODE);
            }
        } else {
            $responseData['status'] = 2;
            $responseData['message'] = 'Order not found';
            return response()->json($responseData, 200, [], JSON_UNESCAPED_UNICODE);
        }
    }


}
