
	$(document).ready(function(){
	
		
		$('#fullpage').fullpage({
			menu:"#gnb",
			scrollOverflow: false,
			navigation: false,
			navigationPosition: 'right',
			keyboardScrolling: true,
			autoScrolling: true,
			lockAnchors: true,
			fitToSection: true,
			//anchors:['slides', 'history', 'people', 'service', 'innovation','project','contact'], 
			//navigationTooltips:['slides', 'history', 'people', 'service', 'innovation','project','contact'], 
			showActiveTooltip:true,
			afterResponsive: function(isResponsice){
			},
			afterResize:function(width,height){
			}
		});	
		
		$('.animate').scrolla({
			mobile: true,
			once: true, 
		});
		
	});
	
	
	function proViewChg(no) {
		for(i=1; i<=13; i++) {
			$("#proTitle_"+i).css("color", "#fff");
			$("#proTitle_"+i).css("font-weight", "normal");
			$("#proView_"+i).css("display", "none");
			$("#proView_"+i).hide();
		}
		
		$("#proTitle_"+no).css("color", "#0f6244");
		$("#proTitle_"+no).css("font-weight", "bold");
		$("#proView_"+no).css("display", "block");
		$("#proView_"+no).show();
	}