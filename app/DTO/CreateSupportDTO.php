<?php 

namespace App\DTO;
use App\Http\Requests\StoreUpdateSuppport;


class CreateSupportDTO
{
    public function __construct(
        public string $subject,
        public string $status,
        public string $body,

    )
    {}

    public static function makeFromRequest(StoreUpdateSuppport $request): self
    {
        return new self(
            $request->subject,
            'a',
            $request->body
        );
    }
}