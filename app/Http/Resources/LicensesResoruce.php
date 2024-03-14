<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LicensesResoruce extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'lic' => $this->lic,
            'client' => $this->client,
            'state' => $this->state
        ];
    }
}
