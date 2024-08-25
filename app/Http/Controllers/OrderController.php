<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class OrderController extends Controller
{
    /**
     * @param int $id
     * @return JsonResponse
     */
    public function detail(int $id): JsonResponse
    {
        $order = Order::find($id);
        if (!($order instanceof Order)) {
            return response()->json(status: 404);
        }

        return response()->json([
            'order' => $order,
        ]);
    }
}
