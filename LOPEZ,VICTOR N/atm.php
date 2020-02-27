<html>
<body>
  <center>
    <h2>Atm Machine</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
      <input type="text" name="txtAmount" placeholder="Enter Amount" required>
      <input type="submit" value="Submit"> 
    </form>
  <?php
    if (!empty($_POST)) {
        $message = "";
        class AtmBehavior{

          public function atmDispencer($amount){
            if($amount != ""){
              // //$amount= intval($amount);
              $notes = array(1000,500,200,100);
              $noteCount = array(0,0,0);
              $output="";

              if($amount <=0)
              {
                $output="<b>Invalid Amount</b>";
                return $output;
              }
              elseif ($amount > 50000) {
                 $output="<b>Amount should not exceed 50k</b>";
                 return $output;
              }
              else{
                if(!preg_match('/\d\d[0]$/',$amount))
                {
                  $output="<b>Invalid Amount</b>";
                  return $output;
                }else{
                  for($i=0;$i<count($notes);$i++){
                    if($notes[$i]<$amount || $notes[$i]==$amount){
                      $noteCount[$i]=intval($amount/$notes[$i]);
                      $amount=$amount-$noteCount[$i]*$notes[$i];
                      //$amount=$amount%$notes[$i];
                    }
                  }
                  for($i=0;$i<count($noteCount);$i++){
                    if($noteCount[$i]!=0){
                      $output .= "<br><b>".$notes[$i]." X ".$noteCount[$i]." = ".($notes[$i]*$noteCount[$i])."</b>";
                    }
                  }
                      return $output;
                }
              }
            }else{
              $output="<b>Invalid Amount- Amount Input Not Blank</b>";
              return $output;
            }
        }
    }
    $transaction = new AtmBehavior;
    $message = $transaction->atmDispencer($_POST['txtAmount']);
  ?>
  <div><br>
  <?php
    echo "Output: $message";
  }
  ?>
  </div>
</center>
</body>
</html>