<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pdf extends Model
{
    protected $guarded = ['id'];

    public function toArray()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'path' => $this->path
        ];
    }
}
