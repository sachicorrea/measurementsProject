<?php
  require_once('includes/functions.php');

  $from_value = '';
  $from_unit = '';
  $to_unit = '';
  $to_value= '';

  if($_POST['submit']) {
    $from_value = $_POST['from_value'];
    $from_unit = $_POST['from_unit'];
    $to_unit = $_POST['to_unit'];

    $to_value = convert_area($from_value, $from_unit, $to_unit);
  }

  $area_options = array(
    'square inches',
    'square feet',
    'square yards',
    'square miles',
    'square millimeters',
    'square centimeters',
    'square meters',
    'square kilometers',
    'acres',
    'hectares'
  );
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Convert Area</title>
    <link href="styles.css" rel="stylesheet" type="text/css">
  </head>
  <body>

    <div id="main-content">
      <h1>Convert Area</h1>
  
      <form action="" method="post">
        
        <div class="entry">
          <label>From:</label>&nbsp;
          <input type="text" name="from_value" value="<?php echo $from_value; ?>" />&nbsp;
          <select name="from_unit">
            <?php 
            foreach($area_options as $unit){
              $opt = optionize($unit);

              echo "<option value=\"{$opt}\"";
              if($from_unit == $opt) { 
                echo " selected"; 
              } 
              echo ">{$unit}</option>";
            }            
            ?>
          </select>
        </div>
        
        <div class="entry">
          <label>To:</label>&nbsp;
          <input type="text" name="to_value" value="<?php echo float_to_string($to_value); ?>" />&nbsp;
          <select name="to_unit">
            <?php 
            foreach($area_options as $unit){
              $opt = optionize($unit);
              
              echo "<option value=\"{$opt}\"";
              if($to_unit == $opt) { 
                echo " selected"; 
              }
              echo ">{$unit}</option>";
            }
            ?>
          </select>
        </div>
        
        <input type="submit" name="submit" value="Submit" />
      </form>
  
      <br />
      <a href="index.php">Return to menu</a>
    </div>
  </body>
</html>
