  // implement disabled buttons

  $(document).ready(function(){



    // code for post create page validation

    $('#post-create').attr('disabled', true);
    $('#title, ckeditor').on('input', function(){

        if($('#title').val() !== "" && $('ckeditor').val() !== ""){

            $('#post-create').attr('disabled', false);
        }
        else{
            $('#post-create').attr('disabled', true);
        }

    });


    // post edit

    $('#post-edit').attr('disabled', true);
    $('#title, #body').on('input', function(){

        if($('#title').val() == "" && $('#body').val() == ""){

            $('#post-edit').attr('disabled', true);
        }
        else{
            $('#post-edit').attr('disabled', false);
        }
    });

  // login page

  $('#login-button').attr('disabled', true);
  $('#email, #password').on('input', function(){

      if($('#email').val() !== "" && $('#password').val() !== ""){

          $('#login-button').attr('disabled', false);
      }
      else{
          $('#login-button').attr('disabled', true);
      }



  });


  //register page

  $('#register-button').attr('disabled', true);
  $('#username, #name, #email, #password, #password-confirm').on('input', function(){

      if($('#username').val() !== "" && $('#name').val() !== "" && $('#email').val() !== "" && $('#password').val() !== ""  && $('#password-confirm').val() !== ""){

          $('#register-button').attr('disabled', false);
      }
      else{
          $('#register-button').attr('disabled', true);
      }

  });




    //user profile

    $('#profile-update').attr('disabled', true);
    $('#file, #username, #name, #email').on('input', function(){

      if($('#file').val() == "" && $('#username').val() == "" && $('#name').val() == "" && $('#email').val() == "" ){

          $('#profile-update').attr('disabled', true);
      }
      else{
          $('#profile-update').attr('disabled', false);
      }

  });

    //role creation

    $('#role-create').attr('disabled', true);
    $('#name').on('input', function(){

        if($('#name').val() == ""){

            $('#role-create').attr('disabled', true);
        }
        else{
            $('#role-create').attr('disabled', false);
        }

    });

    //role update

    $('#role-update').attr('disabled', true);
    $('#name').on('input', function(){

        if($('#name').val() !== ""){

            $('#role-update').attr('disabled', false);
        }
        else{
            $('#role-create').attr('disabled', true);
        }

    });


  });










  ////////////////////////////////////////////////////////////////////

     //create alert boxes

    // $('#post_submit').click(function(){
    //     alert("post is created successfully");
    // });


    // function validate(){

    //     var valid = true;
    //     valid = checkEmpty($('#title'));
    //     // valid = checkEmpty($('#body'));

    //     $('#post-create').attr('disabled', true);

    //     if(valid){
    //         $('#post-create').attr('disabled', false);
    //     }

    //     function checkEmpty(obj){

    //         var name = $(obj).attr('name');
    //         $('#title-label').html("");
    //         $(obj).css('border', '');

    //         if($(obj).val() == ""){

    //             $(obj).css("border","#FF0000 1px solid");
    //             $('#title-label').html("Required");
    //             return false;
    //         }
    //         return true;
    //     }
    // }
