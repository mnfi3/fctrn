<?php

namespace App\Helper\SmsIr\Responses;

class VerificationCodeResponse extends BaseResponse
{
    /**
     * @var string
     */
    public $verificationCodeId;

    public function __construct(bool $isSuccessful, string $message, string $verificationCodeId)
    {
        $this->isSuccessful = $isSuccessful;
        $this->message = $message;
        $this->verificationCodeId = $verificationCodeId;
    }
}
