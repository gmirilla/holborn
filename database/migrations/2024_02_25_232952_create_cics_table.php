<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cics', function (Blueprint $table) {
            $table->id();
            $table->string('cci_id');
            $table->string('nxpform_no');
            $table->string('nepc_no');
            $table->string('year');
            $table->string('hscode');
            $table->string('origin');
            $table->date('date');
            $table->string('importersname');
            $table->string('importersaddress');
            $table->string('exportersname');
            $table->string('exportersaddress');
            $table->string('rc_no');
            $table->string('exporterbank');
            $table->string('importerbank');
            $table->string('exporterbank_ref');
            $table->string('importerbank_ref');
            $table->string('descriptionofgoods');
            $table->string('basisofsale');
            $table->string('units');
            $table->string('quantity');
            $table->string('unitprice');
            $table->string('exp_invoice');
            $table->timestamp('invoice_date');
            $table->string('payment_terms');
            $table->string('exporterinvoicevalue');
            $table->string('freightcharges');
            $table->string('insurance');
            $table->string('totalvalue');
            $table->string('shipdate');
            $table->string('shipagent');
            $table->string('vessel');
            $table->string('loadingno');
            $table->string('exitport');
            $table->string('destination');
            $table->string('container_no');
            $table->string('pif_hscode');
            $table->string('pif_description');
            $table->string('pif_units');
            $table->string('pif_inspectiondate');
            $table->string('pif_quantity');
            $table->string('pif_unitprice');
            $table->string('pif_pakaging');
            $table->string('pif_gweight');
            $table->string('pif_quality');
            $table->string('pif_nweight');
            $table->string('pif_valueofgoods');
            $table->string('pif_valueinwords');
            $table->string('pif_freightcharges');
            $table->string('pif_insurance');
            $table->string('pif_bos');
            $table->string('pif_forexproc');
            $table->string('pif_exchange_date');
            $table->string('pif_currency');
            $table->string('pif_exchange_rate');
            $table->string('pif_ness_charge_payable');
            $table->string('pif_receipt_no');
            $table->string('pif_actual_ness_charges');
            $table->string('pif_balance_paid');
            $table->string('pif_receopt_no2');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cics');
    }
};
