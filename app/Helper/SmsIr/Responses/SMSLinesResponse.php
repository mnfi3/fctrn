<?php

declare(strict_types=1);

namespace App\Helper\SmsIr\Responses;

class SMSLinesResponse extends BaseResponse
{
    /**
     * @var SMSLine[]
     */
    public $SMSLines;

    public function __construct(bool $isSuccessful, string $message, array $SMSLines)
    {
        $this->isSuccessful = $isSuccessful;
        $this->message = $message;
        $this->SMSLines = $SMSLines;
    }
}
