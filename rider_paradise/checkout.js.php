 
 <script>
function saveAddress(){
    var fname = $('#fname').val();
    var lname = $('#lname').val();
    var phoneno = $('#phoneno').val();
    var address = $('#address').val();
    if(fname.trim() == '' ){
        alert('Please enter your First Name.');
        $('#fname').css('border-color', 'red');
        $('#fname').focus();
        return false;
    }else if(lname.trim() == '' ){
        alert('Please enter your Last Name.');
        $('#lname').css('border-color', 'red');
        $('#lname').focus();
        return false;
     }        
        else if(phoneno.trim() == '' ){
        alert('Please Update your Mobile Number.');
        $('#phoneno').css('border-color', 'red');
        $('#phoneno').focus();
        return false;
    }else if(phoneno.length < 10 || phoneno.length > 10){
        alert('Mobile Number can not be less than or greater than 10 digits e.g 8345432376.');
        $('#phoneno').css('border-color', 'red');
        $('#phoneno').focus();
        return false;
    }else if(address.trim() == '' ){
        alert('Please enter your Address.');
        $('#address').css('border-color', 'red');
        $('#address').focus();
        return false;
    }else{
        $.ajax({
            type:'POST',
            url:'update_address.php',
            data:'AddressFrmSubmit=1&fname='+fname+'&lname='+lname+'&phoneno='+phoneno+'&address='+address,
            beforeSend: function () {
                $('.submitBtn').attr("disabled","disabled");
                $('.modal-body').css('opacity', '.5');
            },
            success:function(msg){
                if(msg == 'ok'){
                  $('#fname').val('');
                  $('#lname').val('');
                  $('#phoneno').val('');
                  $('#address').val('');
                  $('.statusMsg').html('<span class="modal-alert" style="color:green; text-align:center;">Your Address has been updated successfully!</p>');
                  setTimeout(
                    function() 
                          {
                   location.reload();
                        }, 5000);
                  
                }else{
                    $('.statusMsg').html('<span class="modal-alert" style="color:red; text-align:center;">Some problem occurred, please try again.</span>');
                }
                $('.submitBtn').removeAttr("disabled");
                $('.modal-body').css('opacity', '');
            }
        });
    }
}
             
</script>

 <script>
function confirm_delivery(){
 var billing_address = $('#billing_address').val();
 var method_checked = $('input:radio:checked').val();
 if (billing_address == '') {// if address variable doesnt have a truthy value
  alert('Click on Change and Update your Billing Address');
  return false;
}
else if (method_checked == undefined) {
  alert('Please Select Any Delivery Method of your Interest!');
  return false;
}
else{
        $.ajax({
            type:'POST',
            url:'delivery_update.php',
            data:'Delivery=1&method_checked='+method_checked,           
            success:function(response){
                if(response == 'ok'){     
               alert('Delivery Method Selected is '+method_checked);               
                  location.reload();         
                }else{
                    alert('A problem occurred Try Again');
                }
               
            }
        });
}
}
 </script>

 <script>
//Accordion starts
$('.panel-title > a').click(function() {
    $(this).find('i.accordion_icon').toggleClass('fa-plus fa-minus')
           .closest('panel').siblings('panel')
           .find('i')
           .removeClass('fa-minus').addClass('fa-plus');
});
 </script>
 <script>
  paypal.Buttons({
   style: {     layout: 'vertical',
                color:  'silver',
                shape:  'rect',
                label:  'paypal',
                height: 40
            },
    createOrder: function(data, actions) {
      // This function sets up the details of the transaction, including the amount and line item details.
      return actions.order.create({
        purchase_units: [{
          amount: {
            value:  '<?php if (!empty($voucher_price && $final_price == $former_price)) {echo $voucher_price;} else{echo $final_price;} ?>'

          }
        }]
      });
    },
    onApprove: function(data, actions) {
  return actions.order.capture().then(function() {
  window.location = "shop-files/transaction-completed.php?&orderID="+data.orderID+"&session_email=<?php echo $email; ?>"+"&delivery=<?php echo $delivery; ?>";  //redirect             
  });
}

  }).render('#paypal-button-container');
  //This function displays Smart Payment Buttons on your web page.
</script>

 <script>
    function redeem(){
    var price = '<?php echo $final_price; ?>';
    var voucher_price = 0.2; //20% off with promo code
    var voucher_code = $('#voucher_code').val();
    if (voucher_code == '') {
      alert('Promo Code can not be empty!');
      $('#voucher_code').css('border-color', 'red');
      $('#voucher_code').focus();
       return false;
    }
     else{
      if (voucher_code == 'ViralSkill247') {
        var total_price_purchase = price * voucher_price;
            $.ajax({
            type:'POST',
            url:'redeem_code.php',
            data:'Redeem=1&total_price_purchase='+total_price_purchase+'&former_final_price='+price,           
            success:function(result){
                if(result == 'ok'){                  
                  $('#voucher_code').css('border-color', 'red');  
                  $('#voucher_code').val('');                
                  alert('Congratulations your new total purchase price is $'+total_price_purchase+' 20% OFF');                 
                   location.reload();                   
                  
                }else{
                    alert('A problem occurred Try Again');
                }
               
            }
        });
        
      }
      else{
        alert('You entered a wrong Voucher Code');
         $('#voucher_code').css('border-color', 'red');
      $('#voucher_code').focus();
      }
    }
  }

 </script> 

