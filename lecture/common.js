var preTab = "all";
function changeTab(id){
	$("#"+preTab).attr("class","");
	$("#"+id).attr("class","on");
	preTab = id;
	hiddenSelectBox(id);
}
function hiddenSelectBox(id){
	if(id != "all"){
		$("#board_type").val("").prop("selected",true);
		$("#board_type").css("visibility","hidden");
	}else{
		$("#board_type").css("visibility","");
	}
}
function listChange(type,page,searchType){
	if(searchType =="tab"){
		data={
			type:type,
			page:page,
			searchType:searchType
		};
	}else{
		data={
			board_type:$("#board_type").val(),
			board_select:$("#board_select").val(),
			board_textVal:$("#board_textVal").val(),
			searchType:searchType
		};
	}
	
	$.ajax({
		url:"/lecture/view/include/boardList.php",
		type:"POST",
		data:data,
		success:function(data){
			$('#boardList').html(data);
		},
		error:function(){
			alert("실패");
		}
	});
}
function imgChange(imgsrc){
	$("#board_preview").attr("src",imgsrc);
}
function imgDown(imgsrc){
	alert("다운로드");
}