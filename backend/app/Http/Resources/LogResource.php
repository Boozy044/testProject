<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'ip' => $this->ip,
            'date' => $this->date,
            'datetime' => $this->datetime,
            'URL' => $this->URL,
            'useragent' => $this->useragent,
            'os' => $this->os,
            'architec' => $this->architec,
            'browser' => $this->browser,
        ];
    }
}
