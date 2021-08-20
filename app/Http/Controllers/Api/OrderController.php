<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\OrderService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderService;

    /**
     * @param OrderService $orderService
     */
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    /** @OA\Post(
     *     path="/api/ship-order",
     *     tags={"Order"},
     *     summary="Ship Order Action",
     *     description="Completing order and getting shipping date",
     *     @OA\Parameter(
     *          name="token",
     *          description="User Token",
     *          required=true,
     *          in="header"
     *     ),
     *     @OA\Parameter(
     *          name="order_id",
     *          description="Order ID",
     *          required=true,
     *          @OA\Schema(
     *         type="string",
     *       ),
     *          in="query"
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Order shipped successfully",
     *          @OA\Schema(
     *              type="object",
     *              @OA\Property(
     *                  property="token",
     *                  type="string"
     *             )
     *          )
     *     ),
     *     @OA\Response(
     *          response=401,
     *          description="Unauthorized"
     *     )
     * )
     */

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function shipOrder(Request $request)
    {
        $completeOrder = $this->orderService->shipOrder($request);

        return response()->json($completeOrder,200,[],JSON_UNESCAPED_UNICODE);
    }

    /** @OA\Post(
     *     path="/api/order-detail",
     *     tags={"Order"},
     *     summary="Order Detail Action",
     *     description="Showing the detail of an order with the given id",
     *     @OA\Parameter(
     *          name="token",
     *          description="User Token",
     *          required=true,
     *          in="header"
     *     ),
     *     @OA\Parameter(
     *          name="order_id",
     *          description="Order ID",
     *          required=true,
     *          @OA\Schema(
     *         type="string",
     *       ),
     *          in="query"
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Order detail is displayed successfully",
     *          @OA\Schema(
     *              type="object",
     *              @OA\Property(
     *                  property="token",
     *                  type="string"
     *             )
     *          )
     *     ),
     *     @OA\Response(
     *          response=401,
     *          description="Unauthorized"
     *     )
     * )
     */

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function orderDetail(Request $request)
    {
        $orderDetail = $this->orderService->orderDetail($request);

        return response()->json($orderDetail,200,[],JSON_UNESCAPED_UNICODE);
    }

    /** @OA\Get(
     *     path="/api/all-orders",
     *     tags={"Order"},
     *     summary="All User Orders",
     *     description="All orders that belongs to the specified user",
     *     @OA\Parameter(
     *          name="token",
     *          description="User Token",
     *          required=true,
     *          in="header"
     *     ),
     *     @OA\Response(
     *          response=401,
     *          description="Unauthorized"
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="All user orders displayed successfully",
     *          @OA\JsonContent(
     *               type="object",
     *               @OA\Property (
     *                   property="id",
     *                   type="integer"
     *              ),
     *               @OA\Property(
     *                   property="order_code",
     *                   type="string"
     *              ),
     *               @OA\Property(
     *                   property="user_id",
     *                   type="integer"
     *              ),
     *               @OA\Property(
     *                   property="user_address",
     *                   type="string"
     *              ),
     *               @OA\Property(
     *                   property="shipping_date",
     *                   type="string",
     *                   format="date"
     *              )
     *     )
     * )
     * )
     */

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function allOrders(Request $request)
    {
        $allOrders = $this->orderService->allOrders($request);

        return response()->json($allOrders,200,[],JSON_UNESCAPED_UNICODE);
    }

    /** @OA\Post(
     *     path="/api/update-order",
     *     tags={"Order"},
     *     summary="Update Order Action",
     *     description="Updating the product of the order that has not been shipped",
     *     @OA\Parameter(
     *          name="token",
     *          description="User Token",
     *          required=true,
     *          in="header"
     *     ),
     *     @OA\Parameter(
     *          name="order_id",
     *          description="Order ID",
     *          required=true,
     *          @OA\Schema(
     *         type="string",
     *       ),
     *          in="query"
     *     ),
     *     @OA\Parameter(
     *          name="order_product_id",
     *          description="Order Product ID",
     *          required=true,
     *          @OA\Schema(
     *         type="string",
     *       ),
     *          in="query"
     *     ),
     *     @OA\Parameter(
     *          name="product_id",
     *          description="Product ID",
     *          required=true,
     *          @OA\Schema(
     *         type="string",
     *       ),
     *          in="query"
     *     ),
     *     @OA\Parameter(
     *          name="quantity",
     *          description="Product Quantity",
     *          required=true,
     *          @OA\Schema(
     *         type="string",
     *       ),
     *          in="query"
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Order product is updated successfully",
     *          @OA\Schema(
     *              type="object",
     *              @OA\Property(
     *                  property="token",
     *                  type="string"
     *             )
     *          )
     *     ),
     *     @OA\Response(
     *          response=401,
     *          description="Unauthorized"
     *     )
     * )
     */

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function updateOrder(Request $request)
    {
        $updateOrder = $this->orderService->updateOrder($request);

        return response()->json($updateOrder,200,[],JSON_UNESCAPED_UNICODE);
    }
}
