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
        <style>
            * {
                font-family:Arial, Helvetica, sans-serif;
            }
            .line {
                margin-top: -12px;
                border: 0.5px solid grey;
            }
           #header {
                max-height: 12rem;
                margin-bottom: 15px;
                border-collapse: collapse;
               
            }


        .header-content {
            position: relative;
            font-size: 12px;
        }
        
        #table-form {
            margin-bottom: 40px;
            font-family:Arial, Helvetica, sans-serif;
        }
        #table-table{
            font-family:Arial, Helvetica, sans-serif;
            margin: auto;
            width: 100%;
            border-collapse: collapse;
        }
        #table-table ,thead,tbody {
            border: 1px solid black;
        }
        #table-table tbody {
            border: 1px solid black;
            text-align: left;
        }
        #table-table>thead>th{
            border: 1px solid black;
        }
        .row {
            display: block;
        }
        .contain-table {
            position: relative;
            font-family:Arial, Helvetica, sans-serif;
        }
        .table1 td , .table1 th{
            border: 1px solid black;
            font-family:Arial, Helvetica, sans-serif;
        }
        .table-full td , .table1 th {
            border: 1px solid black;
            font-family:Arial, Helvetica, sans-serif;
        }
       #table-table td, #table-table th {
            border: 1px solid black;
            font-family:Arial, Helvetica, sans-serif;

       }
       #table-table th {
            background-color: #d5dce2;
            font-family:Arial, Helvetica, sans-serif;
       }
    

        </style>
    
    </head>
    
    <body>
        <div class="header" style="margin-bottom : 10px;">
        <img src="img/kop_surat.png" width="100%" style="" alt="">
        </div>
        

    <div class="contain-table">
<div class="table-full" style="margin-bottom:15px;">
    <table class="table table-bordered" style="font-size:15px;padding: 20px; border-collapse:collapse;border: 1px solid black; width:100%;">
        <tbody>
            <tr>
                <td width="50%" style="font-weight: bold; background-color: #d5dce2;border:1px solid black;outline: 0.1em solid darkgray;padding: 7px;">DATE</td>
                <td width="50%" style="padding: 7px;"><?= $model->date ?></td>
            </tr>
            <tr>
                <td width="50%" style="font-weight: bold;background-color: #d5dce2;border:1px solid black;outline: 0.1em solid darkgray;padding: 7px;">NO QUOT</td>
                <td style="padding: 7px;"><?= $model->no_quotation ?></td>
            </tr>
        </tbody>
    </table>
</div>
<div class="row" style="">
<div class="table1" style="float: left; width: 52%">
    <table class="table table-bordered" style="font-size:15px;padding: 20px; border-collapse:collapse;border: 1px solid black; width:97%;">
        <tbody>
            <tr>
                <td width="50%" style="font-weight: bold;background-color: #d5dce2;border:1px solid black;outline: 0.1em solid darkgray;padding: 7px;">Name</td>
                <td style="padding: 7px ;"><?= $model->name_company ?></td>
            </tr>
            <tr>
                <td width="50%" style="font-weight: bold;background-color: #d5dce2;border:1px solid black;outline: 0.1em solid darkgray;padding: 7px;">Contact Person</td>
                <td style="padding: 7px ;"><?= $model->contact_person ?></td>
            </tr>
            <tr>
                <td width="50%" style="font-weight: bold;background-color: #d5dce2;border:1px solid black;outline: 0.1em solid darkgray;padding: 7px;">Address</td>
                <td style="padding: 7px ;"><?= $model->company_address ?></td>
            </tr>
            <tr>
                <td width="50%" style="font-weight: bold; background-color: #d5dce2;border:1px solid black;outline: 0.1em solid darkgray;padding: 7px;">Service Type</td>
                <td style="padding: 7px ;"><?= $model->service_type ?></td>
            </tr>
        </tbody>
    </table>
</div>
<div class="table1" style="float:right">
    <table class="table table-bordered" style="font-size:15px;padding: 20px; border-collapse:collapse;border: 1px solid black; width:100%;">
        <tbody>
            <tr>
                <td width="50%" style="font-weight: bold;background-color: #d5dce2;border:1px solid black;outline: 0.1em solid darkgray;padding: 7px;">Offered by</td>
                <td style="padding: 7px ;"><?= $model->offered_by ?></td>
            </tr>
            <tr>
                <td width="50%" style="font-weight: bold;background-color: #d5dce2;border:1px solid black;outline: 0.1em solid darkgray;padding: 7px;">Offered to</td>
                <td style="padding: 7px ;"><?= $model->offered_to ?></td>
    </tr>
        </tbody>
    </table>
</div>
</div>
</div>
        </div> 
            <table class=""  width="90%" id="table-table" style="font-size:15px;margin-top:20px;font-family:Arial, Helvetica, sans-serif; margin-bottom:10px;">
                <thead>
                <tr>
                    <th width="20px" style="padding: 10px;">NO</th>
                    <th width="150px">Name</th>
                    <th width="300px">Description</th>
                    <th>Status</th>
                    <th>Regis fee</th>
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
                    <td style="padding: 5px;"><?= $no++ ?></td>
                    <td style="padding: 5px;"><?= $key->service_name ?></td>
                    <td style="padding: 5px;"><?= $key->service_description ?></td>
                    <td style="padding: 5px;"><?= $key->service_status ?></td>
                    <td style="padding: 5px;"><?= $key->registration_fee ?></td>

                </tr>
            <?php }} 
            if ($sum > 0) {?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="padding: 10px;">TOTAL</td>
                    <td style="padding: 5px;"> <?php print_r($sum); ?></td>
                </tr>
            <?php } 
            else {
            ?>
            <tr>
                <td></td>
                <td>EMPTY DATA</td>
            </tr>
            <?php } ?>
            </tbody>
            </table>

            <div class="row" style="margin-top:25px;">
<div class="table1" style="float: left; width: 52%">
    <table class="table table-bordered" style="font-size:15px;padding: 20px; border-collapse:collapse;border: 1px solid black; width:97%;">
        <tbody>
            <tr>
                <td width="50%" style="font-weight: bold;background-color: #d5dce2;border:1px solid black;outline: 0.1em solid darkgray;padding: 7px;">Name</td>
                <td style="padding: 7px ;"><?= $model->name_company ?></td>
            </tr>
            <tr>
                <td width="50%" style="font-weight: bold;background-color: #d5dce2;border:1px solid black;outline: 0.1em solid darkgray;padding: 7px;">Contact Person</td>
                <td style="padding: 7px ;"><?= $model->contact_person ?></td>
            </tr>
            <tr>
                <td width="50%" style="font-weight: bold;background-color: #d5dce2;border:1px solid black;outline: 0.1em solid darkgray;padding: 7px;">Address</td>
                <td style="padding: 7px ;"><?= $model->company_address ?></td>
            </tr>
            <tr>
                <td width="50%" style="font-weight: bold; background-color: #d5dce2;border:1px solid black;outline: 0.1em solid darkgray;padding: 7px;">Service Type</td>
                <td style="padding: 7px ;"><?= $model->service_type ?></td>
            </tr>
        </tbody>
    </table>
</div>
<div class="table1" style="float:right">
    <table class="table table-bordered" style="font-size:15px;padding: 20px; border-collapse:collapse;border: 1px solid black; width:100%;">
        <tbody>
            <tr>
                <td width="50%" style="font-weight: bold;background-color: #d5dce2;border:1px solid black;outline: 0.1em solid darkgray;padding: 7px;">Offered by </td>
                <td style="padding: 7px ;"><?= $model->offered_by ?></td>
            </tr>
            <tr>
                <td width="50%" style="font-weight: bold;background-color: #d5dce2;border:1px solid black;outline: 0.1em solid darkgray;padding: 7px;">Offered to</td>
                <td style="padding: 7px ;"><?= $model->offered_to ?></td>
    </tr>
        </tbody>
    </table>
</div>
</div>

        
       

           </div> 
         
   
    
    <div class="quotation-view">



</div>

    </body>

</html>
