<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type='text/javascript'>
  jQuery(function () {
    jQuery('[data-toggle="tooltip"]').tooltip()
  })
{{--Select2--}}
    jQuery(document).ready(function() {
        jQuery('.college-name').select2();
        jQuery('.chng_subjct').select2();
    });
  
     
  jQuery('.call_gd').on("change", selctGuide);
  function selctGuide(){
    var clg_id = jQuery('.college-name').val();
    var subject_id=jQuery('.chng_subjct').val();  
    if(!subject_id || !clg_id){
     //jQuery('.guide_list').html('');   
     jQuery('#guides_list_id').attr('disabled',true);
    }
    else{
      jQuery('.loader').show();    
     jQuery.ajax({
        url: "{{ url('/scholars/findguide') }}",
        method: 'post',
        data: {
          _token: '<?php echo csrf_token() ?>',
           request_type: 'guide_list',
           clg_id: clg_id,
           subject_id: subject_id         
        },
        success: function(result){
          if(result.success && result.guide_count){
            jQuery('.guide_list').html(result.guide_list);
            jQuery('.alert-danger').hide();     
           }
           else if(result.success && !(result.guide_count)){
            jQuery('#guides_list_id').attr('disabled',true);
            jQuery('.alert-danger').html('No Supervisior found for this combination of college and subject. Please add Supervisior first for this combination ').insertAfter('.guide_data').show();          
           }
           else{
            jQuery.each(result.errors, function(key, value){
              jQuery('.alert-danger').insertAfter('.guide_data').show();
              jQuery('.alert-danger').append('<p>'+value+'</p>');
            });
           }
           //console.log(result);
           jQuery('.loader').hide();
           //alert(result.fir);
           
        }
      });
    }  
  }

  jQuery(document).on("change",".guide_list_ok", function(){
    var guide_id = jQuery(this).val();         
    if(guide_id){     
        jQuery('.loader').show();    
        jQuery.ajax({
        url: "{{ url('/scholars/findguide') }}",
        method: 'post',
        data: {
           _token: '<?php echo csrf_token() ?>',
           request_type: 'guide_limit_check',
           check_for: jQuery('.input-ptype').val(),
           guide_id: guide_id,
           scholar_id: jQuery('.input-sid').val()        
        },
        success: function(result){
         if(result.success){
                jQuery('.alert-danger').html(result.msg).insertAfter('.guide_data').show();
                jQuery('.btn-go').attr('disabled',true);                 
                }
                else{
                    jQuery('.alert-danger').hide();
                    jQuery('.btn-go').attr('disabled',false);
                }          
          jQuery('.loader').hide();
        }
      });
    } 
  });
  
  
  </script>