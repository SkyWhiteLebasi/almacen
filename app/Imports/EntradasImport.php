<?php

namespace App\Imports;

use App\Models\Entrada;
use App\Models\Producto;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EntradasImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading
{
    private $productos;
    // private $medidas;

    public function __construct()
    {
        $this->productos = Producto::pluck('id', 'nombre_pr');


    }
    public function model(array $row)
    {
        $stock = Producto::find($this->productos[$row['producto']]);
        $stock->stock = $stock->stock + $row['cantidad'];
        $stock->save();
        return new Entrada([
            'producto_id' => $this->productos[$row['producto']],
            'cant_entrada_val' => $row['cantidad'],
            'fecha_entrada' => $row['fecha'],
            'obs_entrada' => $row['observacion'],
 
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
