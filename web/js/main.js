
$('#paymentQuotService').change(function() {
    const val = $(this).val();
     $.get('?r=quotation/get-service-fee',{val : val},function(data){
        let res = $.parseJSON(data);
        $( "td#hargaService" ).replaceWith( "<td class='text-center' id='hargaService'>Rp." +res.registration_fee+ ".00 <button type='button' class='remove-item btn btn-transparent btn-xs'><i class='fas fa-trash'></i></button> </td>" )
     })
    }
)
// $('button#buttonServiceFee').on('click',function() {
//     let row = 1;
//     $('.duplicate').append($('.the-table').each(function(){
//         $(this).attr('id',`tableInputQuotation${row++}`)
//     }))
    
// })

// function buttonQuotService(val) {
//     $('button#buttonServiceFee',function() { 
//         if (val > 1) {
//         }else{
            
//         }
//     })
// }

