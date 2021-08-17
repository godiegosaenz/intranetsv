<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Province;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Province::create([ 'id' => 0, 'name' => 'NO ESPECIFICADO', 'country_id' => 0, 'code' => '0']);
        Province::create([ 'id' => 1, 'name' => 'AZUAY', 'country_id' => 1, 'code' => '1']);
        Province::create([ 'id' => 2, 'name' => 'BOLIVAR', 'country_id' => 1, 'code' => '2']);
        Province::create([ 'id' => 3, 'name' => 'CAÑAR', 'country_id' => 1, 'code' => '3']);
        Province::create([ 'id' => 4, 'name' => 'CARCHI', 'country_id' => 1, 'code' => '4']);
        Province::create([ 'id' => 5, 'name' => 'COTOPAXI', 'country_id' => 1, 'code' => '5']);
        Province::create([ 'id' => 6, 'name' => 'CHIMBORAZO', 'country_id' => 1, 'code' => '6']);
        Province::create([ 'id' => 7, 'name' => 'EL ORO', 'country_id' => 1, 'code' => '7']);
        Province::create([ 'id' => 8, 'name' => 'ESMERALDAS', 'country_id' => 1, 'code' => '8']);
        Province::create([ 'id' => 9, 'name' => 'GUAYAS', 'country_id' => 1, 'code' => '9']);
        Province::create([ 'id' => 10, 'name' => 'IMBABURA', 'country_id' => 1, 'code' => '10']);
        Province::create([ 'id' => 11, 'name' => 'LOJA', 'country_id' => 1, 'code' => '11']);
        Province::create([ 'id' => 12, 'name' => 'LOS RIOS', 'country_id' => 1, 'code' => '12']);
        Province::create([ 'id' => 13, 'name' => 'MANABI', 'country_id' => 1, 'code' => '13']);
        Province::create([ 'id' => 14, 'name' => 'MORONA SANTIAGO', 'country_id' => 1, 'code' => '14']);
        Province::create([ 'id' => 15, 'name' => 'NAPO', 'country_id' => 1, 'code' => '15']);
        Province::create([ 'id' => 16, 'name' => 'PASTAZA', 'country_id' => 1, 'code' => '16']);
        Province::create([ 'id' => 17, 'name' => 'PICHINCHA', 'country_id' => 1, 'code' => '17']);
        Province::create([ 'id' => 18, 'name' => 'TUNGURAHUA', 'country_id' => 1, 'code' => '18']);
        Province::create([ 'id' => 19, 'name' => 'ZAMORA CHINCHIPE', 'country_id' => 1, 'code' => '19']);
        Province::create([ 'id' => 20, 'name' => 'GALAPAGOS', 'country_id' => 1, 'code' => '20']);
        Province::create([ 'id' => 21, 'name' => 'SUCUMBIOS', 'country_id' => 1, 'code' => '21']);
        Province::create([ 'id' => 22, 'name' => 'ORELLANA', 'country_id' => 1, 'code' => '22']);
        Province::create([ 'id' => 23, 'name' => 'SANTO DOMINGO DE LOS TSACHILAS', 'country_id' => 1, 'code' => '24']);
        Province::create([ 'id' => 24, 'name' => 'SANTA ELENA', 'country_id' => 1, 'code' => '23']);
        Province::create([ 'id' => 26, 'name' => 'VENEZUELA', 'country_id' => 2, 'code' => '0']);
        Province::create([ 'id' => 27, 'name' => 'CARACAS', 'country_id' => 2, 'code' => '0']);
        Province::create([ 'id' => 29, 'name' => 'MEXICO', 'country_id' => 22, 'code' => '0']);
        Province::create([ 'id' => 30, 'name' => 'GUAJIRA', 'country_id' => 3, 'code' => '0']);
        Province::create([ 'id' => 31, 'name' => 'NEW YORK', 'country_id' => 21, 'code' => '0']);
        Province::create([ 'id' => 33, 'name' => 'NARIÑO', 'country_id' => 3, 'code' => '0']);
        Province::create([ 'id' => 34, 'name' => 'VALLE', 'country_id' => 3, 'code' => '0']);
        Province::create([ 'id' => 36, 'name' => 'ORIENTE', 'country_id' => 0, 'code' => '0']);
        Province::create([ 'id' => 37, 'name' => 'MADRID', 'country_id' => 23, 'code' => '0']);
        Province::create([ 'id' => 38, 'name' => 'ESPAÑA', 'country_id' => 23, 'code' => '0']);
        Province::create([ 'id' => 39, 'name' => 'ARGENTINA', 'country_id' => 7, 'code' => '0']);
        Province::create([ 'id' => 40, 'name' => 'CHILE', 'country_id' => 6, 'code' => '0']);
        Province::create([ 'id' => 41, 'name' => 'COLOMBIA', 'country_id' => 3, 'code' => '0']);
        Province::create([ 'id' => 42, 'name' => 'IRAN', 'country_id' => 103, 'code' => '0']);
        Province::create([ 'id' => 43, 'name' => 'PERU', 'country_id' => 4, 'code' => '0']);
        Province::create([ 'id' => 45, 'name' => 'ECUADOR', 'country_id' => 0, 'code' => '0']);
        Province::create([ 'id' => 47, 'name' => 'MARYLAND', 'country_id' => 21, 'code' => '0']);
        Province::create([ 'id' => 49, 'name' => 'PENSILVANIA', 'country_id' => 21, 'code' => '0']);
        Province::create([ 'id' => 51, 'name' => 'CESAR', 'country_id' => 3, 'code' => '0']);
        Province::create([ 'id' => 55, 'name' => 'NEW JERSEY', 'country_id' => 21, 'code' => '0']);
        Province::create([ 'id' => 57, 'name' => 'ARTIBONITE', 'country_id' => 97, 'code' => '0']);
        Province::create([ 'id' => 60, 'name' => 'BUENOS AIRES', 'country_id' => 7, 'code' => '0']);
        Province::create([ 'id' => 61, 'name' => 'ARMENIA', 'country_id' => 3, 'code' => '0']);
        Province::create([ 'id' => 62, 'name' => 'BOGOTA', 'country_id' => 3, 'code' => '0']);
        Province::create([ 'id' => 63, 'name' => 'ITALIA', 'country_id' => 114, 'code' => '0']);
        Province::create([ 'id' => 66, 'name' => 'TUMACO', 'country_id' => 3, 'code' => '0']);
        Province::create([ 'id' => 69, 'name' => 'BOLIVIA', 'country_id' => 5, 'code' => '0']);
        Province::create([ 'id' => 90, 'name' => 'ZONAS NO DELIMITADAS', 'country_id' => 1, 'code' => '0']);
        Province::create([ 'id' => 91, 'name' => 'HONDURAS', 'country_id' => 14, 'code' => '0']);
        Province::create([ 'id' => 92, 'name' => 'BRASIL', 'country_id' => 10, 'code' => '0']);
        Province::create([ 'id' => 93, 'name' => 'NICARAGUA', 'country_id' => 13, 'code' => '0']);
        Province::create([ 'id' => 94, 'name' => 'CARTAGENA', 'country_id' => 3, 'code' => '0']);
        Province::create([ 'id' => 95, 'name' => 'CUBA', 'country_id' => 16, 'code' => '0']);
    }
}
