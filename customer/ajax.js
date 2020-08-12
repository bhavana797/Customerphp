$(document).ready(function(e){
    // Submit form data via Ajax
    $("#user_form").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'save.php',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('.submitBtn').attr("disabled","disabled");
                $('#user_form').css("opacity",".5");
            },
            success: function(response){ //console.log(response);
                $('.statusMsg').html('');
                if(response.status == 1){
                    $('#user_form')[0].reset();
                    $('.statusMsg').html('<p class="alert alert-success">'+response.message+'</p>');
                }else{
                    $('.statusMsg').html('<p class="alert alert-danger">'+response.message+'</p>');
                }
                $('#user_form').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
                location.reload();
            }
        });
    });

$('#country').on('change', function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'showstate.php',
                data:'country_id='+countryID,
                success:function(html){
                    $('#state').html(html);
                    }
            }); 
        }else{
            $('#state').html('<option value="">Select country first</option>');
            }
    });

$("body").delegate(".delete","click",function(){ 
        var id=$(this).attr("data-id");
        $('#id_d').val(id);
        
    });

$("body").delegate("#delete","click",function(){
 $.ajax({
            url: "save.php",
            type: "POST",
            cache: false,
            data:{
                type:3,
                id: $("#id_d").val()
            },
            success: function(dataResult){
            location.reload();
            }
        });

})

//open edit model
$("body").delegate(".update","click",function(){
    var id=$(this).attr("data-id");
$.ajax({
            url: "update.php",
            type: "POST",
            cache: false,
            data:{
                update:1,
                id:id
            },
            success: function(dataResult){
                //dataResult.html("#get");
                $("#get").html(dataResult);

    }
    });
    });

$('#countryupdate').on('change', function(){
   var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'showstate.php',
                data:'country_idd='+countryID,
                
            
                success:function(html){
                    $('.stateupdate').html(html);
                    }
            }); 
        }else{
            $('.stateupdate').html('<option value="">Select country first</option>');
            }
    });

$("#user_formupdate").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'updateinfo.php',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('.submitBtn').attr("disabled","disabled");
                $('#user_formupdate').css("opacity",".5");
            },
            success: function(response){ 
                $('.statusMsg').html('');
                if(response.status == 1){
                    $('#user_formupdate')[0].reset();
                    $('.statusMsg').html('<p class="alert alert-success">'+response.message+'</p>');
                }else{
                    $('.statusMsg').html('<p class="alert alert-danger">'+response.message+'</p>');
                }
                $('#user_formupdate').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
                // location.reload();
            }
        });
    });



});