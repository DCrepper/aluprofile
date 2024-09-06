<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class ProductAttributesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $response_termekek = Http::get('https://docs.google.com/spreadsheets/d/e/2PACX-1vSiIl00Jv4tPXSnWjxZqVOcrHIfRTWGZ9oT1TPYS_Tpq7BDOq5nJhXzxfO_vlcH-A/pub?gid=520467143&single=true&output=tsv');

        $termekek = str_replace("\r\n", "\t", $response_termekek->body());
        $termekek = str_getcsv($termekek, "\t");
        $termekek = array_chunk($termekek, 154);

        //the first row is the header row
        //the values go from the second row
        //the first column is the product name
        //the second column is the sku this is the unique identifier for the product find the product by this or variation also use sku to find the product
        //name	sku	Group id	Base	D (mm)	F (mm)	Max Load kg	Weight g	Color	SW (mm)	F1 (mm)	F2 (mm)	F3 (mm)	LK (mm)	Surface	H (mm)	M x L (mm)	UNC x L in	M x  l	SW	 d (mm)	 h (mm)	M x G (mm)	L (mm)	Profile	F4 (mm)	K (mm)	M	A (mm)	L x B x H (mm)	C (mm)	L1 (mm)	Size	Square Tube (mm)	B (mm)	 b (mm)	S (mm)	Round Tube (mm)	diameter B (mm)	diameter C (mm)	diameter  d (mm)	Thread	Pack Quantity Pieces	for Base	D1 (mm)	D2 (mm)	Max Load per Lifting (Unit/kg)	Weight kg	Set	Combination	A1 (mm)	A2 (mm)	B1 (mm)	B2 (mm)	FAmax N	FRmax N	Cogging Torque Nm	Friction Torque Nm	Friction Torque Nm tolerance	for Screw	for Nut	 a (mm)	ESD	Lock	t min (mm)	t max (mm)	P (mm)	Locking Force	Counter Screw	Dimensions (mm)	Locking Force N	Screw	C1 (mm)	C2 (mm)	R (mm)	diameter K (mm)	for T Slot Nut L (mm)	Dimensions L x B x H (mm)	Size M x L (mm)	A2 Profil (mm)	A1 min (mm)	A1 max (mm)	diameter D (mm)	Hole	Slot	T (mm)	FH (mm)	diameter FD (mm)	Weight g m	for Panel	Length	for Locking Lever	for Profile	E (mm)	diameter F (mm)	G (mm)	diameter S (mm)	diameter D1 (mm)	diameter D2 (mm)	Lifting Height (mm)	 t (mm)	Size S x L (mm)	Assembly	Profile Width	A x B (mm)	Hexagon socket set screw	L2 (mm)	Feature	P D (mm)	D	SW 2	SW 1	for Profile (mm)	Swivel Caster Tread	Wheel Body	Max Load N	 Fixed Caster Tread	F N	Color of Roller	Color of Cage	C D1 D2 (mm)	Dimensions A x B (mm)	N1	N2	Fmax N	C D (mm)	Version	Fig	Modular Dimension (mm)	Grid	L x B (mm)	Torx	Color of End piece	Opening Angle	W Nm	MAmax Nm	Tip	Bearing	SocketType	N (mm)	Product Search Keywords	Voltage	Frequency	Current	MaxConnectionPower	ECLASS V13	ECLASS V12	ECLASS V11	ECLASS V10	ECLASS V9	ECLASS V8	ECLASS V7	ECLASS V6	J (mm)
        //this is the header row content
        //from the Base column to the end of the row is the attribute values
        $header = array_shift($termekek);
        //$header = array_slice($header, 3);
        //make all attributes for pruducts
        //the product is can be simpe or variable
        $first = true;
        foreach ($termekek as $termekek_row) {

            $product_name = $termekek_row[0];
            $sku = $termekek_row[1];
            $product = Product::where('sku', $sku)->firstOrCreate([
                'name' => $product_name,
                'sku' => $sku,
            ]);
            if ($product) {
                $product_attributes = array_slice($termekek_row, 3);
                foreach ($product_attributes as $key => $product_attribute) {
                    if ($product_attribute == null || $product_attribute == '') {
                        continue;
                    }
                    $product->attributes()->firstOrCreate([
                        'name' => $header[$key + 3],
                        'value' => $product_attribute,
                    ]);
                }

            }

        }

    }
}
