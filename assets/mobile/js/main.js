
	
	function proViewChg(no) {
		for(i=1; i<=13; i++) {
			$("#proTitle_"+i).css("color", "#fff");
			$("#proView_"+i).css("display", "none");
			$("#proView_"+i).hide();
		}
		
		$("#proTitle_"+no).css("color", "#0f6244");
		$("#proView_"+no).css("display", "block");
		$("#proView_"+no).show();
	}