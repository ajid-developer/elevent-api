<?php

return [
    'successfully' => ['rc' => '0200', 'message' => 'Successfully', 'data' => null],
    'create_successfully' => ['rc' => '0201', 'message' => 'Create successfully', 'data' => null],
    'invalid_data' => ['rc' => '0400', 'message' => 'The given data was invalid', 'data' => null],
    'exceed_the_limit' => ['rc' => '0140', 'message' => 'Exceed the limit', 'data' => null],
    'product_out_of_stock' => ['rc' => '0240', 'message' => 'Product out of stock', 'data' => null],
    'stock_opname_is_confirmed' => ['rc' => '0440', 'message' => 'Stock opname has been confirmed', 'data' => null],
    'unauthenticated' => ['rc' => '0401', 'message' => 'Unauthenticated', 'data' => null],
    'incorrect_credential' => ['rc' => '0141', 'message' => 'The provided credentials are incorrect', 'data' => null],
    'forbidden' => ['rc' => '0403', 'message' => 'You are not authorized to access this resource', 'data' => null],
    'forbidden_login' => ['rc' => '0143', 'message' => 'You are logged in', 'data' => null],
    'forbidden_device' => ['rc' => '0243', 'message' => 'You cannot log in to this device', 'data' => null],
    'record_not_found' => ['rc' => '0404', 'message' => 'Record not found', 'data' => null],
    'url_not_reachable' => ['rc' => '0144', 'message' => 'URL not reachable', 'data' => null],
    'method_not_allowed' => ['rc' => '0405', 'message' => 'Method not allowed', 'data' => null],
    'too_many_request' => ['rc' => '0429', 'message' => 'Too many request', 'data' => null],
    'internal_server_error' => ['rc' => '0500', 'message' => 'Internal server error', 'data' => null],
    'failed_latest_inv_accurate' => ['rc' => '0150', 'message' => 'Failed to get the latest accurate invoice number', 'data' => null],
    'duplicate_purchase_inv' => ['rc' => '0250', 'message' => 'Purchase invoice is exist', 'data' => null],
    'duplicate_sale_return' => ['rc' => '0350', 'message' => 'Sale return is exist', 'data' => null],
    'purchase_gt_sale_price' => ['rc' => '0450', 'message' => 'Capital price is greater than the selling price', 'data' => null],
];
