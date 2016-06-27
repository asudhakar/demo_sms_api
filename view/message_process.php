<?php 
include('../controllers/function.php');
$names = $_POST['name'];
$path = $_POST['path'];
$name_and_number = base64_encode(serialize($names));


?>

<html><head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="robots" content="noindex, nofollow">
  <meta name="googlebot" content="noindex, nofollow">

  <script type="text/javascript" src="//code.jquery.com/jquery-compat-git.js"></script>

 <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script type="text/javascript">//<![CDATA[
$(window).on('load', function() {
$('textarea').keyup(updateCount);
$('textarea').keydown(updateCount);

function updateCount() {
    var cs = $(this).val().length;
    if(cs < 160){
    	$('#characters').text(cs);
    }else{
    	
    	$('#characters').text('160 characters exceded. 2 sms will be sent');
    }
}
});

</script>

  
</head>

<body>
<div class="container">
<div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><a href="../index.php">Home</a></li>
            <li role="presentation"><a href="manage_templates.php">Templates</a></li>
            <li role="presentation"><a href="http://vefetch.com/">About</a></li>
            <li role="presentation"><a href="login.php?action=logout">Logout</a></li>
          </ul>
        </nav>
        <img src="../images/company_logo.png" height="125px" width="220px">
      </div>
      <hr/>
<form action="insert_into_db.php" method="post">
	<input type="hidden" name="name_and_number" value="<?php echo $name_and_number; ?>">
  <input type="hidden" name="path" value="<?php echo $path; ?>">
  <div class="row">
    <div class="col-sm-9">
    <h2>Selected Contacts</h2>
    </div>
    
   
   
  </div>
  <div class="jumbotron">
  <?php 

    foreach ($names as $key => $name) {
      echo '<span style="background-color: aqua;">'.$name</span>';
    }

   ?>
  </div>
  <div class="row">
    <div class="col-sm-9">
    <h2>Enter the message</h2>
    </div>
    
   
   
  </div>
  <div class="jumbotron">
    <div class="row">
      <div class="col-sm-9">
        <textarea name="message" class="form-control message-box" rows="5" id="comment" placeholder="enter your message here"></textarea>
      </div>
      <div class="col-sm-3">


      <?php 
        $sql = "SELECT `template_name`, `template_message` FROM `message_templates`";
        $link = db_connect_local();
        mysqli_set_charset($link, 'utf8mb4'); 
        $result = executeQuery($sql, $link);
        while($row = mysqli_fetch_assoc($result)) {
          $final_output[$row['template_name']] = $row['template_message'];
        }
        foreach ($final_output as $title => $value) {
          echo '<input type="button" class="btn btn-primary message-button" name="'.$value.'" value="'.$title.'"><br/>';
        }

       ?>
      </div>
    </div>
  </div>
<span id="characters"><span></span></span>
<input type="submit" class="btn btn-primary" value="send">
<a href="../index.php"><input type="button" class="btn btn-warning" value="cancel"></a>
</form>
	
  </div>
  <footer class="footer">

         <p style="text-align: center">All rights are reserved by <a href="http://vefetch.com/">Vefetch</a>, Developed by <a href="https://twitter.com/sudhakar_valar">@sudhakar</a>.</p>
      </footer>

<script type="text/javascript">
    
    $('.message-button').click(function(){
      var value =   $(this).attr("name");
      $('.message-box').html(value);
    });
    


</script>


</body></html>