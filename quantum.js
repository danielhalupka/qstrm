function removeId(e) {
	$
			.get(
					e,
					function(e, t) {
						$
								.get(
										"http://www.quantumstreams.net/index.php/mystream/index/getstreams",
										function(e, t) {
											$("#streamList").html(e)
										})
					})
}
function thisGame(e) {
	$("#content-game").attr("data", e)
}
function restream() {
	$("#inputBox").hide();
	var e = $("#content-game").attr("data");
	if ($("#inputName").val()) {
		var t = $("#inputName").val()
	}
	if (t == null) {
		t = "Stream - No Name"
	}
	$
			.get(
					"http://www.quantumstreams.net/index.php/mystream/add/list?title="
							+ t + "&link=" + e,
					function(e, t) {
						$
								.get(
										"http://www.quantumstreams.net/index.php/mystream/index/getstreams",
										function(e, t) {
											$("#streamList").html(e)
										})
					});
	$("#streamList").css("height", $(window).height() * .8 + 15 + "px")
}
function restreamStart() {
	$("#inputBox").show();
	$("#streamList").css("height", $(window).height() * .8 + 15 - 60 + "px")
}
function firstC() {
	$("#firstScreen").attr("height", $(window).height() * .8 + 15 + "px");
	$("#firstScreen").attr("width", $(window).width() * .7 - 30 + "px");
	resize()
}
function resize() {
	$("#content-game").attr("height", $(window).height() * .8 + 10 + "px");
	$("#content-game").attr("width", $(window).width() * .7 - 30 + "px");
	$("#overlayOn").attr("height", $(window).height() * .8 + 10 + "px");
	$("#overlayOn").attr("width", $(window).width() * .7 - 30 + "px");
	$("#streamList").css("height", $(window).height() * .8 + 15 + "px");
	$("#ovoJe").css("height", $(window).height() * .8 + 10 + "px");
	$("#ovoJe2").css("height", $(window).height() * .8 + 10 + "px")
}
function skip() {
	$("#content-game").hide();
	$("#firstScreen").hide();
	$("#ovoJe").css("opacity", "1");
	$("#ovoJe2").css("opacity", "1");
	$("#overlayOn").show();
	$("#overlayOn").css("height", $(window).height() * .8 + 10 + "px");
	$("#overlayOn").css("width", $(window).width() * .7 - 30 + "px");
	$("#content-game").attr("data", "");
	$.get("http://www.quantumstreams.net/index.php/flashgames/random/index",
			function(e, t) {
				$("#content-game").attr("data", e);
				$("#content-game").show();
				$("#overlayOn").hide()
			});
	resize();
}
function first() {
	$("#firstScreen").hide();
	skip();
}
$(document)
		.ready(
				function() {
					$("#inputBox").hide();
					firstC();
					$
							.get(
									"http://www.quantumstreams.net/index.php/mystream/index/getstreams",
									function(e, t) {
										$("#streamList").html(e)
									});
					first()
				});
$(window).resize(function() {
	resize()
})