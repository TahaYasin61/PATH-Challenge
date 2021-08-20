<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ShoppingCartService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    protected $shoppingCartService;

    /**
     * @param ShoppingCartService $shoppingCartService
     */
    public function __construct(ShoppingCartService $shoppingCartService)
    {
        $this->shoppingCartService = $shoppingCartService;
    }

    /** @OA\Post(
     *     path="/api/add-to-cart",
     *     tags={"Shopping Cart"},
     *     summary="Add To Shopping Cart Action",
     *     description="Adding product to the shopping cart",
     *     @OA\Parameter(
     *          name="token",
     *          description="User Token",
     *          required=true,
     *          in="header"
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
     *          description="Product added to the shopping cart successfully",
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
    public function addProductToCart(Request $request)
    {
        $addToCart = $this->shoppingCartService->addProductToCart($request);

        return response()->json($addToCart, 200, [], JSON_UNESCAPED_UNICODE);
    }

    /** @OA\Post(
     *     path="/api/confirm-cart",
     *     tags={"Shopping Cart"},
     *     summary="Confirm Shopping Cart Action",
     *     description="Confirming shopping cart products",
     *     @OA\Parameter(
     *          name="token",
     *          description="User Token",
     *          required=true,
     *          in="header"
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Shopping cart is confirmed successfully",
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
    public function confirmCart(Request $request)
    {
        $confirmBasket = $this->shoppingCartService->confirmCart($request);

        return response()->json($confirmBasket,200,[],JSON_UNESCAPED_UNICODE);
    }
}
