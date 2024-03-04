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
     public function get_csv(){

        $ccis = cic::get();

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
            "INT REF NO.",
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
            "GROSS WEIGHT",
            "GROSS WEIGHT (MT)",
            "DESIGNATED BANK",
            "FOB VALUE NAIRA",
            "NESS FEE NAIRA(0.5% OF FOB)",
            "FOB VALUE",
            "USD",
            "EUR",
            "GBP",
            "FOB CURRENCY",
            "CONVERT",
            "USD EQUIVALENT",
            "NESS CHARGES PAID ON NXP (N)",
            "NESS FEE IN NAIRA",
            "INSPECTION FEE (N)",
            "UNIT PRICE",
            "NESS RECPT DATE",
            "REPATRIATION DATE",
            "RECEIPT NO. 1",
            "EXCHANGE RATE",
        ]);

        //adding the data from the array
        $sno=1;
        foreach ($ccis as $each_cci) {

            fputcsv($handle, [
                $sno,'n/a',
                $each_cci->cci_id,'n/a',$each_cci->date,
                $each_cci->nxpform_no,$each_cci->exporterbank,$each_cci->pif_inspectiondate,
                $each_cci->exportersname,$each_cci->descriptionofgoods,$each_cci->hscode,
                $each_cci->shipdate,$each_cci->destination,$each_cci->exitport,$each_cci->pif_gweight,
                $each_cci->pif_gweight,'n/a',$each_cci->currency,$each_cci->currency,'n/a','n/a',
                $each_cci->pif_ness_charge_payable,
                'n/a','n/a','n/a',
                'n/a',$each_cci->pif_unitprice,'Ness RDate',
                $each_cci->pif_exchange_date,$each_cci->pif_receipt_no,$each_cci->pif_exchange_rate,


            ]);
            $sno++;

        }
        fclose($handle);

        //download command
        return Response::download($filename, "download.csv", $headers);
    }
}
