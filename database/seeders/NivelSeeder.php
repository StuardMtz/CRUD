<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class NivelSeeder extends Seeder{
    public function run(): void{
        //Array
        $nivels = ['Primero','Segundo','Tercero','Cuarto','Quinto','Sexto'];
        //Recorrer array
        foreach($nivels as $nivel){
            //inserta datos
            DB::table('nivels')->insert(['nombre' => $nivel]);
        }
    }
}
