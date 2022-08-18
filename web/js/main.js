
$('#paymentQuotService').change(function() {
    const val = $(this).val();
     $.get('?r=quotation/get-service-fee',{val : val},function(data){
        let res = $.parseJSON(data);
        $( "td#hargaService" ).replaceWith( "<td class='text-center' id='hargaService'>Rp." +res.registration_fee+ ".00 <button id='removeButton' type='button' class='remove-item btn btn-transparent btn-xs'><i class='fas fa-trash'></i></button> </td>" )
     })
    }
)

$('.add-item').on('click',function() {
    if ($('#paymentQuotService').val() !== "") {
        
    }else{ 
        alert('Lengkapi Dulu!')
    }
})
const title = $('head title').text()
if (title == "Update") {
    $('select').val(1).trigger('change')
    $('select').prop('disabled',true)
}

