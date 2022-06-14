$('#signinButton').click(function(e){
	e.preventDefault();
	showModal("signinModal");
});
$('#hideSigninButton').click(function(e) {
	e.preventDefault();
	hideModal("signinModal");
});
$('#loginButton').click(function(e){
	e.preventDefault();
	showModal("loginModal");
});
$('#hideLoginButton').click(function(e) {
	e.preventDefault();
	hideModal("loginModal");
});

function showModal(id){
	let modal = $('#'+id);
	modal.show();
	modal.removeClass('fade');
}

function hideModal(id){
	let modal = $('#'+id);
	modal.hide();
	modal.addClass('fade');
}

var map;


function init() {
	map = new ymaps.Map("map", {
    center: [55.76, 37.64],
    zoom: 10
	});

	var location = ymaps.geolocation.get();

	// Асинхронная обработка ответа.
	location.then(
	  function(result) {
			map.setCenter(result.geoObjects.position);
			map.geoObjects
				.add(new ymaps.Placemark(result.geoObjects.position, {
	          balloonContent: 'Ваше текущее местоположение'
	      }
			));
	  },
	  function(err) {
	    console.log('Ошибка: ' + err);
	  }
	);
};

ymaps.ready(init);

function setPoint (a, b, name) {
    map.setCenter([a, b]);
		map.geoObjects
			.add(new ymaps.Placemark([a, b], {
          balloonContent: name
      }
		));
}

function pointsChange(id){
	$('#points-update-'+id).removeClass('d-none');

	$('#long-hidden-'+id).val($('#long-'+id).val());
	$('#width-hidden-'+id).val($('#width-'+id).val());
}
