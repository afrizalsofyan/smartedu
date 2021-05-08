<?php require 'header2.php'
?>
<div class="login">
  <div class="container">
    <div class="row"> 
      <div class="col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-offset-2 col-xs-8">
        <div class="form-login">
          <form action="<?=base_url()?>index.php/smartedu/register_auth" method="POST">
            <h3 class="login-tittle">Daftar SMART EDU</h2>
          <div class="form-group">
            <input type="email" required name="email" class="form-control" id="email" placeholder="Email">
            <span id="email_result"></span>  
          </div>
          <div class="form-group">
            <input type="text" required name="username" class="form-control" id="username" placeholder="Username">
            <span id="username_result"></span>
          </div>
          <div class="form-group">
           <input type="password" required name="password" class="form-control" placeholder="Password">
          </div>
          <div class="form-group">
           <input type="password" required name="conf-password" class="form-control" placeholder="Confirm Password">
          </div>
          <div class="form-group">
            <input type="submit" class="btn btn-block btn-custom-green" id="btn-login" value="DAFTAR" />
          </div>
          <div class="login-text">
             <p>Sudah punya akun? silahkan masuk<a style="color: #0b47b5;" href="<?=base_url()?>index.php/smartedu/login_page">  disini</a></p>
          </div>
          <?php if($notif==null){?>
          <?php }else if($notif==false) {?>
          <div class="alert-danger">Registrasi Gagal</div>
          <?php }else if($notif==true) {?>
          <div class="alert-success">Regirtrasi Berhasil, Silahkan Login</div><?php }?>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function(){  
      $('#email').change(function(){  
           var email = $('#email').val();  
           if(email != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>index.php/smartedu/check_email_avalibility",  
                     method:"POST",  
                     data:{email:email},  
                     success:function(data){  
                          $('#email_result').html(data);  
                     }  
                });  
           }  
      });  
 });  
$(document).ready(function(){  
      $('#username').change(function(){  
           var username = $('#username').val();  
           if(username != '')  
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>index.php/smartedu/check_username_avalibility",  
                     method:"POST",  
                     data:{username:username},  
                     success:function(data){  
                          $('#username_result').html(data);  
                     }  
                });  
           }  
      });  
 });  
</script>
  <?php require 'footer.php'
?>