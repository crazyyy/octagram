<?
//uncomment for debugging
//print_r($_POST);
 
//most sites have magic quotes on
//but if they do not, this code simulates magic quotes
if( !get_magic_quotes_gpc() )
{
    if( is_array($_POST) )
        $_POST = array_map('addslashes', $_POST);
}
 
//make sure there is data in the name and email fields
if( empty($_POST["Name"]) )
{
    $error["name"] = "����� ��� ";
    $Name = "";
}
else
    $Name = $_POST["Name"];
 
if( empty($_POST["Email"]) )
{
    $error["email"] = "��� Email";
    $Email = "";
}
else
    $Email = $_POST["Email"];
 
if( empty($_POST["OtherInfo"]) )
{
	 $error["OtherInfo"] = "����� ��������";
    $OtherInfo = "";
}
else
    $OtherInfo = $_POST["OtherInfo"];
 
 

if( is_array($error) )
{
 
 echo "<div style='width:500px; color: #fff; background-color: #00468c;-webkit-box-shadow: 0 0 10px 0 rgba(0,0,0,0.2);box-shadow: 0 0 10px 0 rgba(0,0,0,0.2);z-index: 1; padding: 20px;margin: 50px auto;font-family: arial;line-height: 20px;'>";
echo "<div style='position: relative;height: 60px;width: 100%;text-align: center;'>";
echo "<a href='http://octagram.kick-starts.ru'><img src='http://octagram.kick-starts.ru/wp-content/themes/octagram/img/logo.png'></a>";
echo "</div>";
echo "<div style='position: relative;width: 100%;text-align: left;font-size: 12px;color: #fff;padding-left:50px;'>";


    echo "<h3>������</h3> ";
	 echo "��� ���������� ��������� ��������� ����: ";
    echo "<br>\n";
 echo "<br>\n";
    while(list($key, $val) = each($error))
    {
        echo $val;
        echo "<br>\n";
    }
 ?>
<form>
<input type="button" value="�������� � ���������� �����" 
onClick="history.back()">
</form>
<?
echo "</div>";

    //stop everything as we have errors and should not continue
    exit();
 
}

 
 $title = htmlspecialchars($_POST['title']);

 $name1 = htmlspecialchars($_POST['name1']);
 $qtyA = htmlspecialchars($_POST['qtyA']);
 $totalA = htmlspecialchars($_POST['totalA']);
 $name2 = htmlspecialchars($_POST['name2']);
 $qtyB = htmlspecialchars($_POST['qtyB']);
 $totalB = htmlspecialchars($_POST['totalB']);
 $name3 = htmlspecialchars($_POST['name3']);
 $qtyC = htmlspecialchars($_POST['qtyC']);
 $totalC = htmlspecialchars($_POST['totalC']);
 $name4 = htmlspecialchars($_POST['name4']);
 $qtyD = htmlspecialchars($_POST['qtyD']);
 $totalD = htmlspecialchars($_POST['totalD']);
 $name5 = htmlspecialchars($_POST['name5']);
 $qtyE = htmlspecialchars($_POST['qtyE']);
 $totalE = htmlspecialchars($_POST['totalE']);
 $name6 = htmlspecialchars($_POST['name6']);
 $qty1A = htmlspecialchars($_POST['qty1A']);
 $total1A = htmlspecialchars($_POST['total1A']);
 $name7 = htmlspecialchars($_POST['name7']);
 $qty1B = htmlspecialchars($_POST['qty1B']);
 $total1B = htmlspecialchars($_POST['total1B']);
 $name8 = htmlspecialchars($_POST['name8']);
 $qty1C = htmlspecialchars($_POST['qty1C']);
 $total1C = htmlspecialchars($_POST['total1C']);
 $name9 = htmlspecialchars($_POST['name9']);
 $qty1D = htmlspecialchars($_POST['qty1D']);
 $total1D = htmlspecialchars($_POST['total1D']);
 $name10 = htmlspecialchars($_POST['name10']);
 $qty1E = htmlspecialchars($_POST['qty1E']);
 $total1E = htmlspecialchars($_POST['total1E']);
 $ssna1 = htmlspecialchars($_POST['ssna1']);
 $qtyss1 = htmlspecialchars($_POST['qtyss1']);
 $totalss1 = htmlspecialchars($_POST['totalss1']);
 $ssna2 = htmlspecialchars($_POST['ssna2']);
 $qtyss2 = htmlspecialchars($_POST['qtyss2']);
 $totalss2 = htmlspecialchars($_POST['totalss2']);
 $ssna3 = htmlspecialchars($_POST['ssna3']);
 $qtyss3 = htmlspecialchars($_POST['qtyss3']);
 $totalss3 = htmlspecialchars($_POST['totalss3']);
 $ssna4 = htmlspecialchars($_POST['ssna4']);
 $qtyss4 = htmlspecialchars($_POST['qtyss4']);
 $totalss4 = htmlspecialchars($_POST['totalss4']);
 $ssna5 = htmlspecialchars($_POST['ssna5']);
 $qtyss5 = htmlspecialchars($_POST['qtyss5']);
 $totalss5 = htmlspecialchars($_POST['totalss5']);
 $ssna11 = htmlspecialchars($_POST['ssna11']);
 $qtyss11 = htmlspecialchars($_POST['qtyss11']);
 $totalss11 = htmlspecialchars($_POST['totalss11']);
 $ssna22 = htmlspecialchars($_POST['ssna22']);
 $qtyss22 = htmlspecialchars($_POST['qtyss22']);
 $totalss22 = htmlspecialchars($_POST['totalss22']);
 $ssna33 = htmlspecialchars($_POST['ssna33']);
 $qtyss33 = htmlspecialchars($_POST['qtyss33']);
 $totalss33 = htmlspecialchars($_POST['totalss33']);
 $ssna44 = htmlspecialchars($_POST['ssna44']);
 $qtyss44 = htmlspecialchars($_POST['qtyss44']);
 $totalss44 = htmlspecialchars($_POST['totalss44']);
 $ssna55 = htmlspecialchars($_POST['ssna55']);
 $qtyss55 = htmlspecialchars($_POST['qtyss55']);
 $totalss11 = htmlspecialchars($_POST['totalss55']);
 $ssna111 = htmlspecialchars($_POST['ssna111']);
 $qtyss111 = htmlspecialchars($_POST['qtyss111']);
 $totalss111 = htmlspecialchars($_POST['totalss111']);
 $ssna222 = htmlspecialchars($_POST['ssna222']);
 $qtyss222 = htmlspecialchars($_POST['qtyss222']);
 $totalss222 = htmlspecialchars($_POST['totalss222']);
 $ssna333 = htmlspecialchars($_POST['ssna333']);
 $qtyss333 = htmlspecialchars($_POST['qtyss333']);
 $totalss333 = htmlspecialchars($_POST['totalss333']);
 $ssna444 = htmlspecialchars($_POST['ssna444']);
 $qtyss444 = htmlspecialchars($_POST['qtyss444']);
 $totalss444 = htmlspecialchars($_POST['totalss444']);
 $ssna555 = htmlspecialchars($_POST['ssna555']);
 $qtyss555 = htmlspecialchars($_POST['qtyss555']);
 $totalss555 = htmlspecialchars($_POST['totalss555']);
 $name1d = htmlspecialchars($_POST['name1d']);
 $qtydopA = htmlspecialchars($_POST['qtydopA']);
 $totalAdop = htmlspecialchars($_POST['totalAdop']);
 $name2d = htmlspecialchars($_POST['name2d']);
 $qtydopB = htmlspecialchars($_POST['qtydopB']);
 $totalBdop = htmlspecialchars($_POST['totalBdop']);
 $name3d = htmlspecialchars($_POST['name3d']);
 $qtydopC = htmlspecialchars($_POST['qtydopC']);
 $totalCdop = htmlspecialchars($_POST['totalCdop']);
 $name4d = htmlspecialchars($_POST['name4d']);
 $qtydopD = htmlspecialchars($_POST['qtydopD']);
 $totalDdop = htmlspecialchars($_POST['totalDdop']);
 $name5d = htmlspecialchars($_POST['name5d']);
 $qtydopE = htmlspecialchars($_POST['qtydopE']);
 $totalEdop = htmlspecialchars($_POST['totalEdop']);
 $name6d = htmlspecialchars($_POST['name6d']);
 $qtydop1A = htmlspecialchars($_POST['qtydop1A']);
 $total1Adop = htmlspecialchars($_POST['total1Adop']);
 $name7d = htmlspecialchars($_POST['name7d']);
 $qtydop1B = htmlspecialchars($_POST['qtydop1B']);
 $total1Bdop = htmlspecialchars($_POST['total1Bdop']);
 $name8d = htmlspecialchars($_POST['name8d']);
 $qtydop1C = htmlspecialchars($_POST['qtydop1C']);
 $total1Cdop = htmlspecialchars($_POST['total1Cdop']);
 $name9d = htmlspecialchars($_POST['name9d']);
 $qtydop1D = htmlspecialchars($_POST['qtydop1D']);
 $total1Ddop = htmlspecialchars($_POST['total1Ddop']);
 $name10d = htmlspecialchars($_POST['name10d']);
 $qtydop1E = htmlspecialchars($_POST['qtydop1E']);
 $total1Edop = htmlspecialchars($_POST['total1Edop']);

$GrandTotal = htmlspecialchars($_POST['GrandTotal']);
  

//we have our data, and now build up an email message to send Sale@octagram.ru
$mailto = "sasha.didenko@mail.ru";
$subject = "����� ������� " . $title . "";
$body .= "<style> a { color: #fff }</style>";
$body .= "<div style='width:500px; color: #fff; background-color: #00468c;-webkit-box-shadow: 0 0 10px 0 rgba(0,0,0,0.2);box-shadow: 0 0 10px 0 rgba(0,0,0,0.2);z-index: 1; padding: 20px;margin: 50px auto;font-family: arial;line-height: 20px;'>";
$body .= "<div style='position: relative;height: 60px;width: 100%;text-align: center;'>";
$body .= "<a href='http://octagram.kick-starts.ru'><img src='http://octagram.kick-starts.ru/wp-content/themes/octagram/img/logo.png'></a>";
$body .= "</div>";
$body .= "<div style='position: relative;width: 100%;text-align: left;font-size: 12px;color: #fff;padding-left:50px;'>";
$body .= "<b>��� ����������:</b> " . $Name . "\n<br>";
$body .= "<b>Email ����������:</b> " . $Email . "\n<br>";
$body .= "<b>���������� �������:</b> " . $OtherInfo . "\n<br>";
$body .= "</div>";
$body .= "<div style='position: relative;width: 100%;text-align: center;color: #fff;'>";
$body .= "<h3 style='color: #fff;'><small>�������:</small> " . $title . "</h3>";
$body .= "</div>";
$body .= "<div style='position: relative;width: 100%;text-align: left;'>";
$body .= "<h3 style='color: #fff;'>������������ �����:</h3>\n";
if( empty($_POST["name1"]) )
{
}
else
$body .= "��������: " . $name1 . ". ����������: " . $qtyA . ". ���������: " . $totalA . "\n<br>";
if( empty($_POST["name2"]) )
{
}
else
$body .= "��������: " . $name2 . ". ����������: " . $qtyB . ". ���������: " . $totalB . "\n<br>";
if( empty($_POST["name3"]) )
{
}
else
$body .= "��������: " . $name3 . ". ����������: " . $qtyC . ". ���������: " . $totalC . "\n<br>";
if( empty($_POST["name4"]) )
{
}
else
$body .= "��������: " . $name4 . ". ����������: " . $qtyD . ". ���������: " . $totalD . "\n<br>";
if( empty($_POST["name5"]) )
{
}
else
$body .= "��������: " . $name5 . ". ����������: " . $qtyE . ". ���������: " . $totalE . "\n<br>";
if( empty($_POST["name6"]) )
{
}
else
$body .= "��������: " . $name6 . ". ����������: " . $qty1A . ". ���������: " . $total1A . "\n<br>";
if( empty($_POST["name7"]) )
{
}
else
$body .= "��������: " . $name7 . ". ����������: " . $qty1B . ". ���������: " . $total1B . "\n<br>";
if( empty($_POST["name8"]) )
{
}
else
$body .= "��������: " . $name8 . ". ����������: " . $qty1C . ". ���������: " . $total1C . "\n<br>";
if( empty($_POST["name9"]) )
{
}
else
$body .= "��������: " . $name9 . ". ����������: " . $qty1D . ". ���������: " . $total1D . "\n<br>";
if( empty($_POST["name10"]) )
{
}
else
$body .= "��������: " . $name10 . ". ����������: " . $qty1E . ". ���������: " . $total1E . "\n<br>";
$body .= "</div>";
$body .= "<div style='position: relative;width: 100%;text-align: left;'>";
$body .= "<h3 style='color: #fff;'>Additional options:</h3>\n";
if( empty($_POST["ssna1"]) )
{
}
else
$body .= "��������: " . $ssna1 . ". ����������: " . $qtyss1 . ". ���������: " . $totalss1 . "\n<br>";
if( empty($_POST["ssna2"]) )
{
}
else
$body .= "��������: " . $ssna2 . ". ����������: " . $qtyss2 . ". ���������: " . $totalss2 . "\n<br>";
if( empty($_POST["ssna3"]) )
{
}
else
$body .= "��������: " . $ssna3 . ". ����������: " . $qtyss3 . ". ���������: " . $totalss3 . "\n<br>";
if( empty($_POST["ssna4"]) )
{
}
else
$body .= "��������: " . $ssna4 . ". ����������: " . $qtyss4 . ". ���������: " . $totalss4 . "\n<br>";
if( empty($_POST["ssna5"]) )
{
}
else
$body .= "��������: " . $ssna5 . ". ����������: " . $qtyss5 . ". ���������: " . $totalss5 . "\n<br>";
if( empty($_POST["ssna11"]) )
{
}
else
$body .= "��������: " . $ssna11 . ". ����������: " . $qtyss11 . ". ���������: " . $totalss11 . "\n<br>";
if( empty($_POST["ssna22"]) )
{
}
else
$body .= "��������: " . $ssna22 . ". ����������: " . $qtyss22 . ". ���������: " . $totalss22 . "\n<br>";
if( empty($_POST["ssna33"]) )
{
}
else
$body .= "��������: " . $ssna33 . ". ����������: " . $qtyss33 . ". ���������: " . $totalss33 . "\n<br>";
if( empty($_POST["ssna44"]) )
{
}
else
$body .= "��������: " . $ssna44 . ". ����������: " . $qtyss44 . ". ���������: " . $totalss44 . "\n<br>";
if( empty($_POST["ssna55"]) )
{
}
else
$body .= "��������: " . $ssna55 . ". ����������: " . $qtyss55 . ". ���������: " . $totalss55 . "\n<br>";
if( empty($_POST["ssna111"]) )
{
}
else
$body .= "��������: " . $ssna111 . ". ����������: " . $qtyss111 . ". ���������: " . $totalss111 . "\n<br>";
if( empty($_POST["ssna222"]) )
{
}
else
$body .= "��������: " . $ssna222 . ". ����������: " . $qtyss222 . ". ���������: " . $totalss222 . "\n<br>";
if( empty($_POST["ssna333"]) )
{
}
else
$body .= "��������: " . $ssna333 . ". ����������: " . $qtyss333 . ". ���������: " . $totalss333 . "\n<br>";
if( empty($_POST["ssna444"]) )
{
}
else
$body .= "��������: " . $ssna444 . ". ����������: " . $qtyss444 . ". ���������: " . $totalss444 . "\n<br>";
if( empty($_POST["ssna555"]) )
{
}
else
$body .= "��������: " . $ssna555 . ". ����������: " . $qtyss555 . ". ���������: " . $totalss555 . "\n<br>";
if( empty($_POST["name1d"]) )
{
}
else
$body .= "��������: " . $name1d . ". ����������: " . $qtydopA . ". ���������: " . $totalAdop . "\n<br>";
if( empty($_POST["name2d"]) )
{
}
else
$body .= "��������: " . $name2d . ". ����������: " . $qtydopB . ". ���������: " . $totalBdop . "\n<br>";
if( empty($_POST["name3d"]) )
{
}
else
$body .= "��������: " . $name3d . ". ����������: " . $qtydopC . ". ���������: " . $totalCdop . "\n<br>";
if( empty($_POST["name4d"]) )
{
}
else
$body .= "��������: " . $name4d . ". ����������: " . $qtydopD . ". ���������: " . $totalDdop . "\n<br>";
if( empty($_POST["name5d"]) )
{
}
else
$body .= "��������: " . $name5d . ". ����������: " . $qtydopE . ". ���������: " . $totalEdop . "\n<br>";
if( empty($_POST["name6d"]) )
{
}
else
$body .= "��������: " . $name6d . ". ����������: " . $qtydop1A . ". ���������: " . $total1Adop . "\n<br>";
if( empty($_POST["name7d"]) )
{
}
else
$body .= "��������: " . $name7d . ". ����������: " . $qtydop1B . ". ���������: " . $total1Bdop . "\n<br>";
if( empty($_POST["name8d"]) )
{
}
else
$body .= "��������: " . $name8d . ". ����������: " . $qtydop1C . ". ���������: " . $total1Cdop . "\n<br>";
if( empty($_POST["name9d"]) )
{
}
else
$body .= "��������: " . $name9d . ". ����������: " . $qtydop1D . ". ���������: " . $total1Ddop . "\n<br>";
if( empty($_POST["name10d"]) )
{
}
else
$body .= "��������: " . $name10d . ". ����������: " . $qtydop1E . ". ���������: " . $total1Edop . "\n<br>";
$body .= "</div>";
$body .= "<div style='position: relative;width: 100%;text-align: left;'>";
$body .= "<h3 style='color: #fff;'>�����: " . $GrandTotal . "\n</h3>";
$body .= "</div>";
$body .= "<a  style='float: left;' href='javascript:(print());'>����������� ���������</a>";
$body .= "<a style='float: right;' href='http://www.octagram.ru/'>�� �������</a>";
$body .= "</div>";
 
mail($mailto, $subject, $body, "Content-Type: text/html; windows-1251");
mail($Email, $subject, $body, "Content-Type: text/html; windows-1251");
 
//we should state the order was sent
 echo $body;

?>
<!-- Yandex.Metrika counter --><script type="text/javascript">(function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter26221809 = new Ya.Metrika({id:26221809, webvisor:true, clickmap:true, trackLinks:true, accurateTrackBounce:true}); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks");</script><noscript><div><img src="//mc.yandex.ru/watch/26221809" style="position:absolute; left:-9999px;" alt="" /></div></noscript><!-- /Yandex.Metrika counter -->

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-33904446-2', 'auto');
  ga('require', 'displayfeatures');
  ga('send', 'pageview');

</script>

<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-NBZRPB"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NBZRPB');</script>
<!-- End Google Tag Manager -->