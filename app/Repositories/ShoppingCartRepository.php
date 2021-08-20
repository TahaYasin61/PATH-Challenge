<?php

namespace App\Repositories;

use App\Http\Requests\Api\UserLoginRequest;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\ShoppingCart;
use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ShoppingCartRepository
{
    protected $shoppingCart;
    protected $user;
    protected $product;
    protected $order;
    protected $userAddress;
    protected $orderProduct;

    /**
     * @param ShoppingCart $shoppingCart
     * @param User $user
     * @param Product $product
     * @param Order $order
     * @param UserAddress $userAddress
     * @param OrderProduct $orderProduct
     */
    public function __construct(ShoppingCart $shoppingCart,
                                User         $user,
                                Product      $product,
                                Order        $order,
                                UserAddress  $userAddress,
                                OrderProduct $orderProduct)
    {
        $this->shoppingCart = $shoppingCart;
        $this->user = $user;
        $this->product = $product;
        $this->order = $order;
        $this->userAddress = $userAddress;
        $this->orderProduct = $orderProduct;
    }


    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function addProductToCart(Request $request) // adding products to the shopping cart
    {
        $user = $this->user->where('token', $request->header('token'))->first();
        $product = $this->product->where('id', $request->product_id)->first();

        if ($user) {
            if ($product) {
                $this->shoppingCart->create([
                    'user_id' => $user->id,
                    'product_id' => $request->product_id,
                    'quantity' => $request->quantity,
                    'product_price' => $product->product_price,
                    'total_price' => $product->product_price * $request->quantity
                ]);
                $responseData['status'] = 1;
                $responseData['product'] = $product;
                $responseData['user'] = $user;
                $responseData['message'] = 'Product added to cart';
                return response()->json($responseData, 200, [], JSON_UNESCAPED_UNICODE);
            } else {
                $responseData['status'] = 0;
                $responseData['message'] = 'An error occurred while adding the product to the cart';
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
    public function confirmCart(Request $request) // confirming the shopping cart and creating an order
    {
        $user = $this->user->where('token', $request->header('token'))->first();

        if ($user) {
            $userAddress = $this->userAddress->where('user_id', $user->id)->first();
            $products = $this->shoppingCart->where('user_id', $user->id)->get();
            $order = $this->order->create([
                'order_code' => rand(1000000000, 9999999999),
                'user_id' => $user->id,
                'user_address' => $userAddress->address_info
            ]);
            foreach ($products as $product) {
                $this->orderProduct->create([
                    'order_id' => $order->id,
                    'user_id' => $product->user_id,
                    'product_id' => $product->product_id,
                    'quantity' => $product->quantity
                ]);
            }
            $responseData['status'] = 1;
            $responseData['order'] = $order;
            $responseData['products'] = $products;
            $responseData['user'] = $user;
            $responseData['message'] = 'Cart confirmed and order created';
            return response()->json($responseData, 200, [], JSON_UNESCAPED_UNICODE);
        } else {
            $responseData['status'] = 0;
            $responseData['message'] = 'An error occurred while creating order';
            return response()->json($responseData, 200, [], JSON_UNESCAPED_UNICODE);
        }
    }
}
