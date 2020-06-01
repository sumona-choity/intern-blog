import Vue from 'vue';
import Vuex from 'vuex';




Vue.use(Vuex);

export default new Vuex.Store({
  state:{
    authUser:false,
		
	},
	getters:{
	
		  isLoggedIn (state) {
	    	return !!state.authUser
	  	},
	  	getAuthUser(state){
	  		return state.authUser
		  },
		  
	},
	mutations:{
		
		setAuthuser (state, data) {
      state.authUser = data
    },
	}
});
