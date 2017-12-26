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
	setArrowColor: function (arrowKey, color, trigger) {
		switch (arrowKey) {
			case 37:
				//left arrow key
				$(".left_arrow").css("color", color);
				controls.clickedArrow("left_arrow", trigger);
				break;
			case 38:    //up arrow key
				$(".up_arrow").css("color", color);
				controls.clickedArrow("up_arrow", trigger);
				break;
			case 39:    //right arrow key
				$(".right_arrow").css("color", color);
				controls.clickedArrow("right_arrow", trigger);
				break;
			case 40:    //bottom arrow key
				$(".down_arrow").css("color", color);
				controls.clickedArrow("down_arrow", trigger);
				break;
			default:
				//console.log("There was an error in the key code: " + arrowKey + ", color: " + color);
				break;
		}
	},
	clickedArrow: function (elementName, trigger) {
		controls.emitEvent(elementName.replace("hover", ""), trigger);
	},
	emitEvent: function (param, trigger) {
		$.ajax({
			url: "src/controls.php?cmd=" + param.split("_")[0] + "&trigger=" + trigger,
			type: "POST",
			data: "key=" + param,
			success: function(data){
				console.log(data);
			},
			error: function(){
				console.log("failure");
			}
		});
	}
}

// A $( document ).ready() block.
$( document ).ready(function() {
    controls.init();
});
