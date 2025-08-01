<?php

if (!function_exists('apiResponse')) {
    function apiResponse($data = null, string $message = 'Success', bool $status = true, int $code = 200)
    {
        // Jika data berupa Paginator (LengthAwarePaginator atau Paginator)
        if ($data instanceof \Illuminate\Pagination\AbstractPaginator) {
            return response()->json([
                'status' => $status,
                'message' => $message,
                'data' => $data->items(), // hanya data dari pagination
                'pagination' => [
                    'current_page' => $data->currentPage(),
                    'per_page'     => $data->perPage(),
                    'total'        => $data->total(),
                    'last_page'    => $data->lastPage(),
                    'next_page_url' => $data->nextPageUrl(),
                    'prev_page_url' => $data->previousPageUrl(),
                ],
            ], $code);
        }

        // Jika bukan pagination, response standar
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ], $code);
    }
}
