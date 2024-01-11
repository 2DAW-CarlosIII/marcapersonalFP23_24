<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FamiliasProfesionalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('familias_profesionales')->truncate();
        foreach (self::$familias_profesionales as $familia) {
            DB::table('familias_profesionales')->insert([
                'codigo' => $familia['codigo'],
                'nombre' => $familia['nombre'],
            ]);
        }
        $this->command->info('¡Tabla familias_profesionales inicializada con datos!');
    }

/* `marcapersonalfp`.`familias_profesionales` */
public static $familias_profesionales = array(
  array('codigo' => 'ADG','nombre' => 'ACTIVIDADES FÍSICAS Y DEPORTIVAS'),
  array('codigo' => 'AFD','nombre' => 'ADMINISTRACIÓN Y GESTIÓN'),
  array('codigo' => 'AGA','nombre' => 'AGRARIA'),
  array('codigo' => 'ARA','nombre' => 'ARTES Y ARTESANÍAS'),
  array('codigo' => 'ARG','nombre' => 'ARTES GRÁFICAS'),
  array('codigo' => 'COM','nombre' => 'COMERCIO Y MARKETING'),
  array('codigo' => 'ELE','nombre' => 'ELECTRICIDAD Y ELECTRÓNICA'),
  array('codigo' => 'ENA','nombre' => 'ENERGÍA Y AGUA'),
  array('codigo' => 'EOC','nombre' => 'EDIFICACIÓN Y OBRA CIVIL'),
  array('codigo' => 'FME','nombre' => 'FABRICACIÓN MECÁNICA'),
  array('codigo' => 'HOT','nombre' => 'HOSTELERÍA Y TURISMO'),
  array('codigo' => 'IEX','nombre' => 'INDUSTRIAS EXTRACTIVAS'),
  array('codigo' => 'IFC','nombre' => 'INFORMÁTICA Y COMUNICACIONES'),
  array('codigo' => 'IMA','nombre' => 'INSTALACIÓN Y MANTENIMIENTO'),
  array('codigo' => 'IMP','nombre' => 'IMAGEN PERSONAL'),
  array('codigo' => 'IMS','nombre' => 'IMAGEN Y SONIDO'),
  array('codigo' => 'INA','nombre' => 'INDUSTRIAS ALIMENTARIAS'),
  array('codigo' => 'MAM','nombre' => 'MADERA, MUEBLE Y CORCHO'),
  array('codigo' => 'MAP','nombre' => 'MARITÍMO-PESQUERA'),
  array('codigo' => 'QUI','nombre' => 'QUÍMICA'),
  array('codigo' => 'SAN','nombre' => 'SANIDAD'),
  array('codigo' => 'SEA','nombre' => 'SEGURIDAD Y MEDIO AMBIENTE'),
  array('codigo' => 'SSC','nombre' => 'SERVICIOS SOCIOCULTURALES Y A LA COMUNIDAD'),
  array('codigo' => 'TCP','nombre' => 'TEXTIL, CONFECCIÓN Y PIEL'),
  array('codigo' => 'TMV','nombre' => 'TRANSPORTE Y MANTENIMIENTO DE VEHÍCULOS'),
  array('codigo' => 'VIC','nombre' => 'VIDRIO Y CERÁMICA')
);

}
