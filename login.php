<?php

include('master/Examination.php');

$exam = new Examination;

$exam->user_session_public();

include('header.php');

?>
  <body style="background: url('upload/background.jpeg') no-repeat;width:100%;height:100%;">
        <div class="row">
            <div class="col-md-3" style="margin-left: 55px;">
        </div>
        <div class="col-md-5" style="margin-top:150px;">
          
            <span id="message">
            <?php
            if(isset($_GET['verified']))
            {
              echo '
              <div class="alert alert-success">
                Your email has been verified, now you can login
              </div>
              ';
            }
            ?>   
            <span> 
            <div class="card clear">
              <b><div class="card-header" align="center">User Login</div></b>
              <div class="card-body">
                <form method="post" id="user_login_form">
                  <div class="form-group">
                    <b><label>Enter Email Address</label></b>
                      <input type="text" name="user_email_address" id="user_email_address" class="form-control" />
                    </div>
                  <div class="form-group">
                    <b><label>Enter Password</label></b>
                    <input type="password" name="user_password" id="user_password" class="form-control" />
                  </div>
                  <div class="form-group" align="center">
                    <input type="hidden" name="page" value="login" />
                    <input type="hidden" name="action" value="login" />
                    <input type="submit" name="user_login" id="user_login" class="btn btn-info" value="Login" />
                  </div>
                </form>
                <div align="center">
                 <b> Not a user?</b><a href="register.php">Register</a>
                </div>
              </div>
            </div>
        </div>
        <div class="col-md-3">

        </div>
      </div>
  </div>

</body>
</html>

<script>

$(document).ready(function(){

  $('#user_login_form').parsley();

  $('#user_login_form').on('submit', function(event){
    event.preventDefault();

    $('#user_email_address').attr('required', 'required');

    $('#user_email_address').attr('data-parsley-type', 'email');

    $('#user_password').attr('required', 'required');

    if($('#user_login_form').parsley().validate())
    {
      $.ajax({
        url:"user_ajax_action.php",
        method:"POST",
        data:$(this).serialize(),
        dataType:"json",
        beforeSend:function()
        {
          $('#user_login').attr('disabled', 'disabled');
          $('#user_login').val('please wait...');
        },
        success:function(data)
        {
          if(data.success)
          {
            location.href='Homepage.php';
          }
          else
          {
            $('#message').html('<div class="alert alert-danger">'+data.error+'</div>');
          }

          $('#user_login').attr('disabled', false);

          $('#user_login').val('Login');
        }
      })
    }

  });

});

</script>