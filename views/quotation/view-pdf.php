<?php

use yii\helpers\Html;
use yii\widgets\DetailView;



/* @var $this yii\web\View */
/* @var $model app\models\table\Quotation */
?>

    
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <meta charset="utf-8">
    </head>
        <style>
    @media print {.tableServicePdf .total {
                background-color: #808080 !important;
                -webkit-print-color-adjust: exact; 
    }}
    @media print {.tableServicePdf tr td   {
                background-color: #d9d9d9 !important;
                text-transform: capitalize;
                -webkit-print-color-adjust: exact; 
    }}
    @media print {.tableServicePdf .headerService th {
                background-color: #808080 !important;
                -webkit-print-color-adjust: exact; 
    }}
    @media print {.vendorListHeading th {
    color: white !important;
    }}
            @font-face {
    font-family: myFirstFont;
    src: url(../fonts/Montserrat/Montserrat-VariableFont_wght.ttf);
    font-weight: sans-serif;
  }
  *{
    font-family: myFirstFont;
    font-size: 11px;
  }
  .tableQuotationPdf .header{
    width: 70%;
  }

  .table-quot {
    font-size: 1.1rem;
  }
  .footerGenPdf {
    border: 1px solid black;
    padding : 20px;
  }
  .table-borderede > thead > tr > th,
.table-borderede > tbody > tr > th,
.table-borderede > thead > tr > td,
.table-borderede > tbody > tr > td,
.table-bordered > tfoot > tr > td
.table-bordered > tfoot > tr > tth{
   border: 0.5px solid #000000;
}

  .stamplePdf{ 
    margin-top:20px;
    width: 100%;
    height: 120px;
    
    position: relative;
  }
  .contentStample{
    position: absolute;
    left: 90%;
    margin-top: 15px;
    width: 7rem;
    
  }
  .headerStample{
    position: absolute;
    left: 90%;
    width: 7rem;
    text-align: center;
    
  }
  .table-bordered thead {
    border-color: black;
  }
  .stamplePdf .footerStample{
    position: absolute;
    left: 90%;
    margin-top: 80px;
    width: 7rem;
    text-align: center;
    
  }
  .tableServicePdf {
    position: relative;
  }
  .tableServicePdf tr td {
    background-color: #d9d9d9;
    text-transform: capitalize;
  }
  .tableServicePdf .total {
    background-color: #808080;
    text-transform: uppercase;
    font-weight: 900;
    text-align: center;
    print-color-adjust: exact;
  }
  .tableServicePdf .headerService th{
    background-color: #808080;
    text-transform: capitalize;
  }
  
  .content-devider{
    width: 100%;
    height: 12px;
    color: black;
  }
  .footerGenPdf .contentFoot {
    margin-top: 40px;
  }
  .footerGenPdf .offerBy{
    margin-top: -10px;
    font-weight: bold;
  }
  .footerGenPdf .contentFoot p {
    margin-bottom: 0;
    font-weight: bold;
  }
        </style>
    <body>
        <div class="header" style="margin-bottom : 10px;">
        <img src="img/kop_surat.png" width="100%" style="" alt="">
        </div>
        

    <div class="tableQuotationPdf">
        <div class="table-quot">
            <table>
                <tr>
                    <td class="header font-weight-bold">Date</td>
                    <td>: <?= $model->date_quotation?></td>
                </tr>
                <tr>
                    <td class="header font-weight-bold">No Quotation</td>
                    <td>: <?= $model->no_quotation?></td>
                </tr>
                    <td class="header font-weight-bold pt-4">Company Name</td>
                    <td class="pt-4">: <?= $model->name_company?></td>
                </tr>
                <tr>
                    <td class="header font-weight-bold">Contact Person</td>
                    <td>: <?= $model->contact_person?></td>
                </tr>   
                <tr>
                    <td class="header font-weight-bold">Company Address</td>
                    <td>: <?= $model->company_address?></td>
                </tr>  
                </tr>
                    <td class="header font-weight-bold pt-4">Service Type</td>
                    <td class="pt-4">: <?= $model->service_type?></td>
                </tr>
                </tr>
                    <td class="header font-weight-bold">Offered By</td>
                    <td>: <?= $model->offered_by?></td>
                </tr>
                </tr>
                    <td class="header font-weight-bold">Offered To</td>
                    <td >: <?= $model->offered_to?></td>
                </tr>
            </table>
        </div>
    </div>
         <div class="tableServicePdf mt-5">
         <table class="table table-borderede">
  <thead>
    <tr class="headerService">
      <th scope="col">No</th>
      <th scope="col">Name Service</th>
      <th scope="col">Description</th>
      <th scope="col">Registration Fee</th>
    </tr>
  </thead>
  <tbody>
  <?php 
            $no = 1;
            $sum = 0;
            for ($i=0; $i < count($result); $i++) { 
                $table = $result[$i]->service;
                
                foreach ($table as $key) {
                    $sum += $key->registration_fee;
                    ?>
    <tr>
      <td scope="row"><?= $no++ ?></td>
      <td width="40%"><?= $key->service_name ?></td>
      <td><?= $key->service_description ?></td>
      <td>Rp <?= $key->registration_fee ?></td>
    </tr>
    <?php }} ?>
  </tbody>
  <tfoot>
    <tr class="">
      <th scope=""></th>
      <th></th>
      <td class="font-weight-bold total">Total</td>
      <td>Rp <?= $sum ?></td>
    </tr>
  </tfoot>
</table>
    </div>
    <div class="termsCondition mt-4">
        <div class="header-termsCondition">
            <h6 class="font-weight-bold">Terms & Condition</h6>
        </div>
        <div class="content-termsCondition">
            <li type="1">Price above exclude tax</li>
            <li type="1">This offer is valid for 1 week from the offer date</li>
            <li type="1">Delivery time 14 working days, since payment recived</li>
            <li type="1">Prepaid service</li>
            <li type="1">Bank Account in the name of PT Dewata Telematika
                <span>
                    <ul type="none">
                        <li>BCA : 7725158181</li>
                        <li>BNI : 3617233333</li>
                        <li>BPD : 0300111000110</li>
                    </ul>
                </span>
            </li>
        </div>
    </div>
    <div class="stamplePdf">
        <div class="headerStample">
            <p class="font-weight-bold text-center">Prepared By</p>
        </div>
        <div class="contentStample">
            <p class="font-weight-bold text-center"><?= $model->date_quotation ?></p>
        </div>
        <div class="footerStample">
            <p class="font-weight-bold text-center"><?= $model->offered_by ?></p>
        </div>
    </div>
    <div class="footerGenPdf">
        <div class="headerFoot">
            <p>*The above fees * terms / conditions are understood and we confirm this order</p>
            <p class="offerBy"><?= $model->offered_by ?></p>
        </div>
        <div class="contentFoot">
            <p>Approved By</p>
            <table>
                <tr>
                    <td width = '100px'>
                        Name
                    </td>
                    <td>
                        :  <?= $model->offered_by ?>
                    </td>
                </tr>
                <tr>
                    <td width = '100px'>
                        Date
                    </td>
                    <td>
                        : <?= date('d-M-Y'); ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    </body>
    <div class="none"></div>

</html>
