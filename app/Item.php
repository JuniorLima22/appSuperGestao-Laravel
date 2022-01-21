<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'produtos';
    
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id', 'fornecedor_id'];

    public function itemDetalhe()
    {
        // Model 'Item' que mapeia tabela 'produtos'
        // tem 1 (hasOne) mapeia a tabela 'produto_detalhes'
        // Relacionamento é: tabela 'produto_detalhes' fk 'produto_id' com pk 'id' da tabela 'produtos'
        return $this->hasOne('App\ItemDetalhe', 'produto_id', 'id');
    }

    public function fornecedor()
    {
        return $this->belongsTo('App\Fornecedor');
    }
    
}
