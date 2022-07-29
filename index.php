<?php
if (!session_id()) { session_start(); }
if(!isset($_SESSION['firewall'])){$_SESSION['firewall'] = "ON";}
if($_SESSION['firewall'] == "ON"){
$_SESSION['captcha'] = $_SESSION['captcha'] ?? md5(time());
$captcha = $_POST['captcha'] ?? '';
    if($_SESSION['captcha'] == $captcha){
        $_SESSION['firewall'] = "OFF";
    }else{
?>
<style>
body{
    display: flex;
    justify-content:center;
    align-items: center;
    height: 100%;
}
.progress-bar {
	height: 8px;
	width:0%;
	border-radius: 8px;
	margin-top: 8px;
	box-shadow: 0 2px 4px #5aba4780;
	background-color: #5aba47;
	animation: loading 3s linear forwards;
}

@keyframes loading {
  0 {
    width:0%;
  }
  100% {
    width: 100%;
  }
}

</style>
<div class="container" style="width:50%;">
    <div class="progress-bar"></div>
</div>

<input type="hidden" name="captcha_key" id="captcha_key" value="<?php echo $_SESSION['captcha'];?>">
<form id="firewall" action="" method="post">
    <input type="hidden" name="captcha" id="captcha" value="CHA9LALADADDYSUPERMAN">
</form>
<script>
    if(document.getElementById('captcha_key')){
        const captcha_key = document.getElementById('captcha_key');
        if(document.getElementById('captcha')){
            const captcha_input = document.getElementById('captcha');
            const submitAfter3Seconds = setTimeout(()=>{
                captcha_input.value = captcha_key.value;
                document.getElementById('firewall').submit();
            }, 3000);
        }
    }
</script>
<?php        
        exit();
    }
}
