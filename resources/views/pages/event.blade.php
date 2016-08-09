
  @include('_header')


        <div class="right_col"  role="main">   
           <!-- top tiles -->                  
          <br />      
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
                 
                    </a>
                </div>
            </div>
            <ul v-for="m in markers">
            <li>@{{m.position}}</li>
            </ul>
        </div>
    </div>
  </div>
  </div>
        <!-- /page content -->
@include('_footer')