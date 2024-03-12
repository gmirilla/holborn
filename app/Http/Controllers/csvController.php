<?php

namespace App\Http\Controllers;

use App\Models\cic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;

class csvController extends Controller
{
     //
     public function get_csv(Request $request){


        if ($request->name==Null) {
            $ccis = cic::whereBetween('date', [$request->datefrom, $request->dateto])->where('status', 'APPROVED')->get();
        }
        else {
            $search=strtoupper($request->name);
            $ccis = cic::whereBetween('date', [$request->datefrom, $request->dateto])->where('status', 'APPROVED')
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
            "NXP NO",
            "NXP ISSUING BANK",
            "INSPECTION DATE",
            "EXPORTER NAME",
            "EXPORTED PRODUCTS",
            "HS CODE",
            "SHIPMENT DATE",
            "COUNTRY OF DESTINATION",
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
            $dollar=0; $GBP=0; $Euro=0;
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

            fputcsv($handle, [
                $sno,
                $each_cci->cci_id,'n/a',$each_cci->date,
                $each_cci->nxpform_no,$each_cci->exporterbank,$each_cci->pif_inspectiondate,
                $each_cci->exportersname,$each_cci->descriptionofgoods,$each_cci->hscode,
                $each_cci->shipdate,$each_cci->destination,$each_cci->exitport,$each_cci->importerbank,$each_cci->pif_valueofgoods * $each_cci->pif_exchange_rate,
                $each_cci->pif_ness_charge_payable,$each_cci->pif_valueofgoods,$dollar,$Euro,$GBP,$each_cci->pif_exchange_date,
                $each_cci->pif_exchange_date,$each_cci->pif_receipt_no,$each_cci->pif_exchange_rate,


            ]);
            $sno++;

        }
        fclose($handle);

        //download command
        return Response::download($filename, "download.csv", $headers);
    }
}
