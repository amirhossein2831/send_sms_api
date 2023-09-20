<?php

namespace App\Http\Resources\v1;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class SMSResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request): array|JsonSerializable|Arrayable
    {
        return [
            'id'=>$this->id,
            'number'=>$this->number,
            'text'=>$this->text,
            'sendDate'=>$this->created_at->format('Y-m-d H:i:s')
        ];
    }
}
