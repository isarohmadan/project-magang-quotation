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
            font-size: 14px;
            
            margin-bottom: 40px;
        }
        #table-table{
            text-align: center;
            margin: auto;
            width: 100%;
            border-collapse: collapse;
        }
        #table-table ,thead,tbody {
            border: 1px solid black;
        }
        #table-table>thead>th{
            border: 1px solid black;
        }
       
    

        </style>
    
    </head>
    
    <body>
            
            <table class=""  id="table-form">
                <tr>
                    <td width="60%">Date</td>
                    <td>:</td>
                    <td><?php echo date('d-m-Y',strtotime($model->date)); ?></td>
                </tr>
                <tr>
                    <td width="60%">Number Quotation</td>
                    <td>:</td>
                    <td><?= $model->no_quotation ?></td>
                </tr>
                <tr>
                    <td width="60%">Company Name</td>
                    <td>:</td>
                    <td><?= $model->name_company;?></td>
                </tr>
                <tr>
                    <td width="60%">Contact Person</td>
                    <td>:</td>
                    <td><?= $model->contact_person;?></td>
                </tr>
                <tr>
                    <td width="60%">Company Address</td>
                    <td>:</td>
                    <td><?= $model->company_address;?></td>
                </tr>
                <tr>
                    <td width="60%">Service Type</td>
                    <td>:</td>
                    <td><?= $model->service_type;?></td>
                </tr>
                <tr>
                    <td width="60%">Offered By</td>
                    <td>:</td>
                    <td><?= $model->offered_by;?></td>
                </tr>
                <tr>
                    <td width="60%">Offered To</td>
                    <td>:</td>
                    <td><?= $model->offered_to;?></td>
                </tr>
            </table>
        </div>  
            <table class=""  width="90%" id="table-table" style="padding: 20px; border-collapse:collapse;">
                <thead>
                <tr>
                    <th width="20px" style="padding: 20px;">NO</th>
                    <th>Description</th>
                    <th>Capacity</th>
                    <th>Monthly Fee</th>
                    <th>Registration Fee</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $no = 1;
            foreach ($table as $key ) { ?>
                <tr>
                    <td style="padding: 5px;"><?= $no++ ?></td>
                    <td><?= $key['service_description'] ?></td>
                    <td><?= $key['service_status'] ?></td>
                    <td><?= $key['registration_fee'] ?></td>
                    <td><?= $key['registration_fee'] ?></td>
                </tr>
            <?php } ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="padding: 10px;">----</td>
                    <td>----</td>
                </tr>
            </tbody>
            </table>

        <h6 style="margin-top:20px;">Terms & Condition</h6>
        <table class="border-0"  id="table-form">
        
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
         
    
        <div style="width: 30%; text-align: center; float: right;"><?= ucwords($model->offered_by);?></div><br>
            <div style="width: 30%; text-align: center; float: right;">Denpasar, <?= date('d-M-Y')?></div><br><br><br><br>
            <div style="width: 30%; text-align: center; float: right;"><?= ucwords($model->offered_by);?></div>
        <br>
        <hr>
        <table class=""  id="">    
        <tr>
            <td width="20%" style="font-size:12px;">*The above fees & terms / conditions are understood and we confirm this order</td>
        </tr>
        <tr>
            <td width="20%" style="font-size:12px; margin-bottom:40px"><?= $model->name_company ?></td>
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
