<!DOCTYPE HTML>
<html>
  <!--

  NTU ID Creator by h999342@gmail.com
  Inspired by the Following Project

  Introduction to Computers, Lab
  Fall 2013, Dept. of Information Management, National Taiwan University

  Week 6 Assignment

  TAs: Chien-Husn Tseng and Jero Yu
  Student: b02705020 虞翔皓
  -->
<head>
<?php
$og_url = 'https://ntu.shouko.tw/id-creator/';
$og_img = 'og.png';
if(isset($_GET['u'])){
  $og_img = $_GET['u'];
  $og_img = preg_replace("/[^a-zA-Z0-9]+/", "", $og_img);
  $og_url .= "?u=".$og_img;
  $og_img = "https://i.imgur.com/".$og_img.".png";
}
?>
  <title>NTU ID Creator</title>
  <meta charset="UTF-8">
  <meta property="og:title" content="懷舊版 NTU 學生證產生器" />
  <meta property="og:type" content="article" />
  <meta property="og:image" content="<?= $og_img ?>" />
  <meta property="og:url" content="<?= $og_url ?>" />
  <meta property="og:description" content="懷舊版 NTU 學生證產生器" />
  <meta property="fb:app_id" content="516567928454960" />

  <link rel="stylesheet" href="style.css?201609151605">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  <script src="./html2canvas.js"></script>
  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  <script type="text/javascript">

// Convert a data URI to blob
function dataURItoBlob(dataURI) {
var byteString = atob(dataURI.split(',')[1]);
var ab = new ArrayBuffer(byteString.length);
var ia = new Uint8Array(ab);
for (var i = 0; i < byteString.length; i++) {
    ia[i] = byteString.charCodeAt(i);
}
return new Blob([ab], {
    type: 'image/png'
});
}

 function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      formInit();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';
    }
  }

function formInit() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Good to see you, ' + response.name + '.');
      $("#fblogin").css('display',"none");
      $("#data-form").css('display',"");
      $("#input-name").val(response.name);
      $("#owner-photo").attr('src', 'fbimg.php?u='+response.id);
    });
  }

  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }
    $(document).ready(function () {
        $.ajaxSetup({
            cache: true
        });
        $.getScript('//connect.facebook.net/zh_TW/all.js', function () {
            // Load the APP / SDK
            FB.init({
                appId: '516567928454960', // App ID from the App Dashboard
                cookie: true, // set sessions cookies to allow your server to access the session?
                xfbml: true, // parse XFBML tags on this page?
                frictionlessRequests: true,
                oauth: true
            });

        });
      });

  var imgToPost = "";
  var imglink = "";

  var status_base=new Array(10);
  status_base[0]="新發";
  status_base[1]="補發 1";
  status_base[2]="補發 2";
  status_base[3]="補發 3";
  status_base[4]="補發 4";
  status_base[5]="補發 5";
  status_base[6]="補發 6";
  status_base[7]="補發 7";
  status_base[8]="補發 8";
  status_base[9]="補發 9";
  $(function() {
    var availableDepts = ["中國文學系","外國語文學系","歷史學系","哲學系","人類學系","圖書資訊學系","日本語文學系","戲劇學系","藝術史研究所","語言學研究所","音樂學研究所","臺灣文學研究所","華語教學碩士學位學程","數學系","物理學系","化學系","地質科學系","心理學系","地理環境資源學系","大氣科學系","海洋研究所","天文物理研究所","應用物理學研究所","政治學系","經濟學系","社會學系","社會工作學系","國家發展研究所","新聞研究所","醫學系","牙醫學系","藥學系","醫學檢驗暨生物技術學系","護理學系","物理治療學系","職能治療學系","臨床醫學研究所","臨床牙醫學研究所","生理學研究所","生化學研究所","藥理學研究所","病理學研究所","微生物學研究所","解剖學研究所","毒理學研究所","分子醫學研究所","免疫學研究所","口腔生物科學研究所","臨床藥學研究所","法醫學研究所","腫瘤醫學研究所","腦與心智科學研究所","臨床基因醫學研究所","轉譯醫學博士學位學程","土木工程學系","機械工程學系","化學工程學系","工程科學及海洋工程學系","材料科學與工程學系","環境工程學研究所","應用力學研究所","建築與城鄉研究所","工業工程學研究所","醫學工程學研究所","高分子科學與工程學研究所","農藝學系","生物環境系統工程學系","農業化學系","森林環境暨資源學系","動物科學技術學系","農業經濟學系","園藝暨景觀學系","獸醫學系","生物產業傳播暨發展學系","生物產業機電工程學系","昆蟲學系","植物病理與微生物學系","食品科技研究所","生物科技研究所","臨床動物醫學研究所","分子暨比較病理生物學研究所","植物醫學碩士學位學程","工商管理學系","會計學系","財務金融學系","國際企業學系","資訊管理學系","高階管理碩士專班","商學研究所","管理學院高階公共管理組","管理學院會計與管理決策組","管理學院財務金融組","管理學院國際企業管理組","管理學院資訊管理組","管理學院商學組","管理學院企業管理碩士專班","臺大-復旦EMBA","公共衛生學系","職業醫學與工業衛生研究所","環境衛生研究所","衛生政策與管理研究所","公共衛生碩士學程","健康政策與管理研究所","流行病學與預防醫學研究所","電機工程學系","資訊工程學系","光電工程學研究所","電信工程學研究所","電子工程學研究所","資訊網路與多媒體研究所","生醫電子與資訊學研究所","法律學系","科際整合法律學研究所","生命科學系","生化科技學系","動物學研究所","植物科學研究所","分子與細胞生物學研究所","生態學與演化生物學研究所","漁業科學研究所","生化科學研究所","微生物與生化學研究所","基因體與系統生物學學位學程","牙醫學系","臨床牙醫學研究所","口腔生物科學研究所","獸醫學系","臨床動物醫學研究所","分子暨比較病理生物學研究所"];
    $( "#input-dept" ).autocomplete({
      source: availableDepts
    });
  });


function uploadToIu(){
  $('#loading').css('visibility', '');

  var img = imgToPost.split(',')[1];

  $.ajax({
      url: 'https://api.imgur.com/3/image',
      type: 'post',
      headers: {
          Authorization: 'Client-ID 72c62382d2a73f2'
      },
      data: {
          image: img
      },
      dataType: 'json',
      success: function(response) {
          if(response.success) {
            $('#loading').css('visibility', 'hidden');
            console.log(response.data.link);
            imglink = response.data.link;
            imglink = imglink.split('.com/');
            imglink = imglink[1].split('.png');
            imglink = imglink[0];
            $("#iuLink").css('display',"");
            $("#iuLink").val('https://ntu.shouko.tw/id-creator/?u='+imglink);
            $('#shareToFb').css('display', '');
          }
      }
  });
}

  function shareToFb() {
    window.open(
    'https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent('https://ntu.shouko.tw/id-creator/?u='+imglink),
    'facebook-share-dialog',
    'width=626,height=436');
  }

  function create(){
		$('#loading').css('visibility', '');
		$('#og_display').css('display', 'none');
    $("#result-dept").html($("#input-dept").val());
    $("#result-id").html($("#input-id").val());
    $("#result-id-status").html(status_base[$("#input-id-status").val()]);
    $("#result-name").html($("#input-name").val());
    $("#result-birthday").html($("#input-birthday-year").val()+"年"+$("#input-birthday-month").val()+"月"+$("#input-birthday-day").val()+"日");
    $("#owner-photo").attr('src', $("#input-photourl").val());
    $("#id-outline").css('visibility', "visible");
    html2canvas($("#id-outline"), {
       onrendered: function(canvas) {
        imgToPost = canvas.toDataURL('image/png');
        $("#canvas-container").html('<img id="finalId" src="">');
        $("#finalId").attr('src',imgToPost);
         $("#id-outline").css('visibility', "hidden");
        $('#loading').css('visibility', 'hidden');
        $("#post2fb").css('display',"");
        $("#shareToFb").css('display',"none");
      }
     });
  }
  </script>
</head>
<body>
  <div class="creator-form">
    <h1>NTU ID Creator</h1>
    <h4>歡迎使用懷舊版台大學生證產生器！登入FB後請輸入欄位並按下Create即可產生。本工具僅供紀念使用 QQ</h4>
    <div id="fblogin"><fb:login-button data-size="xlarge" scope="public_profile" onlogin="checkLoginState();">
</fb:login-button>  <div id="status">
</div>
</div>

<div id="data-form" style="display:none">
    系所：<input id="input-dept" value="資訊管理學系"><br>
    學號：<input id="input-id" value="B00000000"><br>
    狀態：<select id="input-id-status">
        <option value="0" selected>新發</option>
        <option value="1">補發 1</option>
        <option value="2">補發 2</option>
        <option value="3">補發 3</option>
        <option value="4">補發 4</option>
        <option value="5">補發 5</option>
        <option value="6">補發 6</option>
        <option value="7">補發 7</option>
        <option value="8">補發 8</option>
        <option value="9">補發 9</option>
      </select><br>
    姓名：<input id="input-name"><br>
    生日：
    <input id="input-birthday-year" size="7" maxlength="" value="民國87">年
    <input id="input-birthday-month" size="2" maxlength="2" value="8">月
    <input id="input-birthday-day" size="2" maxlength="2" value="7">日<br>

    <button onclick="create()" class="go-button">Create</button>
</div>
  </div>

   <div id="canvas-container"></div>

<div id="og-display-container">
<img src="<?= $og_img ?>" id="og_display">
	<div id="loading" style="visibility:hidden"><img src="loading.gif"></div>
	<div id="iuLinkContainer"><input id="iuLink" style="display:none" size="50" /></div>
</div>

   <div id="post2fb" style="display:none">
     <button onclick="uploadToIu()" class="post-button">上傳</button>
     <button onclick="shareToFb()" class="post-button" id="shareToFb" style="display:none">分享到 Facebook</button>
   </div>

<div class="facebook-container">
<div class="fb-comments" data-href="<?= $og_url ?>" data-numposts="5" data-colorscheme="light"></div>
</div>

  <div id="id-outline" style="visibility: hidden;">

    <img src="default_female.jpg" id="owner-photo">
    <ul class="owner-info">
      <li>系所：<span id="result-dept"></span></li><br>
      <li>學號：<span id="result-id"></span> <span id="result-id-status"></span></li>
      <li>姓名：<span id="result-name"></span></li>
      <li>生日：<span id="result-birthday"></span></li>
    </ul>
    <span id="watermark">Created using http://ntu.shouko.tw/id-creator</span>
  </div>

  <div id="footer">by Shouko, NTUIM</div>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-45786123-5', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>
