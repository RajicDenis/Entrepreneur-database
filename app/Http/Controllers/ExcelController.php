<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;
use App\Person;
use Excel;

class ExcelController extends Controller
{
    public function getExport(Request $request) {

    	$person = Person::find($request->lid);
    	$name = $person->name.' '.$person->last_name;

        $export = Activity::select('desc', 'date')->where('date', '>=', date('Y-m-d', strtotime($request->start_date)))->where('date', '<=', date('Y-m-d', strtotime($request->end_date)))->where('people_id', $request->lid)->get()->toArray();
        Excel::create('Aktivnosti_'.$name.'', function($excel) use ($export) {
		    $excel->sheet('Sheet 1', function($sheet) use($export) {
		        $sheet->fromArray($export, Null, 'A1', false, false);
		        $sheet->prependRow(1, array('Opis aktivnosti', 'Datum'));
		        $sheet->row(1, ['Opis aktivnosti', 'Datum']); // etc etc
				$sheet->row(1, function($row) { 
					$row->setBackground('#CCCCCC'); 
					$row->setFontWeight('bold');
					$row->setAlignment('center');
					$row->setFontSize(13);
				});
		    	$sheet->setBorder('A1:B1', 'thin');
				});
		})->export('xls');
    }
}
