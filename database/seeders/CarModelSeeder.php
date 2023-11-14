<?php

namespace Database\Seeders;

use App\Models\CarModel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CarModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $audi = CarModel::create([
            'name' => 'Audi',
        ]);

        $audi_data = [
            ['name' => 'Audi Q3', 'parrent_id' => $audi->id],
            ['name' => 'Audi Q5', 'parrent_id' => $audi->id],
            ['name' => 'Audi Q5 Sportback', 'parrent_id' => $audi->id],
            ['name' => 'Audi SQ5', 'parrent_id' => $audi->id],
            ['name' => 'Audi SQ5 Sportback', 'parrent_id' => $audi->id],
            ['name' => 'Audi Q7', 'parrent_id' => $audi->id],
            ['name' => 'Audi SQ7', 'parrent_id' => $audi->id],
            ['name' => 'Audi Q8', 'parrent_id' => $audi->id],
            ['name' => 'Audi SQ8', 'parrent_id' => $audi->id],
            ['name' => 'Audi RS Q8', 'parrent_id' => $audi->id],
            ['name' => 'Audi A3 Sedan', 'parrent_id' => $audi->id],
            ['name' => 'Audi S3 Sedan', 'parrent_id' => $audi->id],
            ['name' => 'Audi RS 3 Sedan', 'parrent_id' => $audi->id],
            ['name' => 'Audi A4 Sedan', 'parrent_id' => $audi->id],
            ['name' => 'Audi A4 allroad', 'parrent_id' => $audi->id],
            ['name' => 'Audi S4 Sedan', 'parrent_id' => $audi->id],
            ['name' => 'Audi A5 Coupe', 'parrent_id' => $audi->id],
            ['name' => 'Audi S5 Coupe', 'parrent_id' => $audi->id],
            ['name' => 'Audi RS 5 Coupe', 'parrent_id' => $audi->id],
            ['name' => 'Audi A5 Sportback', 'parrent_id' => $audi->id],
            ['name' => 'Audi S5 Sportback', 'parrent_id' => $audi->id],
            ['name' => 'Audi RS 5 Sportback', 'parrent_id' => $audi->id],
            ['name' => 'Audi A5 Cabriolet', 'parrent_id' => $audi->id],
            ['name' => 'Audi S5 Cabriolet', 'parrent_id' => $audi->id],
            ['name' => 'Audi A6 Sedan', 'parrent_id' => $audi->id],
            ['name' => 'Audi A6 Allroad', 'parrent_id' => $audi->id],
            ['name' => 'Audi S6 Sedan', 'parrent_id' => $audi->id],
            ['name' => 'Audi RS 6 Avant', 'parrent_id' => $audi->id],
            ['name' => 'Audi A7', 'parrent_id' => $audi->id],
            ['name' => 'Audi S7', 'parrent_id' => $audi->id],
            ['name' => 'Audi RS 7', 'parrent_id' => $audi->id],
            ['name' => 'Audi A8', 'parrent_id' => $audi->id],
            ['name' => 'Audi S8', 'parrent_id' => $audi->id],
            ['name' => 'Audi TT Coupe', 'parrent_id' => $audi->id],
            ['name' => 'Audi TTS Coupe', 'parrent_id' => $audi->id],
            ['name' => 'Audi TT Roadster', 'parrent_id' => $audi->id],
            ['name' => 'Audi R8 Coupe', 'parrent_id' => $audi->id],
            ['name' => 'Audi R8 Spyder', 'parrent_id' => $audi->id],
        ];

        CarModel::insert($audi_data);

        //start bmw child
        $bmw = CarModel::create([
            'name' => 'BMW',
        ]);

        $bmw_data = [
            ['name' => 'BMW X1', 'parrent_id' => $bmw->id],
            ['name' => 'BMW X3', 'parrent_id' => $bmw->id],
            ['name' => 'BMW X4', 'parrent_id' => $bmw->id],
            ['name' => 'BMW X5', 'parrent_id' => $bmw->id],
            ['name' => 'BMW X6', 'parrent_id' => $bmw->id],
            ['name' => 'BMW X7', 'parrent_id' => $bmw->id],
            ['name' => 'BMW XM', 'parrent_id' => $bmw->id],
            ['name' => 'BMW Electric Cars', 'parrent_id' => $bmw->id],
            ['name' => 'BMW 3 Series Sedan', 'parrent_id' => $bmw->id],
            ['name' => 'BMW 5 Series Sedan', 'parrent_id' => $bmw->id],
            ['name' => 'M Coupes & Sedans', 'parrent_id' => $bmw->id],
            ['name' => 'BMW 2 Series Coupe', 'parrent_id' => $bmw->id],
            ['name' => 'BMW 4 Series Coupe', 'parrent_id' => $bmw->id],
            ['name' => 'BMW 4 Series Gran Coupe', 'parrent_id' => $bmw->id],
            ['name' => 'BMW 8 Series Coupe', 'parrent_id' => $bmw->id],
            ['name' => 'BMW 8 Series Gran Coupe', 'parrent_id' => $bmw->id],
            ['name' => 'BMW 4 Series Convertible', 'parrent_id' => $bmw->id],
            ['name' => 'BMW 8 Series Convertible', 'parrent_id' => $bmw->id],
        ];

        CarModel::insert($bmw_data);
        //end bmw child

        //start bmw x1 child
        $x1 = CarModel::where('name', 'BMW X1')->first();

        $x1_data = [
            ['name' => 'BMW X1 xDrive28i', 'parrent_id' => $x1->id]
        ];

        CarModel::insert($x1_data);

        //end bmw x1 child

        //start bmw x3 child

        $x3 = CarModel::where('name', 'BMW X3')->first();

        $x3_data = [
            ['name' => 'BMW X3 sDrive30i', 'parrent_id' => $x3->id],
            ['name' => 'BMW X3 xDrive30i', 'parrent_id' => $x3->id],
            ['name' => 'BMW X3 M40i', 'parrent_id' => $x3->id],
            ['name' => 'BMW X3 M', 'parrent_id' => $x3->id],
        ];

        CarModel::insert($x3_data);

        //end bmw x3 child


        //start bmw x4 child

        $x4 = CarModel::where('name', 'BMW X4')->first();
        $x4_data = [
            ['name' => 'BMW X4 xDrive30i', 'parrent_id' => $x4->id],
            ['name' => 'BMW X4 M40i', 'parrent_id' => $x4->id],
            ['name' => 'BMW X4 M', 'parrent_id' => $x4->id],
        ];

        CarModel::insert($x4_data);

        //end bmw x4 child

        //start bmw x5 child

        $x5 = CarModel::where('name', 'BMW X5')->first();
        $x5_data = [
            ['name' => 'BMW X5 sDrive40i', 'parrent_id' => $x5->id],
            ['name' => 'BMW X5 xDrive40i', 'parrent_id' => $x5->id],
            ['name' => 'BMW X5 xDrive50e', 'parrent_id' => $x5->id],
            ['name' => 'BMW X5 M60i', 'parrent_id' => $x5->id],
            ['name' => 'BMW X5 M', 'parrent_id' => $x5->id],
        ];

        CarModel::insert($x5_data);

        //end bmw x5 child

        //start bmw x6 child

        $x6 = CarModel::where('name', 'BMW X6')->first();
        $x6_data = [
            ['name' => 'BMW X6 xDrive40i', 'parrent_id' => $x6->id],
            ['name' => 'BMW X6 M60i', 'parrent_id' => $x6->id],
            ['name' => 'BMW X6 M Competition', 'parrent_id' => $x6->id]
        ];

        CarModel::insert($x6_data);

        //end bmw x6 child


        //start bmw x7 child

        $x7 = CarModel::where('name', 'BMW X7')->first();
        $x7_data = [
            ['name' => 'BMW X7 xDrive40i', 'parrent_id' => $x7->id],
            ['name' => 'BMW X7 M60i', 'parrent_id' => $x7->id],
            ['name' => 'ALPINA XB7', 'parrent_id' => $x7->id]
        ];

        CarModel::insert($x7_data);

        //end bmw x7 child

        //start bmw xm child

        $xm = CarModel::where('name', 'BMW XM')->first();
        $xm_data = [
            ['name' => 'BMW XM', 'parrent_id' => $xm->id],
        ];

        CarModel::insert($xm_data);

        //end bmw xm child

        //start bmw electric car child

        $electricCar = CarModel::where('name', 'BMW Electric Cars')->first();
        $electricCar_data = [
            ['name' => 'BMW i4 eDrive35', 'parrent_id' => $electricCar->id],
            ['name' => 'BMW i4 eDrive40', 'parrent_id' => $electricCar->id],
            ['name' => 'BMW i4 M50', 'parrent_id' => $electricCar->id],
            ['name' => 'BMW i7 xDrive60 Convenience Sedan', 'parrent_id' => $electricCar->id],
            ['name' => 'BMW i7 xDrive60 Sport Sedan', 'parrent_id' => $electricCar->id],
            ['name' => 'BMW i7 xDrive60 Performance Sedan', 'parrent_id' => $electricCar->id],
            ['name' => 'BMW iX xDrive50', 'parrent_id' => $electricCar->id],
            ['name' => 'BMW iX M60', 'parrent_id' => $electricCar->id],
            ['name' => 'BMW Z4 Roadster', 'parrent_id' => $electricCar->id],
            ['name' => 'BMW Z4 sDrive30i', 'parrent_id' => $electricCar->id],
            ['name' => 'BMW Z4 M40i', 'parrent_id' => $electricCar->id],
        ];

        CarModel::insert($electricCar_data);

        //end bmw electric car child

        //start bmw 3 series sedan  child

        $series3 = CarModel::where('name', 'BMW 3 Series Sedan')->first();
        $series3_data = [
            ['name' => 'BMW 330i Sedan', 'parrent_id' => $series3->id],
            ['name' => 'BMW 330i xDrive Sedan', 'parrent_id' => $series3->id],
            ['name' => 'BMW M340i Sedan', 'parrent_id' => $series3->id],
            ['name' => 'BMW M340i xDrive Sedan', 'parrent_id' => $series3->id],
            ['name' => 'BMW 330e Sedan', 'parrent_id' => $series3->id],
            ['name' => 'BMW 330e xDrive Sedan', 'parrent_id' => $series3->id],
        ];

        CarModel::insert($series3_data);

        //end bmw 3 series sedan  child

        //start bmw 5 series sedan  child

        $series5 = CarModel::where('name', 'BMW 5 Series Sedan')->first();
        $series5_data = [
            ['name' => 'BMW 530i Sedan', 'parrent_id' => $series5->id],
            ['name' => 'BMW 530i xDrive Sedan', 'parrent_id' => $series5->id],
            ['name' => 'BMW 530e Sedan', 'parrent_id' => $series5->id],
            ['name' => 'BMW 530e xDrive Sedan', 'parrent_id' => $series5->id],
            ['name' => 'BMW 540i Sedan', 'parrent_id' => $series5->id],
            ['name' => 'BMW 540i xDrive Sedan', 'parrent_id' => $series5->id],
            ['name' => 'BMW M550i xDrive Sedan', 'parrent_id' => $series5->id],
            ['name' => 'BMW 7 Series Sedan', 'parrent_id' => $series5->id],
            ['name' => 'BMW 740i Sedan', 'parrent_id' => $series5->id],
            ['name' => 'BMW 760i xDrive Sedan', 'parrent_id' => $series5->id],
        ];

        CarModel::insert($series5_data);

        //end bmw 5 series sedan  child

        //start bmw M Coupes & Sedans child

        $coupesSedan = CarModel::where('name', 'M Coupes & Sedans')->first();
        $coupesSedan_data = [
            ['name' => 'BMW M2 Coupe', 'parrent_id' => $coupesSedan->id],
            ['name' => 'BMW M3 Sedan', 'parrent_id' => $coupesSedan->id],
            ['name' => 'BMW M3 Competition Sedan', 'parrent_id' => $coupesSedan->id],
            ['name' => 'BMW M3 Competition xDrive Sedan', 'parrent_id' => $coupesSedan->id],
            ['name' => 'BMW M4 Coupe', 'parrent_id' => $coupesSedan->id],
            ['name' => 'BMW M4 Competition Coupe', 'parrent_id' => $coupesSedan->id],
            ['name' => 'BMW M4 Competition xDrive Coupe', 'parrent_id' => $coupesSedan->id],
            ['name' => 'BMW M4 Competition xDrive Convertible Coupe', 'parrent_id' => $coupesSedan->id],
            ['name' => 'BMW M5 Sedan', 'parrent_id' => $coupesSedan->id],
            ['name' => 'BMW M8 Competition Coupe', 'parrent_id' => $coupesSedan->id],
            ['name' => 'BMW M8 Competition Gran Coupe', 'parrent_id' => $coupesSedan->id],
            ['name' => 'BMW M8 Convertible', 'parrent_id' => $coupesSedan->id],
        ];

        CarModel::insert($coupesSedan_data);

        //end bmw M Coupes & Sedans child

        //start bmw BMW 2 Series Coupe child

        $coupe2 = CarModel::where('name', 'BMW 2 Series Coupe')->first();
        $coupe2_data = [
            ['name' => 'BMW 230i Coupe', 'parrent_id' => $coupe2->id],
            ['name' => 'BMW 230i xDrive Coupe', 'parrent_id' => $coupe2->id],
            ['name' => 'BMW M2410i Coupe', 'parrent_id' => $coupe2->id],
            ['name' => 'BMW M240i xDrive Coupe', 'parrent_id' => $coupe2->id],
            ['name' => 'BMW 2 Series Gran Coupe', 'parrent_id' => $coupe2->id],
            ['name' => 'BMW 228i Gran Coupe', 'parrent_id' => $coupe2->id],
            ['name' => 'BMW 228i xDrive Gran Coupe', 'parrent_id' => $coupe2->id],
            ['name' => 'BMW M235i xDrive Gran Coupe', 'parrent_id' => $coupe2->id],
        ];

        CarModel::insert($coupe2_data);

        //end bmw BMW 2 Series Coupe child

        //start bmw BMW 4 Series Coupe child

        $coupe4 = CarModel::where('name', 'BMW 4 Series Coupe')->first();
        $coupe4_data = [
            ['name' => 'BMW 430i Coupe', 'parrent_id' => $coupe4->id],
            ['name' => 'BMW 430i xDrive Coupe', 'parrent_id' => $coupe4->id],
            ['name' => 'BMW M440i Coupe', 'parrent_id' => $coupe4->id],
            ['name' => 'BMW M440i xDrive Coupe', 'parrent_id' => $coupe4->id],
        ];

        CarModel::insert($coupe4_data);

        //end bmw BMW 4 Series Coupe child


        //start bmw BMW 4 Series Gran Coupe child

        $granCoupe4 = CarModel::where('name', 'BMW 4 Series Gran Coupe')->first();
        $granCoupe4_data = [
            ['name' => 'BMW 430i Gran Coupe', 'parrent_id' => $granCoupe4->id],
            ['name' => 'BMW 430i xDrive Gran Coupe', 'parrent_id' => $granCoupe4->id],
            ['name' => 'BMW M440i Gran Coupe', 'parrent_id' => $granCoupe4->id],
            ['name' => 'BMW M440i xDrive Gran Coupe', 'parrent_id' => $granCoupe4->id],
        ];

        CarModel::insert($granCoupe4_data);

        //end bmw BMW 4 Series Gran Coupe child

        //start BMW 8 Series Coupe child

        $coupe8 = CarModel::where('name', 'BMW 8 Series Coupe')->first();
        $coupe8_data = [
            ['name' => 'BMW 840i Coupe', 'parrent_id' => $coupe8->id],
            ['name' => 'BMW 840i xDrive Coupe', 'parrent_id' => $coupe8->id],
            ['name' => 'BMW M850i xDrive Coupe', 'parrent_id' => $coupe8->id],
        ];

        CarModel::insert($coupe8_data);

        //end BMW 8 Series Coupe  child


        //start BMW 8 Series Gran Coupe  child

        $granCoupe8 = CarModel::where('name', 'BMW 8 Series Gran Coupe')->first();
        $granCoupe8_data = [
            ['name' => 'BMW 840i Gran Coupe', 'parrent_id' => $granCoupe8->id],
            ['name' => 'BMW 840i xDrive Gran Coupe', 'parrent_id' => $granCoupe8->id],
            ['name' => 'BMW M850i xDrive Gran Coupe', 'parrent_id' => $granCoupe8->id],
            ['name' => 'Alpina B8 xDrive Gran Coupe', 'parrent_id' => $granCoupe8->id],
        ];

        CarModel::insert($granCoupe8_data);

        //end BMW 8 Series Gran Coupe  child

        //start BMW 4 Series Convertible  child

        $convertible4 = CarModel::where('name', 'BMW 4 Series Convertible')->first();
        $convertible4_data = [
            ['name' => 'BMW 430i Convertible', 'parrent_id' => $convertible4->id],
            ['name' => 'BMW 430i xDrive Convertible', 'parrent_id' => $convertible4->id],
            ['name' => 'BMW M440i Convertible', 'parrent_id' => $convertible4->id],
            ['name' => 'BMW M440i xDrive Convertible', 'parrent_id' => $convertible4->id],
        ];

        CarModel::insert($convertible4_data);

        //end BMW 4 Series Convertible  child

        //start BMW 8 Series Convertible  child

        $convertible8 = CarModel::where('name', 'BMW 8 Series Convertible')->first();
        $convertible8_data = [
            ['name' => 'BMW 840i Convertible', 'parrent_id' => $convertible8->id],
            ['name' => 'BMW 840i xDrive Convertible', 'parrent_id' => $convertible8->id],
            ['name' => 'BMW M850i xDrive Convertible', 'parrent_id' => $convertible8->id],
        ];

        CarModel::insert($convertible8_data);

        //end BMW 8 Series Convertible  child

        //start Ford  child
        $ford = CarModel::create([
            'name' => 'Ford',
        ]);

        $ford_data = [
            ['name' => 'Ford Fiesta (1976 - Present) (7th gen)', 'parrent_id' => $ford->id],
            ['name' => 'Ford Focus (1998 - Present) (4th gen)', 'parrent_id' => $ford->id],
            ['name' => 'Ford Mondeo (1992 - Present) (5th gen)', 'parrent_id' => $ford->id],
            ['name' => 'Ford Fiesta ST (2004 - Present) (7th gen)', 'parrent_id' => $ford->id],
            ['name' => 'Ford Puma ST (2019 - Present) (1st gen)', 'parrent_id' => $ford->id],
            ['name' => 'Ford Focus ST (2005 - Present) (4th gen)', 'parrent_id' => $ford->id],
            ['name' => 'Ford Mustang (1964 - Present) (7th gen)', 'parrent_id' => $ford->id],
            ['name' => 'Ford Ranger Raptor (1981 - Present) (6th gen)', 'parrent_id' => $ford->id],
        ];

        CarModel::insert($ford_data);

        //end Ford child


        //start Mercedes  child
        $mercedes = CarModel::create([
            'name' => 'Mercedes-Benz',
        ]);

        $mercedes_data = [
            ['name' => 'Mercedes-Benz SUVs', 'parrent_id' => $mercedes->id],
            ['name' => 'Mercedes-Benz Sedans & Wagons', 'parrent_id' => $mercedes->id],
            ['name' => 'Mercedes-Benz Hybrids & Electrics', 'parrent_id' => $mercedes->id],
            ['name' => 'Mercedes-Benz Coupes', 'parrent_id' => $mercedes->id],
            ['name' => 'Mercedes-Benz Convertibles & Roadsters', 'parrent_id' => $mercedes->id],
        ];

        CarModel::insert($mercedes_data);

        //end Mercedes  child


        //start Mercedes-Benz SUVs  child
        $suvs = CarModel::where('name', 'Mercedes-Benz SUVs')->first();
        $suvs_data = [
            ['name' => 'Mercedes-Benz GLA SUV', 'parrent_id' => $suvs->id],
            ['name' => 'Mercedes-Benz GLB SUV', 'parrent_id' => $suvs->id],
            ['name' => 'Mercedes-Benz GLC SUV', 'parrent_id' => $suvs->id],
            ['name' => 'Mercedes-Benz GLC Coupe', 'parrent_id' => $suvs->id],
            ['name' => 'Mercedes-Benz GLE SUV', 'parrent_id' => $suvs->id],
            ['name' => 'Mercedes-Benz GLE Coupe', 'parrent_id' => $suvs->id],
            ['name' => 'Mercedes-Benz GLS SUV', 'parrent_id' => $suvs->id],
            ['name' => 'Mercedes-Maybach GLS SUV', 'parrent_id' => $suvs->id],
            ['name' => 'Mercedes-Benz G-Class SUV', 'parrent_id' => $suvs->id],
        ];

        CarModel::insert($suvs_data);

        //end Mercedes-Benz SUVs  child

        //start Mercedes-Benz Sedans & Wagons  child

        $wagons = CarModel::where('name', 'Mercedes-Benz Sedans & Wagons')->first();
        $wagons_data = [
            ['name' => 'Mercedes-Benz A-Class Sedan', 'parrent_id' => $wagons->id],
            ['name' => 'Mercedes Benz A-Class Hatch', 'parrent_id' => $wagons->id],
            ['name' => 'Mercedes-Benz C-Class Sedan', 'parrent_id' => $wagons->id],
            ['name' => 'Mercedes-Benz C-Class Estate', 'parrent_id' => $wagons->id],
            ['name' => 'Mercedes-Benz CLA Sedan', 'parrent_id' => $wagons->id],
            ['name' => 'Mercedes-Benz CLA Estate', 'parrent_id' => $wagons->id],
            ['name' => 'Mercedes-Benz E-Class Sedan', 'parrent_id' => $wagons->id],
            ['name' => 'Mercedes-Benz E-Class Estate', 'parrent_id' => $wagons->id],
            ['name' => 'Mercedes-Benz S-Class Sedan', 'parrent_id' => $wagons->id],
            ['name' => 'Mercedes-Maybach S-Class Sedan', 'parrent_id' => $wagons->id],
        ];

        CarModel::insert($wagons_data);

        //end Mercedes-Benz Sedans & Wagons  child

        //start Mercedes-Benz Hybrids & Electrics  child

        $hybrids = CarModel::where('name', 'Mercedes-Benz Hybrids & Electrics')->first();
        $hybrids_data = [
            ['name' => 'Mercedes-Benz GLC SUV (Hybrid)', 'parrent_id' => $hybrids->id],
            ['name' => 'Mercedes-Benz EQS Sedan', 'parrent_id' => $hybrids->id],
            ['name' => 'Mercedes-Benz EQE Sedan', 'parrent_id' => $hybrids->id],
            ['name' => 'Mercedes-Benz EQA CUV', 'parrent_id' => $hybrids->id],
            ['name' => 'Mercedes-Benz EQB CUV', 'parrent_id' => $hybrids->id],
            ['name' => 'Mercedes-Benz EQC SUV', 'parrent_id' => $hybrids->id],
            ['name' => 'Mercedes-Benz EQE SUV', 'parrent_id' => $hybrids->id],
            ['name' => 'Mercedes-Benz EQS SUV', 'parrent_id' => $hybrids->id],
        ];

        CarModel::insert($hybrids_data);

        //end Mercedes-Benz Hybrids & Electrics  child

        //start Mercedes-Benz Coupes  child

        $mercedesCoupes = CarModel::where('name', 'Mercedes-Benz Coupes')->first();
        $mercedesCoupes_data = [
            ['name' => 'Mercedes-Benz CLA Coupe', 'parrent_id' => $mercedesCoupes->id],
            ['name' => 'Mercedes-Benz C-Class Coupe', 'parrent_id' => $mercedesCoupes->id],
            ['name' => 'Mercedes-Benz E-Class Coupe', 'parrent_id' => $mercedesCoupes->id],
            ['name' => 'Mercedes-Benz CLS Coupe', 'parrent_id' => $mercedesCoupes->id],
            ['name' => 'Mercedes-Benz S-Class Coupe', 'parrent_id' => $mercedesCoupes->id],
        ];

        CarModel::insert($mercedesCoupes_data);

        //end Mercedes-Benz Coupes  child

        //start Mercedes-Benz Convertibles & Roadsters  child

        $roadsters = CarModel::where('name', 'Mercedes-Benz Convertibles & Roadsters')->first();
        $roadsters_data = [
            ['name' => 'Mercedes-Benz C-Class Cabriolet', 'parrent_id' => $roadsters->id],
            ['name' => 'Mercedes-Benz E-Class Cabriolet', 'parrent_id' => $roadsters->id],
            ['name' => 'Mercedes-Benz S-Class Cabriolet', 'parrent_id' => $roadsters->id],
            ['name' => 'Mercedes-Benz SL Roadster', 'parrent_id' => $roadsters->id],
        ];

        CarModel::insert($roadsters_data);

        //end Mercedes-Benz Convertibles & Roadsters  child

        //start opel  child
        $opel = CarModel::create([
            'name' => 'Opel',
        ]);
          $opel_data = [
              ['name' => 'Adam', 'parrent_id' => $opel->id],
              ['name' => 'Admiral', 'parrent_id' => $opel->id],
              ['name' => 'Agila', 'parrent_id' => $opel->id],
              ['name' => 'Ampera', 'parrent_id' => $opel->id],
              ['name' => 'Antara', 'parrent_id' => $opel->id],
              ['name' => 'Ascona', 'parrent_id' => $opel->id],
              ['name' => 'Astra', 'parrent_id' => $opel->id],
              ['name' => 'Astra OPC', 'parrent_id' => $opel->id],
              ['name' => 'Calibra', 'parrent_id' => $opel->id],
              ['name' => 'Campo', 'parrent_id' => $opel->id],
              ['name' => 'Cascada', 'parrent_id' => $opel->id],
              ['name' => 'Combo', 'parrent_id' => $opel->id],
              ['name' => 'Commodore', 'parrent_id' => $opel->id],
              ['name' => 'Corsa', 'parrent_id' => $opel->id],
              ['name' => 'Corsa OPC', 'parrent_id' => $opel->id],
              ['name' => 'Crossland X', 'parrent_id' => $opel->id],
              ['name' => 'Diplomat', 'parrent_id' => $opel->id],
              ['name' => 'Frontera', 'parrent_id' => $opel->id],
              ['name' => 'Grandland', 'parrent_id' => $opel->id],
              ['name' => 'GT', 'parrent_id' => $opel->id],
              ['name' => 'Insignia', 'parrent_id' => $opel->id],
              ['name' => 'Insignia GSi', 'parrent_id' => $opel->id],
              ['name' => 'Insignia OPC', 'parrent_id' => $opel->id],
              ['name' => 'Kadett', 'parrent_id' => $opel->id],
              ['name' => 'Kapitan', 'parrent_id' => $opel->id],
              ['name' => 'Karl', 'parrent_id' => $opel->id],
              ['name' => 'Manta', 'parrent_id' => $opel->id],
              ['name' => 'Meriva', 'parrent_id' => $opel->id],
              ['name' => 'Meriva OPC', 'parrent_id' => $opel->id],
              ['name' => 'Mokka', 'parrent_id' => $opel->id],
              ['name' => 'Monterey', 'parrent_id' => $opel->id],
              ['name' => 'Monza', 'parrent_id' => $opel->id],
              ['name' => 'Olympia', 'parrent_id' => $opel->id],
              ['name' => 'Omega', 'parrent_id' => $opel->id],
              ['name' => 'P4', 'parrent_id' => $opel->id],
              ['name' => 'Rekord', 'parrent_id' => $opel->id],
              ['name' => 'Rocks-e', 'parrent_id' => $opel->id],
              ['name' => 'Senator', 'parrent_id' => $opel->id],
              ['name' => 'Signum', 'parrent_id' => $opel->id],
              ['name' => 'Sintra', 'parrent_id' => $opel->id],
              ['name' => 'Speedster', 'parrent_id' => $opel->id],
              ['name' => 'Super Six', 'parrent_id' => $opel->id],
              ['name' => 'Tigra', 'parrent_id' => $opel->id],
              ['name' => 'Vectra', 'parrent_id' => $opel->id],
              ['name' => 'Vectra OPC', 'parrent_id' => $opel->id],
              ['name' => 'Vita', 'parrent_id' => $opel->id],
              ['name' => 'Vivaro', 'parrent_id' => $opel->id],
              ['name' => 'Zafira', 'parrent_id' => $opel->id],
              ['name' => 'Zafira Life', 'parrent_id' => $opel->id],
              ['name' => 'Zafira OPC', 'parrent_id' => $opel->id],
          ];

          CarModel::insert($opel_data);

        CarModel::create([
            'name' => 'Other',
        ]);

        //end opel  child



         //start bmw  child
        // $mercedes = CarModel::create([
        //     'name' => 'Mercedes-Benz',
        // ]);
        //   $x3 = CarModel::where('name', 'X3')->first();
        //   $bmw_data = [
        //       ['name' => '', 'parrent_id' => $bmw->id],
        //   ];

        //   CarModel::insert($bmw_data);

        //end bmw  child


    }
}