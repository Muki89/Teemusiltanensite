<?php $new_password = password_hash("123456", PASSWORD_DEFAULT); 
echo $new_password;

if(password_verify("123456", "$2y$10$ScrZgLuFSkLSSO9Dr8jS9O3DxLWSVkdmsHx14BSpDFHo3yP6ElQHO")){
	echo "samat";
} else{
	echo "väärät";
}
?>


</body>

</html>