function initialize() {
    // Paulo Orozimbo, 379
    var pizzariaLatlng = new google.maps.LatLng( -23.570764906928275, -46.625097349999976);
                
    var mapOptions = {
        zoom: 17,
        center: pizzariaLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);

    var pizzaria = new google.maps.Marker({
        position: pizzariaLatlng,
        map: map,
        title:"Pizzaria do Bruno"
    });
                
                
    // Paulo Orozimbo, 379
    var Latlng01 = new google.maps.LatLng( -23.572158606928717, -46.62534955000001);
    var Latlng02 = new google.maps.LatLng( -23.57174520692857, -46.62250759999995);
    var Latlng03 = new google.maps.LatLng( -23.57021340692808, -46.623838999999975);
                
                
    var imageCliente = ajaxurl + 'img/geolocalizacao/aluno-cursando.png';
                
    var cliente_1 = new google.maps.Marker({
        position: Latlng01,
        map: map,
        title:"Cliente 01",
        icon:imageCliente
    });
                
    var cliente_2 = new google.maps.Marker({
        position: Latlng02,
        map: map,
        title:"Cliente 02",
        icon:imageCliente
    });
                
    var cliente_3 = new google.maps.Marker({
        position: Latlng03,
        map: map,
        title:"Cliente 03",
        icon:imageCliente
    });


    var contentString = '<h1>Cliente 01</h1>'+
    '<p>10 pizzas na ultima semana</p>'+
    '<p>Consumo Total de R$ 347,00</p>';

    var infowindow = new google.maps.InfoWindow({
        content: contentString
    });
                
    google.maps.event.addListener(cliente_1, 'click', function() {
        infowindow.open(map,cliente_1);
    });
                
    google.maps.event.addListener(cliente_2, 'click', function() {
        infowindow.open(map,cliente_2);
    });
                
    google.maps.event.addListener(cliente_3, 'click', function() {
        infowindow.open(map,cliente_3);
    });

}

