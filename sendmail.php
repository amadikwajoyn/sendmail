<?php
include_once('mail.php');
$emailsend = "";


if (isset($_POST['send'])) {
  $subject = $_POST['subject'];
  $cus = $_POST['cus'];
  $account = $_POST['account'];
  $message = $_POST['remark'];
  $date = date('D, d M, Y.');

$sql = "INSERT INTO `message` (`id`, `recipient`, `subject`, `message`, `date`) VALUES (NULL, '$cus', '$subject', '$message', '$date');";
$query = mysqli_query($conn, $sql);


              try {
   
   $mail->setFrom('info@joytesting.com', 'Testing Web mailer');
   $mail->AddReplyTo('info@joytesting.com', 'No Reply');
   $mail->addAddress($cus, 'Valued Customer');
   $mail->Subject = $subject;
   $mail->isHTML(TRUE);
   $mail->Body = $message;
   $mail->isSMTP();
   $mail->Host = 'joytesting.com';
   $mail->SMTPAuth = TRUE;
   $mail->SMTPSecure = 'tls';
   $mail->Username = 'email_address eg. info@joytesting.com';
   $mail->Password = 'email_password';
   $mail->Port = 587;
   
   /* Enable SMTP debug output. */
   //$mail->SMTPDebug = 4;
   
   $mail->send();
   echo "<script>alert('Email Sent successfully.');</script>";
echo "<script>window.location='sendmail.php';</script>";
}
catch (Exception $e)
{
  // echo $e->errorMessage();
}
catch (\Exception $e)
{
  // echo $e->getMessage();
}
}
   


?>    
        <!--content-->
      <div class="content">
          <div class="monthly-grid">

          
                 <div class="row">
        <div class="col-xs-12">
          <div class="box">



                       <div class="col-md-12 graph-2 second" style="margin-bottom: 20px">
                      <div class="panel panel-primary two">
                        <div class="panel-heading"><center> SEND DIRECT EMAIL</center></div>

            <div class="box-body table-responsive no-padding">

                
              <div class="registration">
  <div class="container">
    <div class="registration_left" style="width: 100%">
    <h2>Contact a Customer<span> via E-mail</span></h2>
  
     <div class="registration_form">
     <!-- Form -->
      <form action="" method="POST"  multipart="" enctype="multipart/form-data">
       
        
        <div>
          <label>
            <select class="form-control" name="cus" required="">
                          <option value="">Select Customer</option>

                          <?php
                          for ($i=0; $i < $px; $i++) { 
                          
                          echo "<option value='".$email2[$i]."'>".$acct2[$i]."; ".$name2[$i]."</option>";
                        }
                        echo "</select>";
                          ?>
                         
          </label>
        </div>
        <div>
          <label>
            <select class="form-control" name="account" required="">
                          <option value="">Select Email Account</option>
                          <option value="info@joytesting.com">info@joytesting.com</option>
                        </select>
          </label>
        </div>
        <div>
          <label>
            <input placeholder="Subject of Mail:" type="text" tabindex="3" required="" name="subject" class="form-control">
          </label>
        </div>
       
       
             
             
        <div>
          <label>
            <textarea name="remark" class="form-control" required="" rows="5" placeholder="Body of Email:"></textarea>
          </label>
        </div>
       



        
                    <div class="clearfix"> </div>
      
        <div>
          <button type="submit" class="btn btn-primary pull-right" name="send">Send Mail</button>
        </div>
      </form>
      <!-- /Form -->
    </div>
  </div>
  

  

</div>
  <!--content-->
    </div>







            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
          </div>

</div>
</div>
  </div>
        <hr>
            
    <?php
    include('foot.php')
    ?>