<?php
namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;


use App\Models\cic;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Currency;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class CicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cicList=cic::paginate(15);

        return view('certificate.newcert_dashboard')->with('ccilist', $cicList);
        
    }

        /**
     * Display a listing of the resource.
     */
    public function homeDashboard()
    {
        $cicList=cic::all();

        return view('dashboard')->with('ccilist', $cicList);
        
    }

     /**
     * Show the list of certificate awaiting VALIDATION
     */
    public function toValidate()
    {
        //
        $cicList=cic::where('status','SUBMITTED')->orderBy('updated_at')->get();
        $qmode='VALIDATED';
        return view('certificate.newcert_approve')->with('ccilist', $cicList)->with('qmode',$qmode);
    }

    /**
     * Show the list of certificate awaiting approval
     */
    public function toApprove()
    {
        //
        $cicList=cic::where('status','VALIDATED')->orderBy('updated_at')->get();
        $qmode='APPROVED';
        return view('certificate.newcert_approve')->with('ccilist', $cicList)->with('qmode',$qmode);
    }

    public function getcciwa(Request $request)
    {
        $qmode=$request->mode;
        if($qmode=='VALIDATED'){
            $mode='SUBMITTED';
        }
        elseif($qmode=='APPROVED'){
            $mode='VALIDATED';
        }

        if ($request->name==Null) {
            $cicList = cic::whereBetween('date', [$request->datefrom, $request->dateto])->where('status', $mode)->get();
        }
        else {
            $search=strtoupper($request->name);
            $cicList = cic::whereBetween('date', [$request->datefrom, $request->dateto])->where('status', $mode)
            ->where('exportersname','LIKE', "%{$search}%")->get();
        }

/** 
        if (isset($request->datefrom) ){
            $cicList=cic::where('status','SUBMITTED')
            ->where('date','>=', $request->datefrom)
            ->where('date','<=', $request->dateto)
            ->orderBy('updated_at')->get();
        }
        else{
            $cicList=cic::where('status','SUBMITTED')
            ->where('date','<=', $request->dateto)
            ->orderBy('updated_at')->get();
        }
 */
        return view('certificate.newcert_approve')->with('ccilist', $cicList)->with('qmode',$qmode);
    }

        /**
     * Show the list of certificate with approval
     */
    public function showApprove(Request $request)
    {
        //
        $cicList=cic::where('status','APPROVED')->orderBy('updated_at')->get();
        
        return view('certificate.newcert_view_approved')->with('ccilist', $cicList);
    }


    /**
     * quick certificate approval
     */
    public function qapprove(Request $request)
    {
        $cic=cic::find($request->id);
        $user= User::find(Auth::id());
        if($cic->status=='SUBMITTED'){
            $cic->approved_by=$user->name;
            $cic->status='APPROVED';
            $cic->save();

        }

        $cicList=cic::where('status','SUBMITTED')->orderBy('updated_at')->get();

    
        return view('certificate.newcert_approve')->with('ccilist', $cicList);
    }

    public function qreject(Request $request)
    {
        $cic=cic::find($request->id);
        $user= User::find(Auth::id());
        if($cic->status=='SUBMITTED'){
            $cic->approved_by=$user->name;
            $cic->status='REJECTED';
            $cic->save();

        }

        $cicList=cic::where('status','SUBMITTED')->orderBy('updated_at')->get();

    
        return view('certificate.newcert_approve')->with('ccilist', $cicList);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(cic $cic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cic $cic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cic $cic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cic $cic)
    {
        //
    }

    /**
     * FIRST STEP IN CREATING NEW CCI. accepts/validates fields related to the exporters declaration
     */
    public function createStep1(Request $request)
    {
        try {

    
        //Get the Currently logged in User
        $user= User::find(Auth::id());

        $curr=Currency::all();

        $cic = new cic();
        //dd($curr);

        // Available alpha caracters
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $alpha = $characters[rand(0, strlen($characters) - 1)];
        $pin = mt_rand(1000000, 9999999) . mt_rand(1000000, 9999999);
        $year = date('Y');
        $numeric = str_shuffle($pin);
        $cic->cci_id = $alpha . '/' . $year . '/' . $numeric;
        $cic->year = $year;
        $cic->status = 'DRAFT';
        $cic->created_by = $user->name;
        
    
       return view('certificate.newcert_expd')->with('cci',$cic)->with('curr',$curr);
        }
        catch (\Throwable $th) {
            return redirect('/printerror');
           } 
    }
        /**
     * Second  STEP IN CREATING NEW CCI.aSHIPPING DETAILS 
     * 1. accepts/validates fields related to the declared shipping details
     * 2. Stores values into session
     * 3. Handles the Post action of the first step
     */
    public function postcreateStep1(Request $request)
    {


        $expdetails=new cic();

        //Get the Currently logged in User
        $user= User::find(Auth::id());
        
        
        $validatedData = $request->validate([
        'nxpform_no' => 'required',
        'nepcno' => 'required',
        'year' => 'required|numeric',
        'hscode' => 'required',
        'origin' => 'required',
        'importersname' => 'required',
        'importersaddress' => 'required',
        'exportersname'=> 'required',
        'exportersaddress'=> 'required',
        'rc_no'=> 'required', 
        'exportersbank'=> 'required',
        'importersbank'=> 'required',
        'exporterbank_ref'=> 'required',
        'importerbank_ref'=> 'required', 
        'descriptionofgoods'=> 'required',
        'basisofsale'=> 'required',
        'units'=> 'required',
        'quantity'=> 'required',
        'unitprice'=> 'required','exp_invoice'=> 'required',
        'invoice_date'=> 'required','payment_terms'=> 'required', 'currency'=> 'required',
        'exporterinvoicevalue'=> 'required|numeric','freightcharges'=> 'required|numeric','insurance'=> 'required|numeric',
        'totalvalue'=> 'required|numeric'
        ]);
      
        


        $expdetails->nxpform_no = $request->nxpform_no;
        $expdetails->cci_id=$request->cci_id;
        $expdetails->year=$request->year; 
        $expdetails->status=$request->status;
        $expdetails->created_by=$user->name;
        $expdetails->nepc_no = $request->nepcno;
        $expdetails->year = $request->year;
        $expdetails->date = $request->date;
        $expdetails->hscode = $request->hscode;
        $expdetails->origin = $request->origin;
        $expdetails->importersname = $request->importersname;
        $expdetails->importersaddress = $request->importersaddress;
        $expdetails->importerbank = $request->importersbank;
        $expdetails->importerbank_ref = $request->importerbank_ref;
        $expdetails->exportersname = $request->exportersname;
        $expdetails->exportersaddress = $request->exportersaddress;
        $expdetails->exporterbank = $request->exportersbank;
        $expdetails->rc_no = $request->rc_no;
        $expdetails->exporterbank_ref = $request->exporterbank_ref;
        $expdetails->descriptionofgoods = $request->descriptionofgoods;
        $expdetails->basisofsale = $request->basisofsale;
        $expdetails->units = $request->units;
        $expdetails->quantity = $request->quantity;
        $expdetails->unitprice = $request->unitprice;
        $expdetails->exp_invoice = $request->exp_invoice;
        $expdetails->invoice_date = $request->invoice_date;
        $expdetails->payment_terms = $request->payment_terms;
        $expdetails->currency= $request->currency;
        $expdetails->exporterinvoicevalue = $request->exporterinvoicevalue;
        $expdetails->freightcharges = $request->freightcharges;
        $expdetails->insurance = $request->insurance;
        $expdetails->totalvalue = $request->totalvalue;
     

        $expdetails->save();



        return view('certificate.newcert_shipd')->with('cci',$expdetails);
    }

    /**
     * Second  STEP IN CREATING NEW CCI. SHIPPING DETAILS
     * 1. accepts/validates fields related to the declared shipping details
     * 2. Stores values into session
     */
    public function postcreateStep2(Request $request)
    {
        $validatedata= $request->validate([ 
            'shipdate'=>'required',
            'shipagent'=>'required',
            'vessel'=>'required',
            'loadingno'=>'required',
            'exitport'=>'required',
            'destination'=>'required'


        ]);
        try{
    
        $shpdetails=cic::find($request->id);

        $shpdetails->shipdate = $request->shipdate;
        $shpdetails->shipagent = $request->shipagent;
        $shpdetails->vessel = $request->vessel;
        $shpdetails->loadingno = $request->loadingno;
        $shpdetails->exitport = $request->exitport;
        $shpdetails->destination = $request->destination;


        $shpdetails->save(); 

        $curr=Currency::all();
       return view('certificate.newcert_inspd')->with('cci',$shpdetails)->with('curr',$curr);
        }
     catch (\Throwable $th) {
        return redirect('/printerror');
       } 
        
    }
    /**
     * Third STEP IN CREATING NEW CCI. 
     * 1. accepts/validates fields related to the Pre shipment inspection findings
     * 2. Stores Values in session
     */
    public function postcreateStep3(Request $request)
    {
        
        $pinspdetails = cic::find($request->id);
        $pinspdetails->pif_hscode = $request->pif_hscode;
        $pinspdetails->pif_description = $request->pif_description;
        $pinspdetails->pif_units = $request->pif_units;
        $pinspdetails->pif_inspectiondate = $request->pif_inspectiondate;
        $pinspdetails->pif_quantity = $request->pif_quantity;
        $pinspdetails->pif_unitprice = $request->pif_unitprice;
        $pinspdetails->pif_pakaging = $request->pif_pakaging;
        $pinspdetails->pif_gweight = $request->pif_gweight;
        $pinspdetails->pif_quality = $request->pif_quality;
        $pinspdetails->pif_nweight = $request->pif_nweight;
        $pinspdetails->pif_valueofgoods = $request->pif_valueofgoods;
        $pinspdetails->pif_valueinwords = $request->pif_valueinwords;
        $pinspdetails->pif_freightcharges = $request->pif_freightcharges;
        $pinspdetails->pif_insurance = $request->pif_insurance;
        $pinspdetails->pif_bos = $request->pif_bos;
        $pinspdetails->pif_forexproc = $request->pif_forexproc;
        $pinspdetails->pif_exchange_date = $request->pif_exchange_date;
        $pinspdetails->pif_currency = $request->pif_currency;
        $pinspdetails->pif_exchange_rate = $request->pif_exchange_rate;
        $pinspdetails->pif_ness_charge_payable = $request->pif_ness_charge_payable;
        $pinspdetails->pif_receipt_no = $request->pif_receipt_no;
        $pinspdetails->pif_actual_ness_charges = $request->pif_actual_ness_charges;
        $pinspdetails->pif_balance_paid = $request->pif_balance_paid;
        $pinspdetails->pif_receopt_no2 = $request->if_receopt_no2;
        $pinspdetails->status='SUBMITTED';

        $pinspdetails->save(); 
        $cciList= cic::all();   
       return redirect('dashboard')->with('ccilist',$cciList);
    }

    public function printcert(Request $request)
    {
       // dd($request);

       try {
        $cci=cic::find($request->input('id'));
        if($cci->status=='APPROVED'){
        $qrcols=cic::select('cci_id', 'exportersname','nxpform_no', 'exp_invoice', 'date');
        $jsoncci=json_encode($qrcols);

        return view('certificate.cci_certificate')->with('cci',$cci)->with('jsoncci',$jsoncci);
        }
        else{
            return redirect('/printerror');
            
        }

       } catch (\Throwable $th) {
        return redirect('/printerror');
       } 

    }


    
    public function getcert(Request $request)
    {
        $curr=Currency::all();
        $cci=cic::find($request->input('id'));

        //dd($request);

        return view('certificate.showcert')->with('cci',$cci)->with('curr',$curr);
    }


    public function editcert(Request $request)
    {

        //dd($request);

        //check for validation authority
        $user = User::find(Auth::id());
        $cci = cic::find($request->input('id'));
        $editaction = $request->action;
        switch($editaction){
            case "SUBMIT FOR VALIDATION":
                ##VALIDATE REQUEST DATA
                $validatedData = $request->validate([
                    'nxpform_no' => 'required',
                    'nepcno' => 'required',
                    'year' => 'required|numeric',
                    'hscode' => 'required',
                    'origin' => 'required',
                    'importersname' => 'required',
                    'importersaddress' => 'required',
                    'exportersname' => 'required',
                    'exportersaddress' => 'required',
                    'rc_no' => 'required',
                    'exportersbank' => 'required',
                    'importersbank' => 'required',
                    'exporterbank_ref' => 'required',
                    'importerbank_ref' => 'required',
                    'descriptionofgoods' => 'required',
                    'basisofsale' => 'required',
                    'units' => 'required',
                    'quantity' => 'required',
                    'unitprice' => 'required', 'exp_invoice' => 'required',
                    'invoice_date' => 'required', 'payment_terms' => 'required', 'currency' => 'required',
                    'exporterinvoicevalue' => 'required', 'freightcharges' => 'required', 'insurance' => 'required',
                    'totalvalue' => 'required',
                    'shipdate' => 'required',
                    'shipagent' => 'required',
                    'vessel' => 'required',
                    'loadingno' => 'required',
                    'exitport' => 'required',
                    'destination' => 'required',
                    'pif_hscode' => 'required',
                    'pif_description' => 'required',
                    'pif_units' => 'required',
                    'pif_inspectiondate' => 'required',
                    'pif_quantity' => 'required',
                    'pif_unitprice' => 'required',
                    'pif_pakaging' => 'required',
                    'pif_gweight' => 'required',
                    'pif_quality' => 'required',
                    'pif_nweight' => 'required',
                    'pif_valueofgoods' => 'required',
                    'pif_freightcharges' => 'required',
                    'pif_insurance' => 'required',
                    'pif_bos' => 'required',
                    'pif_forexproc' => 'required',
                    'pif_exchange_date' => 'required',
                    'pif_currency' => 'required',
                    'pif_exchange_rate' => 'required',
                    'pif_ness_charge_payable' => 'required',
                    'pif_receipt_no' => 'required',
                    'pif_actual_ness_charges' => 'required',
                    'pif_balance_paid' => 'required',
                    'pif_receopt_no2' => 'required',

                ]);



                $cci->pif_hscode = $request->pif_hscode;
                $cci->pif_description = $request->pif_description;
                $cci->pif_units = $request->pif_units;
                $cci->pif_inspectiondate = $request->pif_inspectiondate;
                $cci->pif_quantity = $request->pif_quantity;
                $cci->pif_unitprice = $request->pif_unitprice;
                $cci->pif_pakaging = $request->pif_pakaging;
                $cci->pif_gweight = $request->pif_gweight;
                $cci->pif_quality = $request->pif_quality;
                $cci->pif_nweight = $request->pif_nweight;
                $cci->pif_valueofgoods = $request->pif_valueofgoods;
                $cci->pif_valueinwords = $request->pif_valueinwords;
                $cci->pif_freightcharges = $request->pif_freightcharges;
                $cci->pif_insurance = $request->pif_insurance;
                $cci->pif_bos = $request->pif_bos;
                $cci->pif_forexproc = $request->pif_forexproc;
                $cci->pif_exchange_date = $request->pif_exchange_date;
                $cci->pif_currency = $request->pif_currency;
                $cci->pif_exchange_rate = $request->pif_exchange_rate;
                $cci->pif_ness_charge_payable = $request->pif_ness_charge_payable;
                $cci->pif_receipt_no = $request->pif_receipt_no;
                $cci->pif_actual_ness_charges = $request->pif_actual_ness_charges;
                $cci->pif_balance_paid = $request->pif_balance_paid;
                $cci->pif_receopt_no2 = $request->pif_receopt_no2;
                $cci->shipdate = $request->shipdate;
                $cci->shipagent = $request->shipagent;
                $cci->vessel = $request->vessel;
                $cci->loadingno = $request->loadingno;
                $cci->exitport = $request->exitport;
                $cci->destination = $request->destination;
                $cci->nxpform_no = $request->nxpform_no;
                $cci->year = $request->year;
                $cci->status = $request->status;
                $cci->nepc_no = $request->nepcno;
                $cci->year = $request->year;
                $cci->date = $request->date;
                $cci->hscode = $request->hscode;
                $cci->origin = $request->origin;
                $cci->importersname = $request->importersname;
                $cci->importersaddress = $request->importersaddress;
                $cci->importerbank = $request->importersbank;
                $cci->importerbank_ref = $request->importerbank_ref;
                $cci->exportersname = $request->exportersname;
                $cci->exportersaddress = $request->exportersaddress;
                $cci->exporterbank = $request->exportersbank;
                $cci->rc_no = $request->rc_no;
                $cci->exporterbank_ref = $request->exporterbank_ref;
                $cci->descriptionofgoods = $request->descriptionofgoods;
                $cci->basisofsale = $request->basisofsale;
                $cci->units = $request->units;
                $cci->quantity = $request->quantity;
                $cci->unitprice = $request->unitprice;
                $cci->exp_invoice = $request->exp_invoice;
                $cci->invoice_date = $request->invoice_date;
                $cci->payment_terms = $request->payment_terms;
                $cci->currency = $request->currency;
                $cci->exporterinvoicevalue = $request->exporterinvoicevalue;
                $cci->freightcharges = $request->freightcharges;
                $cci->insurance = $request->insurance;
                $cci->totalvalue = $request->totalvalue;

                $cci->status="SUBMITTED";

                break;
            case "SUBMIT FOR APPROVAL":

                if (str_contains($user->role, 'VALIDATOR')){

                    $cci->status="VALIDATED";

                }
                else{
                    $error= "INSUFFECIENT PRIVILEGES. PLEASE CONTACT AN ADMINISTRATOR";
                    return redirect('/printerror')->with('error',$error);


                }

                break;
                case "RESET":

                    if (str_contains($user->role, 'VALIDATOR')){
    
                        $cci->status="DRAFT";
    
                    }
                    else{
                        $error= "INSUFFECIENT PRIVILEGES. PLEASE CONTACT AN ADMINISTRATOR";
                        return redirect('/printerror')->with('error',$error);
    
    
                    }
    
                    break;
    

            case "APPROVAL":
                if (str_contains($user->role, 'APPROVER')){
                $cci->status="APPROVED";
                }
                else{
                    $error= "INSUFFECIENT PRIVILEGES. PLEASE CONTACT AN ADMINISTRATOR";
                    return redirect('/printerror')->with('error',$error);

                }
                break;
                case "PRINT":
                
                return redirect('/newcert/printcert?id='.$cci->id);
                break;

     

        }
        $cci->save();   

        $cci=cic::find($request->input('id'));
        $curr=Currency::all();

        return view('certificate.showcert')->with('cci',$cci)->with('curr',$curr);
    }

    
}
