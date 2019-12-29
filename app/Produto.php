<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\ForeignKeyDefinition;
use Symfony\Component\Mime\Part\Multipart\RelatedPart;

class Produto extends Model
{
    protected $table = 'produtos';

    public function produtos()
    {
        return $this->hasOne(related, produtos::class, foreingkey, 'categoria_id', localkey, 'id');
    }

}
