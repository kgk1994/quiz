<div class="container">
  <h2>Question</h2>
  <div class="alert alert-danger print-error-msg" style="display:none"></div>
  <form action="/" method="post">
    <h3><?php echo $question->question_name !='' ? $question->question_name : ''; ?></h3>
        <h5>
            <input type="hidden" name="question_id" value="<?php echo $question->id; ?>"><br/>
            <input type="radio" class="message_pri" name="answer" value="<?php echo $question->answer1;?>"><?php echo $question->answer1;?><br/>
            <input type="radio" class="message_pri" name="answer" value="<?php echo $question->answer2;?>"><?php echo $question->answer2;?><br/>
            <input type="radio" class="message_pri" name="answer" value="<?php echo $question->answer3;?>"><?php echo $question->answer3;?><br/>
            <input type="radio" class="message_pri" name="answer" value="<?php echo $question->answer4;?>"><?php echo $question->answer4;?><br/>
        </h5>
    <button type="submit" class="btn btn-default btn-submit1">Submit</button>
  </form>
</div>

<script type="text/javascript">


$(document).ready(function() {
    $(".btn-submit1").click(function(e){
      e.preventDefault();

      var answer = $(".message_pri:checked").val();
      var question_id = $("input[name='question_id']").val();
      
        $.ajax({
            url: "/quiz/index.php/QuizPageCtrl/postAnswer",
            type:'POST',
            dataType: "json",
            data: {question_id:question_id, answer:answer},
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