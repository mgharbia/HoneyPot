var controls = {
	state : "black",
	init: function () {
		//Key released 
		$(document).keyup(function(e){
			if(controls.state != "black") {
				controls.state = "black";
				controls.setArrowColor(e.which, controls.state, false);
			}
		});
		
		//Key pressed
		$(document).keydown(function(e){
			if(controls.state != "red") {
				controls.state = "red";
				controls.setArrowColor(e.which, controls.state, true);
			}
		});
		
		$(".div_box span").hover(
		  function() {
			if(this.className == "center_box") { 
				return; 
			}
			$( this ).attr("style", "color: red;");
			$( this ).addClass( "hover" );
		  }, function() {
			$( this ).removeClass( "hover" );
			$( this ).attr("style", "color: black;");
		  }
		);
		
		$(".div_box span").click(function() {
			controls.clickedArrow(this.className, true);
		});
			
	}, 
	setArrowColor: function (arrowKey, color, movement) {
		switch (arrowKey) {
			case 37:
				//left arrow key
				$(".left_arrow").css("color", color);
				controls.clickedArrow("left_arrow", movement);
				break;
			case 38:    //up arrow key
				$(".up_arrow").css("color", color);
				controls.clickedArrow("up_arrow", movement);
				break;
			case 39:    //right arrow key
				$(".right_arrow").css("color", color);
				controls.clickedArrow("right_arrow", movement);
				break;
			case 40:    //bottom arrow key
				$(".down_arrow").css("color", color);
				controls.clickedArrow("down_arrow", movement);
				break;
			default:
				//console.log("There was an error in the key code: " + arrowKey + ", color: " + color);
				break;
		}
	},
	clickedArrow: function (elementName, movement) {
		controls.emitEvent(elementName.replace("hover", ""), movement);
	},
	emitEvent: function (param, movement) {
		$.ajax({
			url: "src/controls.php?direction=" + param.split("_")[0] + "&movement=" + movement,
			type: "POST",
			data: "key=" + param,
			success: function(data){
				console.log("AJAX success:");
                               console.log(data);
                               return;
				var result = JSON.parse(data);
				if(result.stderr.length > 0) {
					console.log("PANIC -> ROBOT movement error:");
					console.log(result.stderr);
					console.log("=============== Sending STOP action !!!");
					controls.emitEvent("none", false);
				} else {
					console.log(data);
				}
			},
			error: function(info){
				console.log("AJAX error:");
				console.log(info);
			}
		});
	}
}

// A $( document ).ready() block.
$( document ).ready(function() {
    controls.init();
});
