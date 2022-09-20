$(document).ready(function(){
getAllApiKeysFunction();
getAllLocationKeysFunction();
setAPiAndLocationKey();

function getAllApiKeysFunction(){
	 $.ajax({
	 	url: 'routes/route.php',
	 	method: 'POST',
	 	dataType: 'json',
	 	data: {
	 		action: 'getAllApiKeys',
	 	},
	 	success:function(data){
	 		console.log(data);
	 		$.each(data.result, function(key, value) {   
		    $('#api_select')
		        .append($("<option></option>")
                .attr("value", value.id)
                .text(value.name)); 
             var selected;
		     if(value.selected == 1){
 				selected = value.id;
 				$("#api_select option[value='"+selected+"']").attr("selected", "selected");

	 			}   

		    });			  
	 	}
	 });
}


function getAllLocationKeysFunction(){
	 $.ajax({
	 	url: 'routes/route.php',
	 	method: 'POST',
	 	dataType: 'json',
	 	data: {
	 		action: 'getAllLocationKeys',
	 	},
	 	success:function(data){
	 		console.log(data);
	 		$.each(data.result, function(key, value) {   
		    $('#location_select')
		        .append($("<option></option>")
                .attr("value", value.id)
                .text(value.location_name)); 
             var selected;
		     if(value.selected == 1){
 				selected = value.id;
 				$("#location_select option[value='"+selected+"']").attr("selected", "selected");
 				$('.location-name').text(value.location_name);

	 			}   

		    });			  
	 	}
	 });
}


function setAPiAndLocationKey()
{
	$.ajax({
	 	url: 'routes/route.php',
	 	method: 'POST',
	 	dataType: 'json',
	 	data: {
	 		action: 'getApiAndLocation',
	 	},
	 	success:function(data){
	 		console.log(data);	


	 			 	$.ajax({
					 	url: "http://dataservice.accuweather.com/forecasts/v1/daily/5day/"+data.result[1].api_value+"?apikey="+data.result[0].api_value,
					 	type: "GET",
					 	dataType: "JSON",
					 	success: function(data, textStatus, xhr){
					 		console.log(data);
					 		    var c1 = data.DailyForecasts[0].Temperature.Minimum.Value;
								var c1_unit = data.DailyForecasts[0].Temperature.Minimum.Unit;
								var c1_phrase = data.DailyForecasts[0].Day.IconPhrase;
								var c1_date = data.DailyForecasts[0].Date;
								var d1 = new Date(c1_date);
								var date1 = d1.toString();

								var c2 = data.DailyForecasts[1].Temperature.Minimum.Value;
								var c2_unit = data.DailyForecasts[1].Temperature.Minimum.Unit;
								var c2_phrase = data.DailyForecasts[1].Day.IconPhrase;
								var c2_date = data.DailyForecasts[1].Date;
								var d2 = new Date(c2_date);
								var date2 = d2.toString();

								var c3 = data.DailyForecasts[2].Temperature.Minimum.Value;
								var c3_unit = data.DailyForecasts[2].Temperature.Minimum.Unit;
								var c3_phrase = data.DailyForecasts[2].Day.IconPhrase;
								var c3_date = data.DailyForecasts[2].Date;
								var d3 = new Date(c3_date);
								var date3 = d3.toString();

								var main_text = data.Headline.Text;
								$('.main-text').html(main_text);

								var c1_icon_json;
								if($.trim(data.DailyForecasts[0].Day.Icon).length > 1){
									 c1_icon_json = data.DailyForecasts[0].Day.Icon;
								}else{
									 c1_icon_json = '0'+data.DailyForecasts[0].Day.Icon;
								}

								var c1_icon = 'https://developer.accuweather.com/sites/default/files/'+c1_icon_json+'-s.png'
								$('.c1-icon').attr('src', c1_icon);

								var c2_icon_json;
								if($.trim(data.DailyForecasts[1].Day.Icon).length > 1){
									 c2_icon_json = data.DailyForecasts[1].Day.Icon;
								}else{
									 c2_icon_json = '0'+data.DailyForecasts[1].Day.Icon;
								}

								var c2_icon = 'https://developer.accuweather.com/sites/default/files/'+c2_icon_json+'-s.png'
								$('.c2-icon').attr('src', c2_icon);

								var c3_icon_json;
								if($.trim(data.DailyForecasts[2].Day.Icon).length > 1){
									 c3_icon_json = data.DailyForecasts[2].Day.Icon;
								}else{
									 c3_icon_json = '0'+data.DailyForecasts[2].Day.Icon;
								}

								var c3_icon = 'https://developer.accuweather.com/sites/default/files/'+c3_icon_json+'-s.png'
								$('.c3-icon').attr('src', c3_icon);

						 	    $('.c1-value').text(c1);
							 	$('.c1-unit').text(c1_unit);
							 	$('.c1-phrase').text(c1_phrase);
							 	$('.c2-value').text(c2);
							 	$('.c2-unit').text(c2_unit);
							 	$('.c2-phrase').text(c2_phrase);
							 	$('.c3-value').text(c3);
							 	$('.c3-unit').text(c3_unit);
							 	$('.c3-phrase').text(c3_phrase);
							 	$('.date-1').text(date1.split('GMT')[0]);
							 	$('.date-2').text(date2.split('GMT')[0]);
							 	$('.date-3').text(date3.split('GMT')[0]);

					 	},
					 	 complete: function(xhr, textStatus){
					 	 	if(xhr.status == 0){
					 	 			$('#errorModal').modal({
								    backdrop: 'static',
								    keyboard: false
								});
					 	 	}
					 	 }

					 });



	 	}
	});
}

  $(document).on('click', '.btn-open-api', function(){
  	$('#api_select').empty();
  	getAllApiKeysFunction();
  });

$(document).on('click', '.btn-open-location', function(){
  	$('#location_select').empty();
  	getAllLocationKeysFunction();
  });


  $(document).on('change', '#api_select', function(){
  
  	 var text = $( "#api_select option:selected" ).text();
  	  if(confirm("Are you sure you want to set " +text+ " as API Key?")){
	 var value = $(this).val();
  	  	$.ajax({
  	  		url: 'routes/route.php',
  	  		method: 'POST',
  	  		data: {
  	  			action: 'updateSelectedApiKey',
  	  			value:value
  	  		},
  	  		success: function(data){
  	  		setTimeout(function(){
	 	  		if(data == 'success'){
	 	  			swal.fire('Success!', 'API Key Selected.','success');
	 	  			$('#api_select').empty();
	 	  			getAllApiKeysFunction();
	 	  		}else{
	 	  			swal.fire('Error!', 'Unable to select.Please try again.','error');
	 	  		}	
            }, 2000);

  	  		}

  	  	});

  	  }else{
  	  	$('#api_select').empty();
  		getAllApiKeysFunction();
  	  }
  });


    $(document).on('change', '#location_select', function(){
  
  	 var text = $( "#location_select option:selected" ).text();
  	  if(confirm("Are you sure you want to set " +text+ " as Location?")){
	 var value = $(this).val();
  	  	$.ajax({
  	  		url: 'routes/route.php',
  	  		method: 'POST',
  	  		data: {
  	  			action: 'updateSelectedLocationKey',
  	  			value:value
  	  		},
  	  		success: function(data){
  	  		setTimeout(function(){
	 	  		if(data == 'success'){
	 	  			swal.fire('Success!', 'Location Key Selected.','success');
	 	  			$('#location_select').empty();
	 	  			getAllLocationKeysFunction();
	 	  		}else{
	 	  			swal.fire('Error!', 'Unable to select.Please try again.','error');
	 	  		}	
            }, 2000);

  	  		}

  	  	});

  	  }else{
  	  	$('#location_select').empty();
  		getAllLocationKeysFunction();
  	  }
  });


 $(document).on('click', '.btn-add-api', function(){
 	  var api_key = $('#api_key').val();
 	  var api_name = $('#api_name').val();

 	  if($.trim(api_key).length > 0 || $.trim(api_name).length > 0){
 	  	 	  $.ajax({
		 	  	url: 'routes/route.php',
		 	  	method: 'POST',
		 	  	data: {
		  		  action: 'addApiKeys',
		          api_key:api_key,
		          api_name:api_name
		 	  	},
		 	  	beforeSend: function(){
		 	  		$('.btn-add-api').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>')
		 	  	},
		 	  	success:function(data){
		 	  		setTimeout(function(){
			 	  		if(data == 'success'){
			 	  			swal.fire('Success!', 'API Key Added.','success');
			 	  			$('#api_select').empty();
			 	  			getAllApiKeysFunction();
			 	  			$('.btn-add-api').html('Add Key <i class="fa-solid fa-floppy-disk"></i>');
			 	  			$('#api_key').val("");
			 	  			$('#api_name').val("");
			 	  		}else{
			 	  			swal.fire('Error!', 'Unable to add.Please try again.','error');
			 	  		}	
		            }, 2000);

		 	  	}
		 	  });
 	  	
 	  }else{
 	  	swal.fire('Error!', 'Empty Fields','error');
 	  }
 });

  $(document).on('click', '.btn-add-location', function(){
 	  var location_key = $('#location_key').val();
 	  var location_name = $('#location_name').val();

 	  if($.trim(location_key).length > 0 || $.trim(location_name).length > 0){
 	  	 	  $.ajax({
		 	  	url: 'routes/route.php',
		 	  	method: 'POST',
		 	  	data: {
		  		  action: 'addLocationKeys',
		          location_key:location_key,
		          location_name:location_name
		 	  	},
		 	  	beforeSend: function(){
		 	  		$('.btn-add-location').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>')
		 	  	},
		 	  	success:function(data){
		 	  		setTimeout(function(){
			 	  		if(data == 'success'){
			 	  			swal.fire('Success!', 'Location Key Added.','success');
			 	  			$('#location_select').empty();
  							getAllLocationKeysFunction();
			 	  			$('.btn-add-location').html('Add Location <i class="fa-solid fa-floppy-disk"></i>');
			 	  			$('#location_key').val("");
			 	  			$('#location_name').val("");
			 	  		}else{
			 	  			swal.fire('Error!', 'Unable to add.Please try again.','error');
			 	  		}	
		            }, 2000);

		 	  	}
		 	  });
 	  	
 	  }else{
 	  	swal.fire('Error!', 'Empty Fields','error');
 	  }
 });

  

});