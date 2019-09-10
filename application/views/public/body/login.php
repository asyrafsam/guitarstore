

<body>
<div class="cotn_principal">
  <div class="cont_centrar">

    <div class="cont_login">
      <div class="cont_info_log_sign_up">
        <div class="col_md_login">
          <div class="cont_ba_opcitiy">
                
                <h2>LOGIN</h2>  
          <p></p> 
          <button class="btn_login" onclick="cambiar_login()">LOGIN</button>
          </div>
        </div>
        <div class="col_md_sign_up">
          <div class="cont_ba_opcitiy">
            <h2>SIGN UP</h2>

            
            <p></p>

            <button class="btn_sign_up" onclick="cambiar_sign_up()">SIGN UP</button>
          </div>
        </div>
      </div>
      <div class="cont_back_info">
         <div class="cont_img_back_grey">
          <img src="https://www.gtagangwars.de/suite/images/styleLogo-6bd77433ddf78bd8477ea7306e804f677bc925d0.png" alt="" />
         </div>
      </div>
      <div class="cont_forms" >
        <div class="cont_img_back_">
          <img src="https://www.gtagangwars.de/suite/images/styleLogo-6bd77433ddf78bd8477ea7306e804f677bc925d0.png" alt="" />
        </div>
        <form action="<?php echo base_url('M/aksi_login'); ?>" method="post" enctype="multipart/form-data">
          <div class="cont_form_login">
            <!-- <a href="#" onclick="ocultar_login_sign_up()" ><i class="material-icons"></i></a> -->
            <h2>LOGIN</h2>
              <input type="text" name="icno" placeholder="IC Number" />
              <input type="password" name="password" placeholder="Password" />
            <input type="submit" value="login">
          </div>
        </form>
        
        <div class="cont_form_sign_up">
          <a href="#" onclick="ocultar_login_sign_up()"><i class="material-icons"></i></a>
          <h2>SIGN UP</h2>
          <input type="text" placeholder="Username" />
          <input type="password" placeholder="Password" />
          <input type="password" placeholder="Confirm Password" />
        <button class="btn_sign_up" onclick="cambiar_sign_up()">SIGN UP</button>
        </div>
      </div>
    </div>
   </div>
</div>
<script type="text/javascript">

    // function loginsubmit(){
    // //
    //         var url;

    //         url = '<?php echo site_url('M/logincheck') ;?>';
            
    //         $.ajax({
    //                       url : url,
    //                       type : "POST",
    //                       data : $('#form').serialize(),
    //                       dataType : "JSON",
    //                       success: function(data){
    //                             // alert('Data Send to Controller');
    //                             location.reload();

    //                       },
    //                         error: function (jqXHR, textStatus, errorThrown){
    //                           alert('error at adding data to ajax');
    //                       }
                    

    //           });
    //       }
    /* ------------------------------------ Click on login and Sign Up to  changue and view the effect
---------------------------------------
*/

    function cambiar_login() {
      document.querySelector('.cont_forms').className = "cont_forms cont_forms_active_login";  
      document.querySelector('.cont_form_login').style.display = "block";
      document.querySelector('.cont_form_sign_up').style.opacity = "0";               

      setTimeout(function(){  document.querySelector('.cont_form_login').style.opacity = "1"; },400);  
        
      setTimeout(function(){    
      document.querySelector('.cont_form_sign_up').style.display = "none";
      },200);  
  }

    function cambiar_sign_up(at) {
      document.querySelector('.cont_forms').className = "cont_forms cont_forms_active_sign_up";
      document.querySelector('.cont_form_sign_up').style.display = "block";
      document.querySelector('.cont_form_login').style.opacity = "0";
        
      setTimeout(function(){  document.querySelector('.cont_form_sign_up').style.opacity = "1";
      },100);  

      setTimeout(function(){   document.querySelector('.cont_form_login').style.display = "none";
      },400);  


  }    

    function ocultar_login_sign_up() {

      document.querySelector('.cont_forms').className = "cont_forms";  
      document.querySelector('.cont_form_sign_up').style.opacity = "0";               
      document.querySelector('.cont_form_login').style.opacity = "0"; 

      setTimeout(function(){
      document.querySelector('.cont_form_sign_up').style.display = "none";
      document.querySelector('.cont_form_login').style.display = "none";
    },500);  
  
  }




</script>
</body>