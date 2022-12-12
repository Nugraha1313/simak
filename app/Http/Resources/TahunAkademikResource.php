<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TahunAkademikResource extends JsonResource
{
    //member1 variabel
    public $status;
    public $message;

    //member2 konstruktor
    public function __construct($status,$message,$resource)
    {
        parent::__construct($resource);
        $this->status = $status;
        $this->message = $message;
    }

    //member3 fungsi2
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return[
            'success'=>$this->status,
            'message'=>$this->message,
            'data'=>$this->resource
        ];
    }
}