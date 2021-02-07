<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<style type="text/css" media="screen">
		#upload{
			height:70%;
			/*background:#96CDCD	;*/
			background: inherit;
			width:40%;
			position:absolute;
			top:15%;
			left:25%;
		}
		#course_upload{
			height: 100%;
			position:relative;
			padding:0;
			border:2px solid skyblue;
			display:block;
			border:none;
  			box-shadow: 3px 3px 6px 6px #ccc;
		}
		#topic_upload{
			height:100%;
			position:relative;
			display:none;
			padding:0;
			border:2px solid skyblue;
			border:none;
  			box-shadow: 3px 3px 6px 6px #ccc;
		}
		#educontent_upload{
			height: 100%;
			position:relative;
			padding:0;
			border:2px solid skyblue;
			display:none;
			border:none;
  			box-shadow: 3px 3px 6px 6px #ccc;
		}
		.input{
			margin:1%;
			left:25%;
			width:50%;
			background: inherit;
			border:none;
			height:15%;
			border-bottom: 2px solid blue;
			position:relative;
		}
		.input_btn{
			margin:1%;
			left:25%;
			width:50%;
			font-size: 13px;
			background:skyblue;
			height:70%;
			border-radius: 20px;
			position:relative;
		}
		.input_link{
			margin:1%;
			left:25%;
			width:50%;
			font-size: 13px;
			background:inherit;
			border: none;
			height:70%;
			border-radius: 20px;
			position:relative;
		}
		#courseDetails{
			position:relative;
		}
		#course_upload_head{
			padding-top: 3%;
			padding-left: 2%;
			height:13%;
			margin: 0;
			top:0;
			background: skyblue;
			font-size: 200%;
		}
		#course_upload_body{
			height:55%;
		}
		#course_upload_btn{
			height:15%;
			display: inline-block;
			width: 100%;
		}
		#course_upload_tail{
			height:15%;
			background: skyblue;
		}
		#topic_upload_head{
			padding-top: 3%;
			padding-left: 2%;
			height:13%;
			margin: 0;
			top:0;
			background: skyblue;
			font-size: 200%;
		}
		#topic_upload_body{
			height:55%;
		}
		#topic_upload_btn{
			height:15%;
			display: inline-block;
			width: 100%;
		}
		#topic_upload_tail{
			height:15%;
			background: skyblue;
		}
		#educontent_upload_head{
			padding-top: 3%;
			padding-left: 2%;
			height:13%;
			margin: 0;
			top:0;
			background: skyblue;
			font-size: 200%;
		}
		#educontent_upload_body{
			height:55%;
		}
		#educontent_upload_btn{
			height:15%;
			display: inline-block;
			width: 100%;
		}


	</style>
</head>
<body>
<div id="upload">

<div id="course_upload">
	<div id="course_upload_head" >Create new Course here</div>
	<div id="course_upload_body" >
	    <input class="input" id="courseName" placeholder="course name"><br>
        <input class="input" id="category" placeholder="category"><br>
        <input class="input" id="duration" placeholder="duration"><br>
	    <input class="input" id="requirement" placeholder="requirement"><br>
        <input class="input" id="outcome" placeholder="outcome"><br><br>
    </div>
	<div id="course_upload_btn" >
		<button class="input_btn" onclick="passCourse()">Upload Course</button> 	
	</div>
	<div id="course_upload_tail" >
		<button class="input_link" onclick="switchToTopic()">add to existing Course</button>
	</div>
</div>

<div id="topic_upload">
	<div id="topic_upload_head">Create new Topic here</div>
	<div id="topic_upload_body" >
		<input class="input" id="cName" placeholder="course name"><br>
		<input class="input" id="topicName" placeholder="topic name"><br>
		<input  class="input" id="Descript" placeholder="description"><br>
	</div>
	<div id="topic_upload_btn" >
		<button class="input_btn" onclick="passTopic()">Upload  Topic</button>
	</div>
	<div id="topic_upload_tail" >
		<Button class="input_link" onclick="switchToeducontent()">add to existing Topic</Button>
	</div>	
</div>

<div id="educontent_upload">
	<div id="educontent_upload_head">Create new Content here</div>
	<div id="educontent_upload_body" >
		<input class="input" id="educourseName" placeholder="course name"><br>
		<input class="input" id="edutopicName" placeholder="topic name"><br>
		<input class="input" id="Name" placeholder="Title"><br>
		<input  class="input" id="creator" placeholder="your Name"><br>
	    <input class="input" id="link" placeholder="link"><br>
	</div>
	<div id="educontent_upload_btn" >
		<button class="input_btn" onclick="passeducontent()" style="left:25%;width:50%;">Upload content</button>
	</div>
</div>

<div id="courseDetails"></div>

</div>

<script type="text/javascript">
$("#option_course").click(function(){
		document.getElementById("topic_upload").style.display="none";
		document.getElementById("course_upload").style.display="block";
		document.getElementById("courseDetails").style.display="none";
});
$("#option_topic").click(function(){
		document.getElementById("course_upload").style.display="none";
		document.getElementById("topic_upload").style.display="block";
		document.getElementById("courseDetails").style.display="none";

});


function passCourse(){
	var courseName=document.getElementById("courseName").value;
	var category=document.getElementById("category").value;
	var duration=document.getElementById("duration").value;
	var requirement=document.getElementById("requirement").value;
	var outcome=document.getElementById("outcome").value;
		document.getElementById("courseDetails").style.display="block";		
	     $('input').val('');

	 $.post("upload_course.php",{courseName:courseName,
		 	category:category,
			duration:duration,
		 	requirement:requirement,
		 	outcome:outcome}
			,function(data,status){
				$("#courseDetails").html(data);
					
			});
}


function passTopic(){
	var cName=document.getElementById("cName").value;
	var topicName=document.getElementById("topicName").value;
	var Descript=document.getElementById("Descript").value;

		document.getElementById("courseDetails").style.display="block";		
			     $('input').val('');


	 $.post("upload_topic.php",{cName:cName,
		 	topicName:topicName,
			Descript:Descript,
			}
			,function(data,status){
				$("#courseDetails").html(data);
			});
}

function passeducontent(){
	var cName=document.getElementById("educourseName").value;
	var topicName=document.getElementById("edutopicName").value;
	var creator=document.getElementById("creator").value;
	var link=document.getElementById("link").value;
	var Name=document.getElementById("Name").value;
		link=link.replace("watch?v=","embed/");
		if(link.indexOf('&')>0)
		link=link.substring(0,link.indexOf('&'));

		document.getElementById("courseDetails").style.display="block";		
			    $('input').val('');


	 $.post("upload_educontent.php",{cName:cName,
		 	topicName:topicName,
			creator:creator,
			link:link,
			Name:Name
			}
			,function(data,status){
				$("#courseDetails").html(data);
			});
}

function switchToTopic(){
	document.getElementById("course_upload").style.display="none"
	document.getElementById("educontent_upload").style.display="none"
	document.getElementById("topic_upload").style.display="block"
}

function switchToeducontent(){
	document.getElementById("course_upload").style.display="none"
	document.getElementById("topic_upload").style.display="none"
	document.getElementById("educontent_upload").style.display="block"
}

</script>
</body>
</html>