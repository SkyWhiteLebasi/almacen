<?php

namespace App\Imports;

use App\Models\Categoria;
use App\Models\Medida;
use App\Models\Producto;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading
{
    private $categorias;
    private $medidas;

    public function __construct()
    {
        $this->categorias = Categoria::pluck('id', 'nombre_categoria');
        $this->medidas = Medida::pluck('id', 'nombre_medida');
    }
    
    public function model(array $row)
    {
        // $productin = Producto::find($row['nombre_producto']);
        // $productin->stock = $productin->stock + $row['stock'];
        // $productin->save(); arriba las validaciones
        return new Producto([
            'foto' => $row['foto'],
            'num_orden' => $row['numero_de_orden'],
            'nombre_pr' => $row['nombre_producto'],
            'desc_pr' => $row['observacion'],
            'stock' => $row['stock'],
            'inicial' => $row['stock'],
            'medida_id' => $this->medidas[$row['medida']],
            'categoria_id' => $this->categorias[$row['categoria']]
        ]);
    }
    public function batchSize(): int
    {
        return 4000;
    }
    public function chunkSize(): int
    {
        return 4000;
    }
}
