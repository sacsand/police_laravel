
  @include('_header')
    <style> #imgcon {
    width: 400px;
    height: 170px;
}

#imgcon img {
    max-width: 100%;
    max-height: 100%;
}  </style>
        <div class="right_col"  role="main">   
           <!-- top tiles -->                  
          <br />      
     <div class="container" id="cases">        
        <br>
        <div class="row">
            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Add A Case</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <input class="form-control"  placeholder="Title" v-model="case.title">
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Case id" v-model="case.case_id">
                        </div>
                        
                        <div class="form-group">
                             <select class="form-control"  v-model="case.type">
                                            <option value="accident">accident</option>
                                            <option value="robbery">robbery</option>
                                            <option value="arson">arson</option>
                                            <option value="murder"> murder</option>
                                            <option value="child abuse">child abuse</option>
                                            <option value="kidnapping">kidnapping</option>

                            </select>

                        </div>
                        <div class="form-group">
                            <textarea class="form-control" placeholder="Description" v-model="case.description"></textarea>
                        </div>
                         <div class="form-group">
                            <input type="file"  v-on:change="sync" class="form-control">
                        </div>
                        <button class="btn btn-primary" v-on:click="addCase">Submit</button>
                    </div>
                </div>
            </div>
            <div id="map_cases" class="col-sm-6">
                <div class="list-group">
                    <a href="#" class="list-group-item" v-for="event in cases">
                        <h4 class="list-group-item-heading">
                 <i class="glyphicon glyphicon-bullhorn"></i> 
                  @{{ event.title }}
                    </h4>
                        <h5>
                     <i class="glyphicon glyphicon-calendar" v-if="event.published_at">@{{ event.published_at}}</i> 
                    
                     </h5>
                        <p class="list-group-item-text" v-if="event.case_id">Case ID : @{{ event.case_id }}</p>
                        <p class="list-group-item-text" v-if="event.title">Case Title : @{{ event.title}}</p>
                        <p class="list-group-item-text" v-if="event.description">DesCription: @{{ event.description}}</p>
                        <p class="list-group-item-text" v-if="event.type">Type : @{{ event.type}}</p>
                        <p class="list-group-item-text" v-if="event.published_at">@{{ event.published_at}}</p>
                        <div id=imgcon>
                        <img src="data:image/png;base64, @{{event.image}}"> 
                        </div>
                        <button class="btn btn-xs btn-danger" v-on:click="deleteEvent($index)">Delete</button>
                    </a>
                </div>
            </div>
            <!-- show the cases -->
           
            
        </div>
       
    </div>
  </div>
  
        <!-- /page content -->
@include('_footer')