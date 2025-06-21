<?php

namespace App\Http\Controllers;

use App\Http\Requests\IncomeRequest;
use App\Http\Requests\OrderRequest;
use App\Http\Requests\SaleRequest;
use App\Http\Requests\StockRequest;
use App\Services\DataBaseService;
use Exception;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function __construct(
        private DataBaseService $saleService
    ){}

    public function sales(SaleRequest $request) {
        try {
            $data = $this->saleService->insert($request, 'Sale');
            return response()->json($data);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    public function incomes(IncomeRequest $request) {
        try {
            $data = $this->saleService->insert($request, 'Income');
            return response()->json($data);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    public function orders(OrderRequest $request) {
        try {
            $data = $this->saleService->insert($request, 'Order');
            return response()->json($data);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    public function stocks(StockRequest $request) {
        try {
            $data = $this->saleService->insert($request, 'Stock');
            return response()->json($data);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }
}
