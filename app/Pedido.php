<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = ['cliente_id'];

    public function produtos()
    {
        // return $this->belongsToMany('App\Produto', 'pedido_produtos', 'pedido_id', 'produto_id');

        /**
         * 1º @param - Modelo do relacionamento NxN em relação o Modelo que estamos implementando
         * 2º @param - É a tabela auxiliar que armazena os registros de relacionamento
         * 3º @param - Representa o nome da FK da tabela mapeada pelo modelo na tabela de relacionamentos
         * 4º @param - Representa o nome da FK da tabela mapeada pelo modelo utilizado no relacionamento que estamos implementando
         **/        
        return $this->belongsToMany('App\Item', 'pedido_produtos', 'pedido_id', 'produto_id')->withPivot('id', 'quantidade', 'created_at');
    }
}
