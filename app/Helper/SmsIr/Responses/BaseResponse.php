<?php

declare(strict_types=1);

namespace App\Helper\SmsIr\Responses;

class BaseResponse
{
    /**
     * @var bool
     */
    public $isSuccessful;
    /**
     * @var string
     */
    public $message;
}
