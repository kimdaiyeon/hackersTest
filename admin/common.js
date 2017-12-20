var preTab = "all";
function changeTab(id){
	$("#"+preTab).attr("class","");
	$("#"+id).attr("class","on");
	preTab = id;
	hiddenSelectBox(id);
}
function hiddenSelectBox(id){
	if(id != "all"){
		$("#lec_type").css("visibility","hidden");
		$("#lec_type").val("").prop("selected",true);
	}else{
		$("#lec_type").css("visibility","");
	}
}

function listChange(type,page){
	var lec_type = $("#lec_type").val();
	var lec_select = $("#lec_select").val();
	var lec_textVal = $("#lec_textVal").val();
	$.ajax({
		url:"/admin/view/include/lecList.php",
		type:"POST",
		data:{
			type:type,
			page:page,
			lec_type:lec_type,
			lec_select:lec_select,
			lec_textVal:lec_textVal
		},
		success:function(data){
			$('#lecList').html(data);
		},
		error:function(){
			alert("실패");
		}
	});
}