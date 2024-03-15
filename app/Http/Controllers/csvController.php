<?php

namespace App\Http\Controllers;

use App\Models\cic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class csvController extends Controller
{
     //
     public function get_csv(Request $request){


        if ($request->name==Null) {
            $ccis = cic::whereBetween(DB::raw('DATE(updated_at)'), [$request->datefrom, $request->dateto])->where('status', 'APPROVED')->get();


        }
        else {
            $search=strtoupper($request->name);
            $ccis = cic::whereBetween(DB::raw('DATE(updated_at)'), [$request->datefrom, $request->dateto])->where('status', 'APPROVED')
            ->where('exportersname','LIKE', "%{$search}%")->get();
        }

 

        // these are the headers for the csv file. Not required but good to have one incase of system didn't recongize it properly
        $headers = array(
          'Content-Type' => 'text/csv'
        );


        //I am storing the csv file in public >> files folder. So that why I am creating files folder
        if (!File::exists(public_path()."/files")) {
            File::makeDirectory(public_path() . "/files");
        }

        //creating the download file
        $filename =  public_path("files/download.csv");
        $handle = fopen($filename, 'w');

        //adding the first row
        fputcsv($handle, [
            "S/N",
            "CCI NO",
            "SVP CCI NO",
            "CCI DATE",
            "APRROVAL DATE",
            "NXP NO",
            "NXP ISSUING BANK",
            "INSPECTION DATE",
            "EXPORTER NAME",
            "EXPORTED PRODUCTS",
            "HS CODE",
            "QUANTITY",
            "UNIT PRICE",
            "SHIPMENT DATE",
            "COUNTRY OF DESTINATION",
            "POINT OF EXPORT",
            "POINT OF EXIT",
            "DESIGNATED BANK",
            "FOB VALUE NAIRA",
            "NESS FEE (0.12% OF FOB)",
            "FOB VALUE",
            "USD",
            "EUR",
            "GBP",
            "NESS RECPT DATE",
            "REPATRIATION DATE",
            "RECEIPT NO.",
            "EXCHANGE RATE",
        ]);

        //adding the data from the array
        $sno=1;
        foreach ($ccis as $each_cci) {

            //check for currency used and assign for report
            $dollar=0.00; $GBP=0.00; $Euro=0.00;
            switch ($each_cci->pif_currency) {
                case 'USD':
                    $dollar = $each_cci->pif_valueofgoods;
                    break;
                case 'GBP':
                    $GBP=$each_cci->pif_valueofgoods;
                    break;

                case 'EUR':
                    $Euro=$each_cci->pif_valueofgoods;
                    break;

            }

            //Calculate the repatration date
            $rdate=date_add((date_create($each_cci->shipdate)), date_interval_create_from_date_string("90 day"));
            $strdate= date_format($rdate, 'd-M-Y');



            fputcsv($handle, [
                $sno,
                $each_cci->cci_id,'n/a',date_format($each_cci->date,'d-M-Y'),date_format($each_cci->appr_date,'d-M-Y'),
                $each_cci->nxpform_no,$each_cci->exporterbank,$each_cci->pif_inspectiondate,
                $each_cci->exportersname,$each_cci->descriptionofgoods,$each_cci->hscode,$each_cci->pif_quantity,
                number_format($each_cci->pif_unitprice,4),
                $each_cci->shipdate,$each_cci->destination,$each_cci->exitport,$each_cci->pointofexit,$each_cci->importerbank,
               number_format(($each_cci->pif_valueofgoods * $each_cci->pif_exchange_rate),4),
                number_format($each_cci->pif_ness_charge_payable,4),
                number_format($each_cci->pif_valueofgoods,4),number_format($dollar,4),number_format($Euro,4),number_format($GBP,4),
                $each_cci->pif_exchange_date,
                $strdate,$each_cci->pif_receipt_no,$each_cci->pif_exchange_rate,


            ]);
            $sno++;

        }
        fclose($handle);

        //download command
        return Response::download($filename, "download.csv", $headers);
    }
}
