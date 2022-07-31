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
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
            
            margin-bottom: 40px;
        }
        #table-table{
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
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
        }
        .table1 td , .table1 th{
            border: 1px solid black;
        }
        .table-full td , .table1 th {
            border: 1px solid black;
        }
       #table-table td, #table-table th {
            border: 1px solid black;

       }
       #table-table th {
            background-color: #999;
       }
       #table-table td {
            background-color: #c7c7c7;
       }
    

        </style>
    
    </head>
    
    <body>
            

    <div class="contain-table">
<div class="table-full">
    <h3 style="background-color: #999;padding: 10px;margin-bottom:0px;border-radius:2px;">Table Information</h3>
    <table class="table table-bordered" style="padding: 20px; border-collapse:collapse;border: 1px solid black; width:100%;">
        <tbody>
            <tr>
                <td width="60%" style="font-weight: bold;">ID</td>
                <td><?= $model->id ?></td>
            </tr>
            <tr>
                <td width="60%" style="font-weight: bold;">DATE</td>
                <td><?= $model->date ?></td>
            </tr>
            <tr>
                <td width="60%" style="font-weight: bold;">NO QUOT</td>
                <td><?= $model->no_quotation ?></td>
            </tr>
        </tbody>
    </table>
</div>
<div class="row">
<div class="table1" style="float: right; width: 50%;">
    <h3 style="background-color: #999;padding: 10px;margin-bottom:0px;border-radius:2px; width:100%;">Company Information</h3>
    <table class="table table-bordered" style="padding: 20px; border-collapse:collapse;border: 1px solid black; width:100%;">
        <tbody>
            <tr>
                <td width="60%" style="font-weight: bold;">Name</td>
                <td><?= $model->name_company ?></td>
            </tr>
            <tr>
                <td width="60%" style="font-weight: bold;">Contact Person</td>
                <td><?= $model->contact_person ?></td>
            </tr>
            <tr>
                <td width="60%" style="font-weight: bold;">Address</td>
                <td><?= $model->company_address ?></td>
            </tr>
            <tr>
                <td width="60%" style="font-weight: bold;">Service Type</td>
                <td><?= $model->service_type ?></td>
            </tr>
        </tbody>
    </table>
</div>
<div class="table1">
    <h3 style="background-color: #999;padding: 10px;margin-bottom:0px;border-radius:2px;width:90%;">Offer</h3>
    <table class="table table-bordered" style="padding: 20px; border-collapse:collapse;border: 1px solid black; width:96%;">
        <tbody>
            <tr>
                <td width="60%" style="font-weight: bold;">Offered by</td>
                <td><?= $model->offered_by ?></td>
            </tr>
            <tr>
                <td width="60%" style="font-weight: bold;">Offered to</td>
                <td><?= $model->offered_to ?></td>
    </tr>
        </tbody>
    </table>
</div>
</div>
</div>
        </div> 
            <table class=""  width="90%" id="table-table" style="margin-top:20px; margin-bottom:10px;">
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
                    <td><?php print_r($sum); ?></td>
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

        
        <table class="border-0"  id="table-form" style="font-size:12px; ;">
            <tr><td><h3 style="margin-top: 20px;">Terms & Condition</h3></td></tr>
            <tr>
                <td>1. Price above exclude tax</td>
            </tr>
            <tr>
                <td>2. This offer is valid for 1 week from the offer date</td>
            </tr>
            <tr>
                <td>3. Delivery time 14 working days, since payment recived</td>
            </tr>
            <tr>
                <td>4. prepaid service</td>
               
              
               
            </tr>
            <tr>
                <td>BCA : 7725158181</td>
            </tr>
            <tr>
            <td>BNI  : 3617233333</td>
            </tr>
            <tr>
            <td>BPD : 0300111000110</td>    
                
            </tr>
            
        </table>


           </div> 
         
    
        <div style="width: 30%; text-align: center; float: right; font-size:14px;"><?= ucwords($model->offered_by);?></div><br>
            <div style="width: 30%; text-align: center; float: right;font-size:14px;">Denpasar, <?= date('d-M-Y')?></div><br><br><br><br>
            <div style="width: 30%; text-align: center; float: right;font-size:14px;"><?= ucwords($model->offered_by);?></div>
        <br>
        <hr>
        <table class=""  id="">    
        <tr>
            <td width="20%" style="font-size:10px;">*The above fees & terms / conditions are understood and we confirm this order</td>
        </tr>
        <tr>
            <td width="20%" style="font-size:10px; "><?= $model->name_company ?></td>
        </tr>
            
    </table>
        <br><br>
        <br>
    <table class=""  id="">    
        <tr>
            <td width="40%" style="width:100%; font-weight:bolder; font-size:12px; ">Approved by</td>
        </tr>
    
        <tr>
            <td width="20%" style="font-size:10px;">Name :</td>
            <td style="font-size:10px;"><?= $model->offered_by ?></td>
        </tr>
        <tr>
            <td width="20%" style="font-size:10px;">Date :</td>
            <td style="font-size:10px;"><?= date('d-M-Y') ?></td>
        </tr>
            
    </table>
        
    <div class="quotation-view">



</div>

    </body>

</html>
