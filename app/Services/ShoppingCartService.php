<?php

namespace App\Services;

use App\Repositories\ShoppingCartRepository;
use Illuminate\Http\Request;

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
