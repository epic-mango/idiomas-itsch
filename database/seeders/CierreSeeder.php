<?php

namespace Database\Seeders;

use App\Models\Cierre;
use Illuminate\Database\Seeder;

class CierreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cierre = new Cierre;

        $cierre->parcial = -1;
        $cierre->estado = true;

        $cierre->save();

    }
}
