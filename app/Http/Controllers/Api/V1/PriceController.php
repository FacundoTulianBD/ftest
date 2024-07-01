<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Price;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpOffice\PhpSpreadsheet\IOFactory;

class PriceController extends Controller
{
    private const PER_PAGE = 10;

    public function index(Request $request)
    {
        $validated = $request->validate([
            'perPage' => ['sometimes', 'int'],
        ]);

        $prices = Price::paginate($validated['perPage'] ?? self::PER_PAGE);
        return response()->json($prices);

    }

    public function show(Price $price)
    {
        return $price;
    }
    
    public function update(Request $request, Price $price)
    {
        $price->update($request->all());
        return $price;
    }

    public function destroy(Price $price)
    {
        $price->delete();
        return 200;
    }

    public function importPrices(Request $request)
    {
        $request->validate([
            'file' => ['required', 'mimes:xlsx,xls'],
            'type' => ['required', 'integer'], // Auto, motos, etc.
        ]);

        $file = $request->file('file');

        try {
            $spreadsheet = IOFactory::load($file);
        } catch (\Exception $e) {
            return back()->with('error', 'Error al cargar el archivo Excel: ' . $e->getMessage());
        }

        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray();


        foreach ($rows as $key => $row) {
            if ($key == 0 || empty($row[0])) continue;

            $price = Price::where('marca', $row[3])->where('modelo', $row[4])->where('version', $row[5])->first();
            if ($price) {
                Price::where('id', $price->id)
                    ->update([
                        'MONEDA' => $row[6],
                        '0km' => !empty($row[7]) ? $row[7] : 0,
                        '2023' => !empty($row[8]) ? $row[8] : 0,
                        '2022' => !empty($row[9]) ? $row[9] : 0,
                        '2021' => !empty($row[10]) ? $row[10] : 0,
                        '2020' => !empty($row[11]) ? $row[11] : 0,
                        '2019' => !empty($row[12]) ? $row[12] : 0,
                        '2018' => !empty($row[13]) ? $row[13] : 0,
                        '2017' => !empty($row[14]) ? $row[14] : 0,
                        '2016' => !empty($row[15]) ? $row[15] : 0,
                        '2015' => !empty($row[16]) ? $row[16] : 0,
                        '2014' => !empty($row[17]) ? $row[17] : 0,
                        '2013' => !empty($row[18]) ? $row[18] : 0,
                        '2012' => !empty($row[19]) ? $row[19] : 0,
                        '2011' => !empty($row[20]) ? $row[20] : 0,
                        '2010' => !empty($row[21]) ? $row[21] : 0,
                        '2009' => !empty($row[22]) ? $row[22] : 0,
                        '2008' => !empty($row[23]) ? $row[23] : 0,
                        '2007' => !empty($row[24]) ? $row[24] : 0,
                        '2006' => !empty($row[25]) ? $row[25] : 0,
                        '2005' => !empty($row[26]) ? $row[26] : 0,
                        '2004' => !empty($row[27]) ? $row[27] : 0,
                        '2003' => !empty($row[28]) ? $row[28] : 0,
                        '2002' => !empty($row[29]) ? $row[29] : 0,
                        '2001' => !empty($row[30]) ? $row[30] : 0,
                        '2000' => !empty($row[31]) ? $row[31] : 0,
                        '1999' => !empty($row[32]) ? $row[32] : 0,
                        '1998' => !empty($row[33]) ? $row[33] : 0,
                        '1997' => !empty($row[34]) ? $row[34] : 0,
                        '1996' => !empty($row[35]) ? $row[35] : 0,
                        '1995' => !empty($row[36]) ? $row[36] : 0,
                        // Añade más años según sea necesario
                    ]);
            } else {
                Price::create([
                    'MARCA' => $row[3],
                    'MODELO' => $row[4],
                    'VERSION' => $row[5],
                    'ID_TIPO' => $request->type,
                    'MONEDA' => $row[6],
                    '0km' => !empty($row[7]) ? $row[7] : 0,
                    '2023' => !empty($row[8]) ? $row[8] : 0,
                    '2022' => !empty($row[9]) ? $row[9] : 0,
                    '2021' => !empty($row[10]) ? $row[10] : 0,
                    '2020' => !empty($row[11]) ? $row[11] : 0,
                    '2019' => !empty($row[12]) ? $row[12] : 0,
                    '2018' => !empty($row[13]) ? $row[13] : 0,
                    '2017' => !empty($row[14]) ? $row[14] : 0,
                    '2016' => !empty($row[15]) ? $row[15] : 0,
                    '2015' => !empty($row[16]) ? $row[16] : 0,
                    '2014' => !empty($row[17]) ? $row[17] : 0,
                    '2013' => !empty($row[18]) ? $row[18] : 0,
                    '2012' => !empty($row[19]) ? $row[19] : 0,
                    '2011' => !empty($row[20]) ? $row[20] : 0,
                    '2010' => !empty($row[21]) ? $row[21] : 0,
                    '2009' => !empty($row[22]) ? $row[22] : 0,
                    '2008' => !empty($row[23]) ? $row[23] : 0,
                    '2007' => !empty($row[24]) ? $row[24] : 0,
                    '2006' => !empty($row[25]) ? $row[25] : 0,
                    '2005' => !empty($row[26]) ? $row[26] : 0,
                    '2004' => !empty($row[27]) ? $row[27] : 0,
                    '2003' => !empty($row[28]) ? $row[28] : 0,
                    '2002' => !empty($row[29]) ? $row[29] : 0,
                    '2001' => !empty($row[30]) ? $row[30] : 0,
                    '2000' => !empty($row[31]) ? $row[31] : 0,
                    '1999' => !empty($row[32]) ? $row[32] : 0,
                    '1998' => !empty($row[33]) ? $row[33] : 0,
                    '1997' => !empty($row[34]) ? $row[34] : 0,
                    '1996' => !empty($row[35]) ? $row[35] : 0,
                    '1995' => !empty($row[36]) ? $row[36] : 0,
                ]);
            }
        }

        return back()->with('success', 'Datos del archivo Excel importados correctamente.');
    }
}
