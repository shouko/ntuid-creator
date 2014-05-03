<!DOCTYPE HTML>
<html>
	<!--

	NTU ID Creator by h999342@gmail.com
	Originated From the Following Project

	Introduction to Computers, Lab
	Fall 2013, Dept. of Information Management, National Taiwan University

	Week 6 Assignment

	TAs: Chien-Husn Tseng and Jero Yu
	Student: b02705020 虞翔皓
	-->
<head>
	<title>My NTU ID Creator</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css?<?php echo time()?>">
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  <script src="./html2canvas.js"></script>
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<script type="text/javascript">
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
    var availableDepts = [
  "中國文學系",
  "外國語文學系",
  "歷史學系",
  "哲學系",
  "人類學系",
  "圖書資訊學系",
  "日本語文學系",
  "戲劇學系",
  "藝術史研究所",
  "語言學研究所",
  "音樂學研究所",
  "臺灣文學研究所",
  "華語教學碩士學位學程",
  "數學系",
  "物理學系",
  "化學系",
  "地質科學系",
  "心理學系",
  "地理環境資源學系",
  "大氣科學系",
  "海洋研究所",
  "天文物理研究所",
  "應用物理學研究所",
  "政治學系",
  "經濟學系",
  "社會學系",
  "社會工作學系",
  "國家發展研究所",
  "新聞研究所",
  "醫學系",
  "牙醫學系",
  "藥學系",
  "醫學檢驗暨生物技術學系",
  "護理學系",
  "物理治療學系",
  "職能治療學系",
  "臨床醫學研究所",
  "臨床牙醫學研究所",
  "生理學研究所",
  "生化學研究所",
  "藥理學研究所",
  "病理學研究所",
  "微生物學研究所",
  "解剖學研究所",
  "毒理學研究所",
  "分子醫學研究所",
  "免疫學研究所",
  "口腔生物科學研究所",
  "臨床藥學研究所",
  "法醫學研究所",
  "腫瘤醫學研究所",
  "腦與心智科學研究所",
  "臨床基因醫學研究所",
  "轉譯醫學博士學位學程",
  "土木工程學系",
  "機械工程學系",
  "化學工程學系",
  "工程科學及海洋工程學系",
  "材料科學與工程學系",
  "環境工程學研究所",
  "應用力學研究所",
  "建築與城鄉研究所",
  "工業工程學研究所",
  "醫學工程學研究所",
  "高分子科學與工程學研究所",
  "農藝學系",
  "生物環境系統工程學系",
  "農業化學系",
  "森林環境暨資源學系",
  "動物科學技術學系",
  "農業經濟學系",
  "園藝暨景觀學系",
  "獸醫學系",
  "生物產業傳播暨發展學系",
  "生物產業機電工程學系",
  "昆蟲學系",
  "植物病理與微生物學系",
  "食品科技研究所",
  "生物科技研究所",
  "臨床動物醫學研究所",
  "分子暨比較病理生物學研究所",
  "植物醫學碩士學位學程",
  "工商管理學系",
  "會計學系",
  "財務金融學系",
  "國際企業學系",
  "資訊管理學系",
  "高階管理碩士專班",
  "商學研究所",
  "管理學院高階公共管理組",
  "管理學院會計與管理決策組",
  "管理學院財務金融組",
  "管理學院國際企業管理組",
  "管理學院資訊管理組",
  "管理學院商學組",
  "管理學院企業管理碩士專班",
  "臺大-復旦EMBA",
  "公共衛生學系",
  "職業醫學與工業衛生研究所",
  "環境衛生研究所",
  "衛生政策與管理研究所",
  "公共衛生碩士學程",
  "健康政策與管理研究所",
  "流行病學與預防醫學研究所",
  "電機工程學系",
  "資訊工程學系",
  "光電工程學研究所",
  "電信工程學研究所",
  "電子工程學研究所",
  "資訊網路與多媒體研究所",
  "生醫電子與資訊學研究所",
  "法律學系",
  "科際整合法律學研究所",
  "生命科學系",
  "生化科技學系",
  "動物學研究所",
  "植物科學研究所",
  "分子與細胞生物學研究所",
  "生態學與演化生物學研究所",
  "漁業科學研究所",
  "生化科學研究所",
  "微生物與生化學研究所",
  "基因體與系統生物學學位學程",
  "牙醫學系",
  "臨床牙醫學研究所",
  "口腔生物科學研究所",
  "獸醫學系",
  "臨床動物醫學研究所",
  "分子暨比較病理生物學研究所"
    ];
    $( "#input-dept" ).autocomplete({
      source: availableDepts
    });
  });

	function create(){
		$("#result-dept").html($("#input-dept").val());
		$("#result-id").html($("#input-id").val());
		$("#result-id-status").html(status_base[$("#input-id-status").val()]);
		$("#result-name").html($("#input-name").val());
		$("#result-birthday").html($("#input-birthday-year").val()+"年"+$("#input-birthday-month").val()+"月"+$("#input-birthday-day").val()+"日");
		$("#owner-photo").attr('src', $("#input-photourl").val());
		$("#id-outline").css('visibility', "visible");
        html2canvas($("#id-outline"), {
         onrendered: function(canvas) {
          $("#canvas-container").html("");
        $("#canvas-container").append(canvas);
        console.log(canvas.toDataURL('image/png'));
       $("#id-outline").css('visibility', "hidden");
        }
       });
	}
	</script>
</head>
<body>
	<div class="creator-form">
		<h1>My NTU ID Creator</h1>
		<h4>歡迎使用趣味台大學生證產生器！請輸入以下欄位並按下Create即可產生。本工具僅供紀念使用，並無任何效力，任意使用本人恕不負責噢！</h4>
		系所：<input id="input-dept"><br>
		學號：<input id="input-id"><br>
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
		生日：民國
		<input id="input-birthday-year" size="3" maxlength="3">年
		<input id="input-birthday-month" size="2" maxlength="2">月
		<input id="input-birthday-day" size="2" maxlength="2">日<br>
		照片網址：<input id="input-photourl" size="60">
		<button onclick="create()" class="go-button">Create</button><br>
	</div>

   <div id="canvas-container"></div>

	<div id="id-outline" style="visibility: hidden;">

		<img src="default_female.jpg" id="owner-photo">
		<ul class="owner-info">
			<li>系所：<span id="result-dept"></span></li><br>
			<li>學號：<span id="result-id"></span> <span id="result-id-status"></span></li>
			<li>姓名：<span id="result-name"></span></li>
			<li>生日：民國<span id="result-birthday"></span></li>
		</ul>
    <span id="watermark">Created using http://ntu.shouko.tw/id-creator</span>
	</div>

	<div id="footer">by Shouko, NTUIM</div>
</body>
</html>