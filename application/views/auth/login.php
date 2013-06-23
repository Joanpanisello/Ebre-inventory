<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
      <title><?php echo lang('inventory') . ". " . $this->session->userdata('institution_name'); ?></title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="Login form. Inventory">
      <meta name="author" content="Sergi Tur Badenas. Josep Llaó">
      
   <!-- CSS PROPIS -->

       <link type="text/css" rel="stylesheet" href="http://185.13.76.62/codeigniter/assets/css/bootstrap-select.css" />
       <link type="text/css" rel="stylesheet" href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" />
   

   <!-- JS PROPIS -->
       <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
       <script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
       <script src="http://185.13.76.62/codeigniter/assets/js/bootstrap-select.js"></script>
    
   <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

   </style>
	<script type="text/javascript">
        $(window).on('load', function () {
            $('.selectpicker').selectpicker();
            $('.selectpicker').val('<?php echo $this->session->userdata('default_realm')?>');
            $('.selectpicker').change();
            
            <?php if ($this->session->userdata('maintenance_mode')): ?>
$('#maintenance-mode-message').html("<?php echo lang('maintenance_mode_message');?>");
var realms_select = document.getElementById("realms");
$("option").attr("disabled", "disabled");
realms_select.options[realms_select.options.length] = new Option('<?php echo lang('maintenance_mode');?>','maintenance_mode');
identity
$('.selectpicker').val('maintenance_mode');
$('.selectpicker').selectpicker('refresh');		
			<?php endif; ?>

            
        });
    </script>


  </head>

<body>
	
<div class="container">	

     <center><div id="maintenance-mode-message" class="text-error"></div></center>
     
     <center><div class="text-error"><?php echo $message;?></div></center>
     

     <center><h1><?php echo lang('inventory') . ". " . $this->session->userdata('institution_name');?></h1></center>
     <br>
     
       <?php echo form_open('inventory_auth/login', array('id' => 'loginform', 'class' => 'form-signin' )); ?>
        
        <h3 class="form-signin-heading"><?php echo lang('login-form-greetings');?></h3>

         <input id="identity" class="input-block-level" type="text" placeholder="<?php echo lang('User');?>" name="identity">
         <input id="password" class="input-block-level" type="password" placeholder="<?php echo lang('Password');?>" name="password">
         
         <select id="realms" class="selectpicker" name="realm">
  		  <?php foreach( (array) $this->session->userdata('realms') as $realm): ?>
           <option value="<?php echo $realm; ?>" ><?php echo $realm; ?></option>
          <?php endforeach; ?>	
         </select>
         
         <br/>
         
         <label class="checkbox">
          <input type="checkbox" value="remember-me"> <?php echo lang('remember');?>
         </label>

        <br/>
        <button class="btn btn-large btn-primary" type="submit"><?php echo lang('Login');?></button>
       
       <?php echo form_close(); ?>
       <center><p><a href="todo_register"><?php echo lang('Register');?></a></p></center>
       <center><p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p></center>
      

</div>

</body>

</html>
