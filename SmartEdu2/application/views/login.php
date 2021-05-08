<?php require 'header2.php'
?>
<div class="login">
  <div class="container">
    <div class="row"> 
      <div class="col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-offset-2 col-xs-8">
         <div class="form-login">
          <form action="<?=base_url()?>index.php/smartedu/user_auth" method="post">
          <h3 class="login-tittle">Masuk SMART EDU</h2>
          <div class="form-group">
            <input type="text" required name="username" class="form-control" placeholder="Username">
          </div>
          <div class="form-group">
            <input type="password" required name="password" class="form-control" placeholder="Password">
          </div>
          <div class="login-text">
            <p>Lupa password akun anda?<a style="color: #0b47b5;"> Klik disini</a></p>
          </div>
          <div class="form-group">
            <input type="submit" class="btn btn-block btn-custom-green" id="btn-login" value="MASUK" />
          </div>
          <div class="login-text">
             <p>Belum punya akun? silahkan daftar<a style="color: #0b47b5;" href="<?=base_url()?>index.php/smartedu/register_page">  disini</a></p>
          </div>
          <?php if($notif==0){?>
          <?php } else if($notif==2) {?>
          <div class="alert-danger">Password yang anda inputkan salah</div>
          <?php } else if($notif==1) {?>
          <div class="alert-success">Maaf data anda tidak ada dalam database kami </div><?php }?>
        </form>
         </div>
      </div>
    </div>
  </div>
</div>
  <?php require 'footer.php'
?>