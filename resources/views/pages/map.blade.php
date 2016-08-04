<!-- index.html -->
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Vue</title>
    <!-- CSS -->
    <link rel="stylesheet" href="/bootstrap/dist/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.6.1/lodash.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.21/vue.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>    
	<script src="https://code.angularjs.org/1.3.15/angular.js"></script>
	
	<script src="https://cdn.jsdelivr.net/vue.resource/0.9.3/vue-resource.min.js"></script>
    <style>
        #map_canvas1{
    width: 100%;
    height: 600px;
    border: 1px ;
    float:right;
}
#map_canvas2{
    width: 100%;
    height: 600px;
    border: 1px ;
    float:left;
}
#map_cases{

    height: 600px;
    overflow: scroll;
}

    </style>

</head>

<body>
    <!-- navigation bar -->
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <a class="navbar-brand"><i class="glyphicon glyphicon-bullhorn"></i> Vue Events Bulletin Board</a>
        </div>
    </nav>
    <!-- main body of our application -->
    <div class="container" id="events">
        <!-- add an event form -->
        <div class="row">
             <div class="col-sm-6">
                  <div id="map_canvas2"></div>
                  <!--div  id="map"></div> -->
            </div>
            <div class="col-sm-6">
                  <div id="map_canvas1"></div>
                  <!--div  id="map"></div> -->
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Add an Event</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <input class="form-control" id="tit" placeholder="Incident Name" v-model="event.title">
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Incident_Id" v-model="event.incident_id">
                        </div>
                        <div class="form-group">
                            <input class="form-control" id="latt" placeholder="latittude" v-model="event.lat">
                        </div>
                        <div class="form-group">
                            <input class="form-control" id ="lngt" placeholder="long latitude" v-model="event.lng">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" placeholder="Incident_Type" v-model="event.type"></textarea>
                        </div>
                        <button class="btn btn-primary" v-on:click="addEvent">Submit</button>
                    </div>
                </div>
            </div>
            <!-- show the events -->
            <div id="map_cases" class="col-sm-6">
                <div class="list-group">
                    <a href="#" class="list-group-item" v-for="event in events">
                        <h4 class="list-group-item-heading">
                 <i class="glyphicon glyphicon-bullhorn"></i> 
                  @{{ event.title }}
                    </h4>
                        <h5>
                     <i class="glyphicon glyphicon-calendar" v-if="event.date"></i> 
                    
                     </h5>
                        <p class="list-group-item-text" v-if="event.incident_id">@{{ event.incident_id }}</p>
                        <p class="list-group-item-text" v-if="event.type">@{{ event.type}}</p>
                        <p class="list-group-item-text" v-if="event.lat">@{{ event.lat}}</p>
                        <p class="list-group-item-text" v-if="event.lng">@{{ event.lng}}</p>
                        <button class="btn btn-xs btn-danger" v-on:click="deleteEvent($index)">Delete</button>
                    </a>
                </div>
            </div>
            <ul v-for="m in markers">
            <li>@{{m.position}}</li>
            </ul>
        </div>
    </div>
    <!-- JS -->
    <script>
    /*
            VueGoogleMap.load({
                'key': 'AIzaSyBo8O0caiNMhVaeZ0WzV3deHXy2GfsuyX4',
            })

            Vue.component('google-map', VueGoogleMap.Map);
            new Vue({
                el: '#map',
            });*/
    </script>
 
    <script src="/vue/app.js"></script>
    
</body>

</html>
