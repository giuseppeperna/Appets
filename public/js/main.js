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
     userChoices: [],
     showMenu: false,
   },
     // Animazioni Homepage
   methods: {
      animation_visibility(isVisible, entry, section) {
         this.animateSection[section] = isVisible;
      },
      // Chiamata AJAX e gestione della ricerca
      searchRestaurants: function(){
         if(this.userChoices.length == 0){
           return this.filteredRestaurants = [];
        }
         axios.get('http://localhost:8000/api/ristoranti/search',
            {params: {api_token: this.apiKey, 'nome[]': this.userChoices}}).then(result =>{
               let filtered = [];
               for(restaurant in result.data.data){
                 let categories = result.data.data[restaurant][0].tipologia;
                 if(this.userChoices.every(choice => categories.includes(choice))){
                    filtered.push(result.data.data[restaurant][0])
                 }}
               this.filteredRestaurants = filtered;
            });

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
      },
      showMenuMobile() {
         this.showMenu = !this.showMenu;
      },
   },
   mounted: function(){
     this.userChoices = ['italiano'];
     this.searchRestaurants();
  }
});
