<?php

namespace App\Imports;

use App\Models\Salida;
use App\Models\Producto;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SalidasImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    
    private $productos;
    // private $medidas;

    public function __construct()
    {
        $this->productos = Producto::pluck('id', 'nombre_pr');
        // $this->medidas = Medida::pluck('id', 'nombre_medida');
    }
    
    public function model(array $row)
    {
        return new Salida([
            'producto_id' => $this->productos[$row['producto']],
            'obs_salida' => $row['observacion'],
            'cant_salida' => $row['cantidad_salida'],
            'fecha_salida' => $row['fecha_aniomesdia'],
            'contador_salida' => 0,
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
