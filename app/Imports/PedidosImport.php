<?php

namespace App\Imports;

use App\Models\Pedido;
use App\Models\Medida;
use App\Models\Producto;
use App\Models\Semana;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PedidosImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    private $productos;
    private $medidas;
    private $semanas;

    public function __construct()
    {
        $this->productos = Producto::pluck('id', 'nombre_pr');
        $this->medidas = Medida::pluck('id', 'nombre_medida');
        $this->semanas = Semana::pluck('id', 'nombre_semana');
    }
    public function model(array $row)
    {
        return new Pedido([
            'producto_id' => $this->productos[$row['producto']],
            'medida_id' => $this->medidas[$row['medida']],
            'semana_id' => $this->semanas[$row['semana']],
            'primera_entrega' => $row['primera_entrega'],
            'segunda_entrega' => $row['segunda_entrega'],
            'total_entrega' => $row['total_entrega']
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
