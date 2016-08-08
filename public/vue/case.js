
var img;

var Case = new Vue({

    el: '#cases',

   
    data: {

        case: { case_id: '', title: '', type: '', description: '', image: '', published_at: '', },
        cases: [],
        
    },
    
    ready: function() { 

    	this.fetchCases();


    },

    methods: {
        sync: function(e) {
            e.preventDefault()
            var file = e.target.files[0];
           
            var myReader = new FileReader()
            myReader.readAsDataURL(file)
            //console.log(reader.result);

            myReader.onload = function(event){
            	img=myReader.result;
          
    		console.log(myReader.result);
			};                     
        },

        // Adds an case to the existing cases array
        addCase: function() {           

            this.$http.post(base_url + 'api/caseslibry/', {

                title: this.case.title,
                case_id: this.case_id,
                image: img,
                description: this.description,
                type: this.case.type,
            }).then((response) => {
                this.cases.push(this.case);
                //this.$set('cases', response.json());
                console.log("send data")
            }, (response) => {
                // error callback
            });


        },

        fetchCases: function() {
        	this.$http.get(base_url+'api/caseslibry/?page=1&limit=40').then((response) => {
                this.$set('cases',   response.json().docs)
                    console.log(response.json().docs);
                return response.json();

            }, (response) => {
                console.log(response);
            });
        },

        deletecase: function(index) {
            if (confirm("Are you sure you want to delete this case?")) {             
                this.cases.$remove(index);
            }
        }
    }
});
