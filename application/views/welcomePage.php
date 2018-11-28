

<div id="container">
	<h1>Welcome!</h1>

	<div id="body">

<div class="container">
  <h2>User Details</h2>
  <?php echo $this->session->flashdata("message"); ?>
  <div class="alert alert-danger print-error-msg" style="display:none">
  
</div>
  <form action="/" method="post">
    
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="username" placeholder="Enter Name" name="username">
    </div>  
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Phone Number:</label>
      <input type="text" class="form-control" id="phone" placeholder="Enter Phone Number" name="phone_number">
    </div>
    
    <button type="submit" onsubmit="" class="btn btn-default btn-submit">Submit</button>
  </form>
</div>


<script type="text/javascript">


$(document).ready(function() {
    $(".btn-submit").click(function(e){
      e.preventDefault();

      var username = $("input[name='username']").val();
      var email = $("input[name='email']").val();
      var phone_number = $("input[name='phone_number']").val();
  
      
        $.ajax({
            url: "/quiz/index.php/WelcomePage/openQuiz",
            type:'POST',
            dataType: "json",
            data: {username:username, phone_number:phone_number,email:email},
            success: function(data) {
              console.log("data",data);
                if($.isEmptyObject(data.error)){
                  $(".print-error-msg").css('display','none');
                  // alert(data.success);
                  if(data.success ==true){
                    window.location.href = data.redirect_url;
                  }
                  
                }else{
          $(".print-error-msg").css('display','block');
                  $(".print-error-msg").html(data.error);
                }
            }
        });


    }); 


});


</script>

	

