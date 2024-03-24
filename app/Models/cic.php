<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cic extends Model
{
    use HasFactory;

    protected $fillable = [
        'cci_id',
        'nxpform_no','date',
        'nepc_no',
        'year',
        'hscode',
        'origin',
        'importersname',
        'importersaddress',
        'exportersname','exportersaddress',
        'rc_no', 'exporterbank',
        'importerbank','exporterbank_ref',
        'importerbank_ref', 'descriptionofgoods',
        'basisofsale','units','quantity',
        'unitprice','exp_invoice',
        'invoice_date','payment_terms', 'currency',
        'exporterinvoicevalue','freightcharges','insurance',
        'totalvalue','shipdate','shipagent','vessel', 'loadingno',
        'exitport','destination', 'container_no', 
        'pif_hscode', 'pif_description','pif_units',
        'pif_inspectiondate','pif_quantity','pif_unitprice',
        'pif_pakaging','pif_gweight','pif_quality','pif_nweight',
        'pif_valueofgoods','pif_valueinwords', 'pif_freightcharges','pif_insurance',
        'pif_bos', 'pif_forexproc','pif_exchange_date', 'pif_currency',
         'pif_exchange_rate', 'pif_ness_charge_payable', 'pif_receipt_no',
         'pif_actual_ness_charges', 'pif_balance_paid', 'pif_receopt_no2',
         'status','created_by', 'approved_by','pointofexit','appr_date'



    ];
}
