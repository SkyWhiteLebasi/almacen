<?php

namespace App\Imports;

use App\Models\Salida;
use App\Models\Producto;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class Salidas2Import implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading
{
    private $productos;
    // private $medidas;

    public function __construct()
    {
        $this->productos = Producto::pluck('id', 'nombre_pr');
        // $this->medidas = Medida::pluck('id', 'nombre_medida');
    }

    public function model(array $row)
    {
        $stock = Producto::find($this->productos[$row['producto']]);
        $stock->stock = $stock->stock - $row['cantidad_salida'];
        $stock->save();
        return new Salida([
            'producto_id' => $this->productos[$row['producto']],
            'obs_salida' => $row['observacion'],
            'cant_salida_val' => $row['cantidad_salida'],
            'fecha_salida' => $row['fecha_aniomesdia'],
            'contador_salida' => 1,
        ]);
    }
    public function batchSize(): int
    {
        return 1000;
    }
    public function chunkSize(): int
    {
        return 1000;
    }
}
