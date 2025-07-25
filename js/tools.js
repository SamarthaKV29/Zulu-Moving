$(document).ready(function () {
	$("#btnSub").find("span").mouseover(function (){
		$(this).addClass('anim');
	});	
	
	
	
	
});

function sbmtScc(){
	
}

function validateForm(){
				
				var x = document.forms["requestor"]["username"].value;
				if (x == null || x == "") {
					alert("Username must be filled out");
					return false;
				}
				
				var x = document.forms["requestor"]["email"].value;
				if (x == null || x == "") {
					alert("Email must be filled out");
					return false;
				}
				
                var x = document.forms["requestor"]["phone"].value;
				if (x == null || x == "") {
					alert("Phone must be filled out");
					return false;
					
					var x = document.forms["requestor"]["from"].value;
					if (x == null || x == "") {
						alert("Package source location must be filled out");
						return false;
					}
					
					var x = document.forms["requestor"]["to"].value;
					if (x == null || x == "") {
						alert("Package destination location must be filled out");
						return false;
					}
					return false;
				}
			}