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
      userChoices: ['italiano'],
    },
      // Animazioni Homepage
    methods: {
       animation_visibility(isVisible, entry, section) {
          this.animateSection[section] = isVisible;
       },
       // Chiamata AJAX e gestione della ricerca
       searchRestaurants: function(){
          const myResult = [];
          this.userChoices.forEach(userChoice => { axios.get('http://localhost:8000/api/tipologie/search',
             {params: {api_token: this.apiKey, data: userChoice}}).then(result => myResult.push(result.data.data))})
             this.filteredRestaurants = myResult;
       },
       toggleChoice: function(value){
          if (this.userChoices.includes(value)){
             const index = this.userChoices.indexOf(value);
             this.userChoices.splice(index, 1);
          } else {
             this.userChoices.push(value);
          }
       },
       getClass: function(value){
          if (this.userChoices.includes(value)){
             return 'filter-active';
          } else {
             return '';
          }
       }
    },
    mounted: function(){
      axios.get('http://localhost:8000/api/tipologie/search',
        {params: {api_token: this.apiKey, data: 'italiano'}}).then(result => this.filteredRestaurants.push(result.data.data));
   },

 });
