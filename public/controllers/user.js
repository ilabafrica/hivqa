Vue.http.headers.common['X-CSRF-TOKEN'] = $("#token").attr("value");
Vue.http.interceptors.unshift(function(request, next) {
    next(function(response) {
        if(typeof response.headers['content-type'] != 'undefined') {
            response.headers['Content-Type'] = response.headers['content-type'];
        }
    });
});
new Vue({
	el: '#manage-users',
	  data: {
        users: [],
        roles: [],
        newUser : {'first_name':'','middle_name':'','last_name':'','phone':'', 'email':'','role':''},
        fillUser : {'name':'','role': '','phone':'', 'email':'', 'id':''},
        formErrors:{},
        search: '',
        loading: '',
	    
	  },

	  computed:{

	  },
	  mounted: function(){
	  	this.getUsers();
	  	// this.loadRoles();
	  },

	  methods: {
	  	getUsers:function(){
            this.$http.get('/get_users').then((response) => {
                this.users = response.data;
            })
	  	},

	  	createUser: function(scope){
            this.$validator.validateAll(scope).then(() => {
                var input = this.newUser;
                this.$http.post('/get_users',input).then((response) => {
                    this.changePage(this.pagination.current_page);
                    this.newUser = {'first_name':'','middle_name':'','last_name':'','phone':'', 'email':'','role':''};
                    $("#create-user").modal('hide');
                    toastr.success('User Created Successfully.', 'Success Alert', {timeOut: 5000});
                }, (response) => {
                    this.formErrors = response.data;
                    console.log(this.formErrors );
                });
            }).catch(() => {
                toastr.error('Please fill in the fields as required.', 'Validation Failed', {timeOut: 5000});
                return false;
            });
        },
         editUser: function(user){
            this.fillUser.id = user.id;
            this.fillUser.name = user.name;
            this.fillUser.phone = user.phone;
            this.fillUser.email = user.email;
            this.fillUser.role = user.role;
            $("#edit-user").modal('show');
        },
        updateUser: function(id, scope){
            this.$validator.validateAll(scope).then(() => {
                var input = this.fillUser;
                this.$http.put('/get_users/'+id,input).then((response) => {
                    //this.changePage(this.pagination.current_page); - @TODO
                    this.fillUser = {'name':'', 'phone':'', 'email':'', 'role':''};
                    $("#edit-user").modal('hide');
                    toastr.success('User Updated Successfully.', 'Success Alert', {timeOut: 5000});
                }, (response) => {
                    this.formErrorsUpdate = response.data;
                });
            }).catch(() => {
                toastr.error('Please fill in the fields as required.', 'Validation Failed', {timeOut: 5000});
                return false;
            });
        },
        //    Populate roles from RoleController
        loadRoles: function() {
            this.$http.get('/role_list').then((response) => { 
                this.roles = response.data;
            }, (response) => {
                // console.log(response);
            });
        },

	  }

})