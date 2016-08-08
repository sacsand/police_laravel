// app.js
var map1;
var map2;
var divid;
var mapx;

function init(mapx, divid, latx, lngx) {
    if (mapx == "map1") {
        var myOptions = {
            zoom: 10,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            center: new google.maps.LatLng(latx, lngx)
        };
        map1 = new google.maps.Map(document.getElementById(divid), myOptions);
        google.maps.event.addListener(map1, 'click', function(event) {
         
            $("#latt").val(parseFloat(event.latLng.lat())).trigger('change');

            $("#lngt").val(parseFloat(event.latLng.lng())).trigger('change');
          
        });
    } else {
        var myOptions = {
            zoom: 7,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            center: new google.maps.LatLng(latx, lngx)
        };
        map2 = new google.maps.Map(document.getElementById(divid), myOptions);
        google.maps.event.addListener(map2, 'click', function(event) {
       
            $("#latt").val(parseFloat(event.latLng.lat())).trigger('change');

            $("#lngt").val(parseFloat(event.latLng.lng())).trigger('change');
           
        });

    }

}

function callAllMap(){
    //call map function
init("map1", "map_canvas2", 6.917404, 79.907612);
init("map2", "map_canvas1", 7.721878499324503, 80.6121826171875);

}

callAllMap();

var event_vue = new Vue({

    // We want to target the div with an id of 'events'
    el: '#events',

    // Here we can register any values or collections that hold data
    // for the application
    data: {

        event: { title: '', incident_id: '', type: '', lat: '', lng: '' },
        events: [],
        Marks: 0,
        /*  markers: [{
            position: {lat: 6.927575, lng: 79.864789}
          }, {
            position: {lat: 6.907589, lng: 79.901149}
          }]*/
    },


    // Anything within the ready function will run when the application loads
    ready: function() {
        // When the application loads, we want to call the method that initializes
        // some data

        this.loadAllMap();
        this.fetchEvents();
        this.fetchData();


    },

    // Methods we want to use in our application are registered here
    methods: {

        loadAllMap: function() {
        this.loadMap(map1);
        this.loadMap(map2);
        },

        loadMap: function(map) {

            var mapData=0;
            $.ajax({
                url: base_url+'api/map',
                type: 'get',
                dataType: 'json',
                async: false,
                success: function(data) {
                    // var self = this;
                    mapData = data;
                    //// This way
                    //self.Marks= data;
                    // console.log(self.Marks);

                    // Or this way
                    // vueRock.$set('totalItems', data);

                }
            });

            var records = mapData;
            for (var i = 0; i < records.length; i++) {

                var record = records[i];
                var markerPos = new google.maps.LatLng(record.lat, record.lng);
                //var distanceInKm = google.maps.geometry.spherical.computeDistanceBetween(latLng, markerPos) / 1000;




                var user_icon = '/img/red.png';
                // Add the markerto the map
                var marker = new google.maps.Marker({
                    map: map,
                    animation: google.maps.Animation.DROP,
                    position: markerPos,
                    icon: user_icon
                });

                //console.log(mapData);
                // var d = this.fetchData();
                // console.log(d);

                var infoWindowContent = "<h4>" + record.title + "</h4>";


                this.addInfoWindow(marker, infoWindowContent, record);


            }
        },

        addInfoWindow: function(marker, message, record) {

            var infoWindow = new google.maps.InfoWindow({
                content: message
            });

            google.maps.event.addListener(marker, 'click', function() {
                infoWindow.open(map1, marker);
            });


        },

        // We dedicate a method to retrieving and setting some data
        fetchEvents: function() {

            this.$http.get(base_url+'api/map').then((response) => {
                this.$set('events', response.json())
                    //console.log(response.json());
                return response.json();

            }, (response) => {
                console.log(response);
            });
        },

        fetchData: function() {
            $.ajax({
                url: base_url+'api/map',
                type: 'get',
                dataType: 'json',
                async: false,
                success: function(data) {

                    var self = this;
                 
                    self.Marks = data;
                   
                }
            });

        },

        // Adds an event to the existing events array
        addEvent: function() {
            this.$http.post(base_url+'api/map/add', {
                title: this.event.title,
                lat: parseFloat(this.event.lat),
                lng: parseFloat(this.event.lng),
                type: this.event.type,
                incident_id: this.event.incident_id
            }).then((response) => {
                this.events.push(this.event);
                //this.$set('events', response.json());

            }, (response) => {
                // error callback
            });
            mapData = 0;
            callAllMap();
            this.loadAllMap();

        },

        deleteEvent: function(index) {
            if (confirm("Are you sure you want to delete this event?")) {
                this.events.$remove(index);
            }
        }
    }
});
