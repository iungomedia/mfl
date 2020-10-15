$(function() {
	if ($( "body" ).hasClass( "calendarPage" )) {
	    var mixer = mixitup('.listCardsResult');
	    var hash = location.hash;
	    init();

	    $( ".formFilters" ).submit(function( event ) {
	    	event.preventDefault();
	    	var cat = $("#idCategory option:selected").text().toLowerCase().replace(/ /g, "");
	    	var team = $("#idTeam option:selected").text().toLowerCase().replace(/ /g, "");
	    	var journey = $("#idJourney option:selected").text().toLowerCase().replace(/ /g, "");

	    	filters(cat,team,journey);

		});

		function init() {
			if(hash != '') {
				var teamHash = hash.split('-');
				$("#idTeam option[value="+teamHash[1]+"]").attr('selected','selected');
				var cat = $("#idCategory option:selected").text().toLowerCase().replace(/ /g, "");
	    		var team = $("#idTeam option:selected").text().toLowerCase().replace(/ /g, "");
	    		var journey = $("#idJourney option:selected").text().toLowerCase().replace(/ /g, "");
				filters(cat,team,journey);
			}
		}

		function filters(cat,team,journey) {
			var filter = '';

	    	if(cat != 'todos') {
	    		filter = filter+'.'+cat;
	    	}
	    	if(team != 'todos') {
	    		filter = filter+'.'+team;
	    	}
	    	if(journey != 'todos') {
	    		filter = filter+'.'+journey;
	    	}

	    	if(filter==""){
	    		filter = "*";
	    	}
	    	console.log(filter);
	    	mixer.filter(filter);
		}


	}
});