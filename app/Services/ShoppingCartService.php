<?php

namespace App\Services;

use App\Http\Requests\Api\UserLoginRequest;
use App\Models\Product;
use App\Models\ShoppingCart;
use App\Models\User;
use App\Repositories\ShoppingCartRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ShoppingCartService
{
    protected $shoppingCartRepository;

    /**
     * @param ShoppingCartRepository $shoppingCartRepository
     */
    public function __construct(ShoppingCartRepository $shoppingCartRepository)
    {
        $this->shoppingCartRepository = $shoppingCartRepository;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function addProductToCart(Request $request)
    {
        return $this->shoppingCartRepository->addProductToCart($request);
    }

    /**
     * @param Request $request
     */
    public function confirmCart(Request $request)
    {
        return $this->shoppingCartRepository->confirmCart($request);
    }
}
