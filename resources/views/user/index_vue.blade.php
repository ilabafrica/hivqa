@extends("app")
@section("content")

<div class="container" id="manage-users">
<div class="row">
    <div class="col-sm-8">
        <ol class="breadcrumb">
            <li><a href="{!! url('home') !!}"><i class="fa fa-home"></i> Home</a></li>
            <li class="active"><i class="fa fa-users"></i> User Management</li>
            <li class="active"><i class="fa fa-cube"></i> User</li>
        </ol>
    </div>
</div>			                
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left col-md-9">
	            <h5><i class="fa fa-book"></i> {!! trans_choice('messages.user', 2) !!}

	                <button type="button" class="btn btn-sm btn-belize-hole" data-toggle="modal" data-target="#create-user" >
	                    <i class="fa fa-plus-circle"></i>
	                    {!! trans('Add') !!}
	                </button>
	                <a class="btn btn-sm btn-carrot" href="#" onclick="window.history.back();return false;" alt="{!! trans('messages.back') !!}" title="{!! trans('messages.back') !!}">
	                    <i class="fa fa-step-backward"></i>
	                    {!! trans('messages.back') !!}
	                </a>
	            </h5>
	        </div>
	        <div class="col-md-3">
	            <div class="input-group input-group-sm">
	                <input type="text" class="form-control" placeholder="Search for..." v-model="search" v-on:keyup.enter="search()">
	                <span class="input-group-btn">
	                    <button class="btn btn-secondary" type="button" @click="search()" v-if="!loading"><i class="fa fa-search"></i></button>
	                    <button class="btn btn-secondary" type="button" disabled="disabled" v-if="loading">Searching...</button>
	                </span>
	            </div>
	        </div>
	    </div>
	</div>
	<div class="panel-body">
	    @if (session('status'))
	        <div class="alert alert-success">
	            {{ session('status') }}
	        </div>
	    @endif

	   <div class="row">
	        <div class="col-sm-12">
	        	<table class="table">
	        		<thead>
	        			<tr>
	        				<th>Name</th>
	        				<th>Email</th>
	        				<th>Phone</th>
	        				<th>Action</th>
	        			</tr>
	        		</thead>
	        		<tbody>
	        			<tr v-for="user in users">
	        				<td>@{{user.name }}</td>
	        				<td>@{{user.email}}</td>
	        				<td>@{{user.phone}}</td>
	        				<td>	        					
                				<button v-bind="{ 'disabled': user.deleted_at }" class="btn btn-sm btn-primary"  @click.prevent="editUser(user)"><i class="fa fa-edit"></i> Edit</button>
	        				</td>
	        			</tr>
	        		</tbody>
	        	</table>
	        </div>
	    </div>
	</div>
	<!-- Create User Modal -->
    <div class="modal fade" id="create-user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create User</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form method="POST" enctype="multipart/form-data" v-on:submit.prevent="createUser('create_user')" data-vv-scope="create_user">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-4 form-control-label"  :class="{'help is-danger': errors.has('create_user.first_name') }"
                                        for="first_name">First Name:</label>
                                    <div class="col-sm-8" :class="{ 'control': true }">
                                        <input v-validate="'required|alpha_spaces'" class="form-control"
                                            :class="{'input': true,'is-danger': errors.has('create_user.first_name') }" name="first_name"
                                            type="text" placeholder=""
                                            v-model="newUser.first_name" />
                                        <span v-show="errors.has('create_user.first_name')" class="help is-danger">
                                            @{{ errors.first('create_user.first_name') }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 form-control-label"  :class="{'help is-danger': errors.has('create_user.middle_name') }"
                                        for="middle_name">Middle Name:</label>
                                    <div class="col-sm-8" :class="{ 'control': true }">
                                        <input v-validate="'alpha_spaces'" class="form-control"
                                            :class="{'input': true,'is-danger': errors.has('create_user.middle_name') }" name="middle_name"
                                            type="text" placeholder=""
                                            v-model="newUser.middle_name" />
                                        <span v-show="errors.has('create_user.middle_name')" class="help is-danger">
                                            @{{ errors.first('create_user.middle_name') }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 form-control-label"  :class="{'help is-danger': errors.has('create_user.last_name') }"
                                        for="last_name">Last Name:</label>
                                    <div class="col-sm-8" :class="{ 'control': true }">
                                        <input v-validate="'required|alpha_spaces'" class="form-control"
                                            :class="{'input': true,'is-danger': errors.has('create_user.last_name') }" name="last_name"
                                            type="text" placeholder=""
                                            v-model="newUser.last_name" />
                                        <span v-show="errors.has('create_user.last_name')" class="help is-danger">
                                            @{{ errors.first('create_user.last_name') }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 form-control-label"  :class="{'help is-danger': errors.has('create_user.phone number') }" for="phone number">Phone Number:</label>
                                    <div class="col-sm-8" :class="{ 'control': true }">
                                        <input v-validate="'required|digits:10'" class="form-control" :class="{'input': true, 'is-danger': errors.has('create_user.phone number') }" name="phone number" type="text" v-model="newUser.phone"/>
                                        <span v-show="errors.has('create_user.phone number')" class="help is-danger">@{{ errors.first('create_user.phone number') }}</span>
                                        <span v-if="formErrors['phone']" class="error text-danger">@{{ formErrors['phone'] }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 form-control-label"  :class="{'help is-danger': errors.has('create_user.email') }" for="email">Email:</label>
                                    <div class="col-sm-8" :class="{ 'control': true }">
                                        <input v-validate="'required|email'" class="form-control" :class="{'input': true, 'is-danger': errors.has('create_user.email') }" name="email" type="text" v-model="newUser.email"/>
                                        <span v-show="errors.has('create_user.email')" class="help is-danger">@{{ errors.first('create_user.email') }}</span>
                                        <span v-if="formErrors['email']" class="error text-danger">@{{ formErrors['email'] }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 form-control-label"  :class="{'help is-danger': errors.has('create_user.role') }" for="role">Role:</label>
                                    <div class="col-sm-8" :class="{ 'control': true }">
                                        <div class="form-radio radio-inline" v-for="role in roles">
                                            <label class="form-radio-label">
                                                <input v-validate="'required'" type="radio" :value="role.id" v-model="newUser.role" name="role" :class="{'input': true, 'is-danger': errors.has('create_user.role') }" v-model="newUser.gender">
                                                @{{ role.value }}
                                            </label>
                                        </div>
                                        <span v-show="errors.has('create_user.role')" class="help is-danger">@{{ errors.first('create_user.role') }}</span>
                                        <span v-if="formErrors['role']" class="error text-danger">@{{ formErrors['role'] }}</span>
                                    </div>
                                </div> 
                                <div class="form-group row col-sm-offset-4 col-sm-8">
                                    <button type="submit" class="btn btn-sm btn-success"><i class='fa fa-plus-circle'></i> Submit</button>
                                    <button type="button" class="btn btn-sm btn-silver" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times-circle"></i> {!! trans('messages.cancel') !!}</span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit User Modal -->
    <div class="modal fade" id="edit-user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
	                <h4 class="modal-title" id="myModalLabel">Edit User</h4>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form method="POST" enctype="multipart/form-data" v-on:submit.prevent="updateUser(fillUser.id, 'update_user')" data-vv-validate="update_user">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-4 form-control-label"  :class="{'help is-danger': errors.has('first_name') }"
                                        for="first_name">First Name:</label>
                                    <div class="col-sm-8" :class="{ 'control': true }">
                                        <input v-validate="'required|alpha_spaces'" class="form-control"
                                            :class="{'input': true,'is-danger': errors.has('first_name') }" name="first_name"
                                            type="text" placeholder=""
                                            v-model="fillUser.name" />
                                        <span v-show="errors.has('first_name')" class="help is-danger">
                                            @{{ errors.first('first_name') }}</span>
                                    </div>
                                </div>                                
                                <div class="form-group row">
                                    <label class="col-sm-4 form-control-label"  :class="{'help is-danger': errors.has('phone number') }" for="phone number">Phone Number:</label>
                                    <div class="col-sm-8" :class="{ 'control': true }">
                                        <input v-validate="'required'" class="form-control" :class="{'input': true, 'is-danger': errors.has('phone number') }" name="phone number" type="text" v-model="fillUser.phone"/>
                                        <span v-show="errors.has('phone number')" class="help is-danger">@{{ errors.first('phone number') }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 form-control-label"  :class="{'help is-danger': errors.has('email') }" for="email">Email:</label>
                                    <div class="col-sm-8" :class="{ 'control': true }">
                                        <input v-validate="'required|email'" class="form-control" :class="{'input': true, 'is-danger': errors.has('email') }" name="email" type="text" v-model="fillUser.email"/>
                                        <span v-show="errors.has('email')" class="help is-danger">@{{ errors.first('email') }}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 form-control-label"  :class="{'help is-danger': errors.has('gender') }" for="role">Role:</label>
                                    <div class="col-sm-8" :class="{ 'control': true }">
                                        <div class="form-radio radio-inline" v-for="role in roles">
                                            <label class="form-radio-label">
                                                <input v-validate="'required'" type="radio" :value="role.id" v-model="fillUser.role" name="role" :class="{'input': true, 'is-danger': errors.has('role') }">
                                                @{{ role.value }}
                                            </label>
                                        </div>
                                        <span v-show="errors.has('role')" class="help is-danger">@{{ errors.first('role') }}</span>
                                    </div>
                                </div>
                                <div class="form-group row col-sm-offset-4 col-sm-8">
                                    <button type="submit" class="btn btn-sm btn-success"><i class='fa fa-plus-circle'></i> Submit</button>
                                    <button type="button" class="btn btn-sm btn-silver" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times-circle"></i> {!! trans('messages.cancel') !!}</span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
