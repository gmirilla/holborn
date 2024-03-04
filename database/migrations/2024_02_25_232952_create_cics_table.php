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
            $table->string('cci_id')->unique();
            $table->string('nxpform_no')->nullable();
            $table->string('nepc_no')->nullable();
            $table->string('year');
            $table->string('hscode')->nullable();
            $table->string('origin')->nullable();
            $table->date('date')->nullable();
            $table->string('importersname')->nullable();
            $table->string('importersaddress')->nullable();
            $table->string('exportersname')->nullable();
            $table->string('exportersaddress')->nullable();
            $table->string('rc_no')->nullable();
            $table->string('exporterbank')->nullable();
            $table->string('importerbank')->nullable();
            $table->string('exporterbank_ref')->nullable();
            $table->string('importerbank_ref')->nullable();
            $table->string('descriptionofgoods')->nullable();
            $table->string('basisofsale')->nullable();
            $table->string('units')->nullable();
            $table->string('quantity')->nullable();
            $table->string('unitprice')->nullable();
            $table->string('exp_invoice')->nullable();
            $table->timestamp('invoice_date')->nullable();
            $table->string('payment_terms')->nullable();
            $table->string('currency')->nullable();
            $table->string('exporterinvoicevalue')->nullable();
            $table->string('freightcharges')->nullable();
            $table->string('insurance')->nullable();
            $table->string('totalvalue')->nullable();
            $table->string('shipdate')->nullable();
            $table->string('shipagent')->nullable();
            $table->string('vessel')->nullable();
            $table->string('loadingno')->nullable();
            $table->string('exitport')->nullable();
            $table->string('destination')->nullable();
            $table->string('container_no')->nullable();
            $table->string('pif_hscode')->nullable();
            $table->string('pif_description')->nullable();
            $table->string('pif_units')->nullable();
            $table->string('pif_inspectiondate')->nullable();
            $table->string('pif_quantity')->nullable();
            $table->string('pif_unitprice')->nullable();
            $table->string('pif_pakaging')->nullable();
            $table->string('pif_gweight')->nullable();
            $table->string('pif_quality')->nullable();
            $table->string('pif_nweight')->nullable();
            $table->string('pif_valueofgoods')->nullable();
            $table->string('pif_valueinwords')->nullable();
            $table->string('pif_freightcharges')->nullable();
            $table->string('pif_insurance')->nullable();
            $table->string('pif_bos')->nullable();
            $table->string('pif_forexproc')->nullable();
            $table->string('pif_exchange_date')->nullable();
            $table->string('pif_currency')->nullable();
            $table->string('pif_exchange_rate')->nullable();
            $table->string('pif_ness_charge_payable')->nullable();
            $table->string('pif_receipt_no')->nullable();
            $table->string('pif_actual_ness_charges')->nullable();
            $table->string('pif_balance_paid')->nullable();
            $table->string('pif_receopt_no2')->nullable();
            $table->string('status');
            $table->string('created_by');
            $table->string('approved_by')->nullable();;
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
