<?php
include('db.php');
$q2=$db->query("select email from users where email='".$_POST['email']."'");
$num2=$q2->num_rows;
if ($num2==1) {
	echo '<script>
	
	syserror("This email address is already in use.");
	
	</script>';
}
else {
    if (isset($_POST['fname']) && isset($_POST['email']) && isset($_POST['pass'])) {
	$q1=$db->query("insert into users (email,password,username) values('".$_POST['email']."','".$_POST['pass']."','".$_POST['fname']."')") or die($q1->error);
	echo '<script>
	syssucs("Successful registeration, you can login now.");
	</script>';
    }
    else {
        echo '<script> window.location="index.php"; </script>';
    }
}
?>