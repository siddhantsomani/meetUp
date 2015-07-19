<!DOCTYPE html>
<html>
<body>

<?php
$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
echo json_encode($age);
echo "Peter is " . $age['Peter'] . " years old.";
?>

</body>
</html>
