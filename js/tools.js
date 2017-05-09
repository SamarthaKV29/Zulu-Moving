$(document).ready(function () {
	$("#btnSub").find("span").mouseover(function (){
		$(this).addClass('anim');
	});	
	$(function(){
    $('#myCarousel.slide').carousel({
        interval: 5000,
        pause: "hover"
    });

    $('input').focus(function(){
       $("#myCarousel").carousel('pause');
    }).blur(function() {
       $("#myCarousel").carousel('cycle');
    });
});
	
	
	
});

function validateForm(){
				
				var x = document.forms["requestor"]["username"].value;
				if (x == null || x == "") {
					alert("Username must be filled out");
					return false;
				}
				
				var x = document.forms["requestor"]["email"].value;
				if (x == null || x == "") {
					var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  					if(!re.test(x))
					alert("Please enter a valid email");
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
			alert("Success");
			}