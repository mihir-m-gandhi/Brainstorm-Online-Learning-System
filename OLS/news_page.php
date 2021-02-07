<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<title></title>
	<style type="text/css" media="screen">
		body{
			background-image:linear-gradient(white,aquamarine);
			animation-name:back;
			animation-duration:5s;
			animation-iteration-count:infinite;
			animation-direction:alternate;

		}
		#news_section{
			height:70%;
			width:50%;
			background: white;
			position:absolute;
			top:10%;
			left:20%;
		}
		#input_section{
			height:50%;
			width:100%;
			position:relative;

		}
		.input{
		margin:2%;
		margin-left:25%;
		width:50%;
		height:20%;
		border:none;
		background: inherit;
		border-bottom: 2px solid blue;
		}
		.input_btn{
		margin:2%;
		margin-left:25%;
		width:50%;
		height:70%;
		border:none;
		background: skyblue;
		border-radius: 20px;
		}
		@keyframes back{
			from{background:blue;}
			to{background:white;}
		}
		#news_section_head{
			padding-top:5%;
			padding-left: 5%;
			height:15%;
			font-size: 200%;
			position:relative;
			background: skyblue;
		}
		#news_section_tail{
			height:15%;
			position:relative;
			background: inherit;
		}

	</style>
</head>
<body>
	<div id="news_section">
	<div id="news_section_head" >Add News here</div>
	<div id="input_section">
		<input class="input" placeholder="topic" id="topic"></input><br>
		<input class="input" placeholder="add your content here" id="content"></input><br>
		<input class="input" placeholder="author name" id="author"></input><br>
	</div>	
	<div id="news_section_tail">
		<button class="input_btn" id="btn_news" onclick="upload_news()">add news </button>
	</div>
	</div>
	<div id="feedback"></div>

	<script type="text/javascript">
	function upload_news(){
		var topic=document.getElementById("topic").value;
		var content=document.getElementById("content").value;
		var author=document.getElementById("author").value;
		var feedback=document.getElementById("feedback");
		if(topic=="")
		feedback.innerHTML="enter topic name";
		else if(content=="")
		feedback.innerHTML="enter content for news";
		else if(author=="")
		feedback.innerHTML="enter author name";
		else{
			/*var date=getDate();
			var mon=getMonth();
			var year=getFullYear();*/
			var d=new Date();
			var dmy=d.getFullYear()+'-'+(d.getMonth()+1)+'-'+d.getDate();
				     $('input').val('');

			$.post("insert_news.php",{topic:topic,content:content,author:author,dmy:dmy},function(data,status){
				$("#feedback").html(data);
			});
		}
	}
	</script>		
</body>
</html>