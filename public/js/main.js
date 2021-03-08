const my_app = new Vue({
    el: '#root',
    data:{
      // Animazioni Homepage
     animateSection: {
          restaurants: false,
          events: false,
          jobs: false,
       },
      // Chiamata AJAX e gestione della ricerca
      apiKey: 'f40d9398-9488-464e-8d4c-8fb353472d49',
      filteredRestaurants: [],
      userChoice: 'italiano',
    },
      // Animazioni Homepage
    methods: {
       animation_visibility(isVisible, entry, section) {
          this.animateSection[section] = isVisible;
       },
       // Chiamata AJAX e gestione della ricerca
       searchRestaurants: function(){
          axios.get('http://localhost:8000/api/tipologie/search',
             {params: {api_token: this.apiKey, data: this.userChoice}}).then(result => this.filteredRestaurants = result.data.data);
       },
    },
    mounted: function(){
      axios.get('http://localhost:8000/api/tipologie/search',
        {params: {api_token: this.apiKey, data: 'italiano'}}).then(result => this.filteredRestaurants = result.data.data);
   }
 });
