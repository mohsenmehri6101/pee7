<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fa-ir" lang="fa-ir" >
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<body style="background-color: #e0e0e0; direction: rtl;">
<!-- اعتبار -->
<i style="color:blue;font-size:30px;font-family:calibri;float: right;">
    دریافت اعتبار </i>
<br>
<hr>
<br>

<!-- <div style="width: 900px; height: 20px; margin: 0 auto;"> </div> -->
<div style="width: 900px; margin: 0 auto; font-family: Tahoma; background-clip: padding-box;
   background-color: #fff; border-radius: 4px; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.25);
   overflow: hidden; font-size: 10px;">
    <div style="background-color: #f5f5f5; width: 100%; border-bottom: 2px solid #ebebeb;
   height: 38px; padding-right: 10px; text-align: right;"> <span style="border-bottom: 2px solid #0091ff; color: #666; display: inline-block;
   font-size: 12px; height: 38px; line-height: 42px;">اطلاعات کاربری </span> </div>
    <br />
    <table cellpadding="0" cellspacing="0" style="width: 850px; margin: 0 auto; font-size: 12px;">
        <tr>
            <td><table cellpadding="0" cellspacing="0" style="width: 800px">
                    <tr style="height: 40px">

                        <td style="width: 80px; font-size:10px" > نام کاربری : </td>
                        <form method="post" action"">

                        <td style="width: 200px"><input name="username" type="text" id="username" style="text-align: center" />
                        </td>
                        <td style="width: 80px ; font-size:10px"> رمز عبور : </td>
                        <td style="width: 200px"><input  type="password" type="password" name="password" type="text" id="password" style="text-align: center" />
                        </td>
                        <td style="width: 120px ; font-size:10px"> شماره اختصاصی: </td>
                        <td><input name="number" type="text" id="number" style="text-align: center" />
                        </td>
                    </tr>

                </table>
                <ul>
                    <li style="color: Red;">در صورتی که شماره اختصاصی شما با 3000 شروع می شود 98 را به ابتدای
                        آن اضافه نمایید </li>
                </ul></td>
        </tr>
    </table>
    <br />
    <tr>
        <td><table cellpadding="0" cellspacing="0" style="width: 621px">
                <tr style="height: 40px">
                    <td style="width: 120px"> میزان اعتبار : </td>
                    <td><span id="Label1" class="label-testing" style="color:#A0A0A0;">
              <?php '.$crdt.' ?>
            </span> </td>
                </tr>
                <tr>
                    <td class="style6"></td>
                    <td class="style2"><input type="submit" name="get_credit" value="دریافت میزان اعتبار" id="Button1" style="background-color: #dbecf6;                       border:2px solid #79b7e8; border-radius: 5px; color: #1d5987; cursor: pointer; float: none; font: 12px Tahoma;
              padding-bottom: 3px; padding-top: 3px; text-align: center;" />
                        <form method="post" action="">
                        </form></td>
                </tr>
            </table></td>
</div>
<br />
<?php
if (isset($_POST['get_credit']) && $_POST["username"]  && $_POST["password"] && $_POST["number"] )
{
$client = new soapclient('http://sms.trez.ir/XmlForSMS.asmx?WSDL');
$username=$_POST["username"];
$password= $_POST["password"];
$number= $_POST["number"];
$action='credit';
$type='0';


$xmlreq='<?xml version="1.0" encoding="UTF-8"?>
          <xmlrequest>
           <username>'.$username.'</username>
           <password>'.$password.'</password>
           <number>'.$number.'</number>
           <action>'.$action.'</action>
         </xmlrequest>';

$xmlres=$client->getxml(array('xmlString'=>$xmlreq));
$xml=simplexml_load_string($xmlres->getxmlResult);

$crdt=$xml->body;

?>
<script>
    var qu = "<?php echo $crdt; ?>";
    document.getElementById("Label1").innerHTML = this.qu + ' ریال' ;
    qu.style.color = "red";
</script>
<?php
}
else{
?>
<script>
    document.getElementById("Label1").innerHTML = "لطفا تمامی اطلاعات را تکمیل نمایید";
</script>
<?php
}
?>



<!-- //////////////////////////////////////////////جهت ارسال پیام///////////////////////////////////////////////////////////////////////////////////////// -->
<br>
<br>
<br>

<i style="color:blue;font-size:30px;font-family:calibri;float: right;">
    ارسال پیام </i>
<br>
<hr>
<br>

<div style="width: 900px; margin: 0 auto; font-family: Tahoma; background-clip: padding-box;
        background-color: #fff; border-radius: 4px; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.25);
        overflow: hidden; font-size: 10px;">
    <div style="background-color: #f5f5f5; width: 100%; border-bottom: 2px solid #ebebeb;
        height: 38px; padding-right: 10px; text-align: right;"> <span style="border-bottom: 2px solid #0091ff; color: #666; display: inline-block;
        font-size: 12px; height: 38px; line-height: 42px;">ارسال پیامک </span> </div>
    <br />
    <table cellpadding="0" cellspacing="0" style="width: 850px; margin: 0 auto; font-size: 12px;">
        <tr>
            <td><table cellpadding="0" cellspacing="0" style="width: 800px">
                    <tr style="height: 40px"> </tr>
                    <td style="width: 80px; font-size:10px" > نام کاربری : </td>
                    <form method="post" action"">
                    <td style="width: 200px"><input name="username" type="text" id="username" style="text-align: center"/>
                    </td>
                    </tr>
                    <td style="width: 80px ; font-size:10px"> رمز عبور : </td>
                    <td style="width: 200px"><input  type="password" type="password" name="password" type="text" id="password" style="text-align: center" />
                    </td>
                    </tr>
                    <td style="width: 120px ; font-size:10px"> شماره اختصاصی: </td>
                    <td><input name="number" type="text" id="number" style="text-align: center" />
                    </td>
                    </tr>
                    <td style="width: 120px ; font-size:10px"> شماره گیرنده: </td>
                    <td><input name="mobile" type="text" id="mobile" style="text-align: center" />
                    </td>
                    </tr>
                    <td style="width: 120px ; font-size:10px"> متن پیام: </td>
                    <td><input name="matnepayam" type="text" id="matnepayam" style="text-align: center" />
                    </td>
                    </tr>
                    <td style="width: 120px ; font-size:10px"> شناسه پیام ارسالی: </td>
                    <td><input name="usergroupid" type="text" id="usergroupid" style="text-align: center" />
                    </td>
                    </tr>
                    <td style="width: 120px ; font-size:10px"> زمان ارسال پیام: </td>
                    <td><input name="dodate" type="text" id="dodate" style="text-align: center" />
                    </td>
                    </tr>
                </table>
                <ul>
                    <li style="color: Red;">در صورتی که شماره اختصاصی شما با 3000 شروع می شود 98 را به ابتدای
                        آن اضافه نمایید </li>
                </ul>
                <ul>
                    <li style="color: Red;">اگر تمایل به ارسال پیام آنی دارید لطفا مقدار زمان ارسال را خالی بگذارید </li>
                </ul>
                <ul>
                    <li style="color: Red;">در صورت ارسال پیام زمانبندی لطفا تاریخ را مشابه (1395/03/11 15:45:36)قرار دهید. </li>
                </ul>
                <ul>
                    <li style="color: Red;">مقدار برگشتی  ( شناسه پیام ) از این متد را برای دریافت وضعیت ذخیره نمایید </li>
                </ul></td>
        </tr>
    </table>
    <br />
    <tr>
        <td><table cellpadding="0" cellspacing="0" style="width: 621px">
                <tr style="height: 40px">
                    <td style="width: 120px"> ارسال پیام : </td>
                    <td><span id="Label2" class="sendmess" style="color:#A0A0A0;">
        <?php '.$sendmsg.' ?>
      </span> </td>
                </tr>
                <tr>
                    <td class="style6"></td>
                    <td class="style2"><input type="submit" name="send_msg" value="ارسال پیام" id="Button1" style="background-color: #dbecf6;border:2px solid #79b7e8; border-radius: 5px; color: #1d5987; cursor: pointer; float: none; font: 12px Tahoma;
        padding-bottom: 3px; padding-top: 3px; text-align: center;" />
                        </form>
                    </td>
                </tr>
            </table></td>
</div>
<br />

<?php
if (isset($_POST['send_msg']) && $_POST["username"]  && $_POST["password"] && $_POST["number"] && $_POST["matnepayam"] && $_POST["usergroupid"] &&  $_POST["mobile"])
{
$client = new soapclient('http://sms.trez.ir/XmlForSMS.asmx?WSDL');
$username=$_POST["username"];
$password= $_POST["password"];
$number= $_POST["number"];
$action='sendmessage';
$type='0';
$dodate= $_POST["dodate"];
$usergroupid= $_POST["usergroupid"];
$message=$_POST["matnepayam"];
$mobile=$_POST["mobile"];


$xmlreq='<?xml version="1.0" encoding="UTF-8"?>
  <xmlrequest>
   <username>'.$username.'</username>
   <password>'.$password.'</password>
   <number>'.$number.'</number>
   <action>'.$action.'</action>
   <type>'.$type.'</type>
   <dodate>'.$dodate.' </dodate>
   <message>'.$message.'</message>
   <usergroupid>'.$usergroupid.'</usergroupid>
   <body>
     <recipient mobile="'.$mobile.'"> </recipient>
   </body>


 </xmlrequest>';

$xmlres=$client->getxml(array('xmlString'=>$xmlreq));
$xml=simplexml_load_string($xmlres->getxmlResult);
$sendmsg=$xml->body->groupmid;

?>
<script>
    var qu = "<?php echo $sendmsg; ?>";
    document.getElementById("Label2").innerHTML ='شناسه پیام ارسالی شما:' + this.qu ;
    qu.style.color = "red";
</script>
<?php
}

else{
?>
<script>
    document.getElementById("Label2").innerHTML = "لطفا تمامی اطلاعات را تکمیل نمایید";
</script>
<?php
}
?>


<!-- ////////////////////////جهت ارسال پیام متناظر///////////////////////////////////////////////////////////////////////////////////////////////////////// -->


<i style="color:blue;font-size:30px;font-family:calibri;float: right;">
    ارسال پیام متناظر </i>
<br>
<hr>
<br>


<div style="width: 900px; margin: 0 auto; font-family: Tahoma; background-clip: padding-box;
  background-color: #fff; border-radius: 4px; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.25);
  overflow: hidden; font-size: 10px;">
    <div style="background-color: #f5f5f5; width: 100%; border-bottom: 2px solid #ebebeb;
  height: 38px; padding-right: 10px; text-align: right;"> <span style="border-bottom: 2px solid #0091ff; color: #666; display: inline-block;
  font-size: 12px; height: 38px; line-height: 42px;">ارسال پیامک </span> </div>
    <br />
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <table>
            <tr>
                <td> نام کاربری: </td>
                <td><input type="text" name="username">
                </td>
            </tr>
            <tr>
                <td> رمز عبور: </td>
                <td><input  type="password" type="text" name="password"  >
                </td>
            </tr>
            <tr>
                <td> شماره اختصاصی: </td>
                <td><input type="text" name="number" >
                </td>
            </tr>
            <tr>
                <td> شناسه پیام ارسالی: </td>
                <td><input type="text" name="usergroupid">
                </td>
            </tr>

            <tr>
                <td>گیرندگان:</td>
                <td><textarea name="nums" rows="20" cols="50"></textarea>
                </td>
            </tr>
            <tr>
                <td>متن ها: </td>
                <td><textarea name="txts" rows="20" cols="50"></textarea>
                </td>
            </tr>
        </table>
        <ul>
            <li style="color: Red;">در صورتی که شماره اختصاصی شما با 3000 شروع می شود 98 را به ابتدای
                آن اضافه نمایید </li>
        </ul>
        <ul>
            <li style="color: Red;">در قسمت گیرنده و متن هر ENTER بعنوان یک جداکننده میباشد </li>
        </ul>
        <ul>
            <li style="color: Red;">مقدار برگشتی  ( شناسه پیام ) از این متد را برای دریافت وضعیت ذخیره نمایید </li>
        </ul>
        </tr>
        <br />
        <tr>
            <td>
                <table cellpadding="0" cellspacing="0" style="width: 621px">
                    <tr style="height: 40px">
                        <td style="width: 120px">
                            ارسال پیام :
                        </td>
                        <td>
                            <span id="Label3" class="send_motenaz" style="color:#A0A0A0;"><?php '.$smotenazer.' ?> </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="style6">
                        </td>
                        <td class="style2">
                            <input type="submit" name="send_motenazer"  value="ارسال پیام"
                                   style="background-color: #dbecf6;    border:2px solid #79b7e8; border-radius: 5px; color: #1d5987; cursor: pointer;
          float: none; font: 12px Tahoma;  padding-bottom: 3px; padding-top: 3px; text-align: center;"/>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </form>
</div>
<br/>

<?php
if	(isset($_POST['send_motenazer']) &&  $_POST["username"]  && $_POST["password"] && $_POST["number"] && $_POST["usergroupid"])
{
$client = new soapclient('http://sms.trez.ir/XmlForSMS.asmx?WSDL');
$username=$_POST["username"];
$password= $_POST["password"];
$number=  $_POST["number"];
$action='sendmessage';
$type='1';
$message = '';
$usergroupid=$_POST["usergroupid"];
$mobile='';

$xmlreq='<?xml version="1.0" encoding="UTF-8"?>
  <xmlrequest>
    <username>'.$username.'</username>
    <password>'.$password.'</password>
    <number>'.$number.'</number>
    <action>'.$action.'</action>
    <type>'.$type.'</type>
    <dodate> </dodate>
    <message></message>
    <usergroupid>'.$usergroupid.'</usergroupid>
    <body>';


$nums = explode("<br />",nl2br($_POST['nums']));
$text = explode("<br />",nl2br($_POST['txts']));


for	($i=0;$i<count($nums);$i++)
{

    $doreid = rand(0,100000);
    $xmlreq=$xmlreq.'<recipient mobile="'.$nums[$i].'" doreid="'.$doreid.'">'.$text[$i].'</recipient>';

}

$xmlreq=$xmlreq.'</body></xmlrequest>';

$xmlres=$client->getxml(array('xmlString'=>$xmlreq));
$xml=simplexml_load_string($xmlres->getxmlResult);
$smotenazer=$xml->body->recipient;

?>
<script>
    var qu = "<?php echo $smotenazer; ?>";
    document.getElementById("Label3").innerHTML ='شناسه پیام ارسالی شما:' + this.qu ;
    qu.style.color = "red";
</script>
<?php
}

else{
?>
<script>
    document.getElementById("Label3").innerHTML = "لطفا تمامی اطلاعات را تکمیل نمایید";
</script>
<?php
}
?>



<!-- ////////////////////////////////////////////////دریافت وضعیت  -->
<i style="color:blue;font-size:30px;font-family:calibri;float: right;">
    وضعیت پیام </i>
<br>
<hr>
<br>


<div style="width: 900px; margin: 0 auto; font-family: Tahoma; background-clip: padding-box;
    background-color: #fff; border-radius: 4px; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.25);
    overflow: hidden; font-size: 10px;">
    <div style="background-color: #f5f5f5; width: 100%; border-bottom: 2px solid #ebebeb;
    height: 38px; padding-right: 10px; text-align: right;">
    <span style="border-bottom: 2px solid #0091ff; color: #666; display: inline-block;
    font-size: 12px; height: 38px; line-height: 42px;">وضعیت پیام </span>
    </div>
    <br />
    <table cellpadding="0" cellspacing="0" style="width: 850px; margin: 0 auto; font-size: 12px;">
        <tr>
            <td>
                <table cellpadding="0" cellspacing="0" style="width: 800px">
                    <tr style="height: 40px">
                    </tr>
                    <td style="width: 80px; font-size:10px" >
                        نام کاربری :
                    </td>
                    <form method="post" action"">
                    <td style="width: 200px">
                        <input name="username" type="text" id="username" style="text-align: center" />
                    </td>
                    </tr>
                    <td style="width: 80px ; font-size:10px">
                        رمز عبور :
                    </td>
                    <td style="width: 200px">
                        <input  type="password" name="password" type="text" id="password" style="text-align: center" />
                    </td>
                    </tr>
                    <td style="width: 120px ; font-size:10px">
                        شماره اختصاصی:
                    </td>
                    <td>
                        <input name="number" type="text" id="number" style="text-align: center" />
                    </td>
                    </tr>
                    <td style="width: 120px ; font-size:10px">
                        شناسه پیام:
                    </td>
                    <td>
                        <input name="usergroupid" type="text" id="usergroupid" style="text-align: center" />
                    </td>
                    </tr>
                    <td style="width: 120px ; font-size:10px">
                        شماره موبایل:
                    </td>
                    <td>
                        <input name="mobile" type="text" id="mobile" style="text-align: center" />
                    </td>

                </table>
                <ul>
                    <li style="color: Red;">در صورتی که شماره اختصاصی شما با 3000 شروع می شود 98 را به ابتدای
                        آن اضافه نمایید </li>
                </ul>
            </td>
        </tr>
    </table>
    <br />
    <tr>
        <td>
            <table cellpadding="0" cellspacing="0" style="width: 621px">
                <tr style="height: 40px">
                    <td style="width: 120px">
                        وضعیت پیام :
                    </td>
                    <td>
                        <span id="Label4" class="label-testing" style="color:#A0A0A0;"><?php '.$getstatus.' ?></span>
                    </td>
                </tr>


                <tr>
                    <td class="style6">
                    </td>
                    <td class="style2">
                        <input type="submit" name="get_status" value="دریافت وضعیت پیام" id="Button1" style="background-color: #dbecf6;                       border:2px solid #79b7e8; border-radius: 5px; color: #1d5987; cursor: pointer; float: none; font: 12px Tahoma;
         padding-bottom: 3px; padding-top: 3px; text-align: center;" />
                        </form>
                        <form method="post" action="">
                        </form>
                    </td>
                </tr>
            </table>
        </td>

</div>
<br />

<?php

if (isset($_POST['get_status']) && $_POST["usergroupid"] && $_POST["username"]  && $_POST["password"] && $_POST["number"] && $_POST["mobile"])
{
$client = new soapclient('http://sms.trez.ir/XmlForSMS.asmx?WSDL');
$username=$_POST["username"];
$password= $_POST["password"];
$number= $_POST["number"];
$mobile=$_POST["mobile"];
$action='status';
$type='0';
$status='';
$usergroupid= $_POST["usergroupid"];


$xmlreq='<?xml version="1.0" encoding="UTF-8"?>
  <xmlrequest>

    <username>'.$username.'</username>
    <password>'.$password.'</password>
    <number>'.$number.'</number>
    <action>'.$action.'</action>
    <type>'.$type.'</type>
    <usergroupid>'.$usergroupid.'</usergroupid>
    <body status="1">
     <recipient mobile="'.$mobile.'">"'.$status.'"</recipient>
   </body>
 </xmlrequest>';

$xmlres=$client->getxml(array('xmlString'=>$xmlreq));
$xml=simplexml_load_string($xmlres->getxmlResult);
$getstatus=$xml->body->recipient;
?>

<script>
    var qu = "<?php echo $getstatus; ?>";
    document.getElementById("Label4").innerHTML = this.qu ;
</script>

<?php
}
else{
?>

<script>
    document.getElementById("Label4").innerHTML = "لطفا تمامی اطلاعات را تکمیل نمایید";
</script>

<?php
}
/////////////////////////////////////////FOOOOTER/////////////////////////////////////////////////////////////////////////////////////////////////////
?>
<div id="footer" style="color:#00CCFF" align="center">
    <p> <span style="color: #663333">&copy; 2016</span> <a href="/index.aspx" target="_blank"><strong>WWW.TREZ.IR</strong></a> | <span style="color:       #660099"><span style="color: #993333">Design by:</span> </span><strong><a target="_blank" href="http://trez.ir">Aida Tadayyon</a></strong> </p>
</div>
</html>
