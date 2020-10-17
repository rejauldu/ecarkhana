<template>
<div class="vh-50 scroll-y scrollbar container-fluid px-0">
	<div class="row sticky-top bg-light border-bottom shadow-sm">
		<div class="col-12">
			<div class="input-group">
				<input type="text" class="form-control"  placeholder="Search" v-model="search" />
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<div v-for="message in mutable_message_list" v-if="searched(getPartner(message))" :class="{ 'alert-secondary': getPartnerId(message) == partner.id, 'alert-primary font-weight-bold': isHighlight(message)}" class="border-bottom"  @click="chatListClick" :partner="getPartner(message).id">
				<div class="cursor-pointer ellipsis-hover clearfix" :key="message.id+message.sender_id+user.id">
					<div class="width-64 height-64 position-relative float-left collapse-fit">
						<img :src="'/assets/profile/'+getPartner(message).photo" class="w-100 h-100" alt="Profile">
						<i class="fa fa-circle position-absolute bottom-5 right-5 text-light-secondary font-9" :class="{'text-success': isOnline(message)}"></i>
					</div>
					<div class="overflow-hidden clearfix ml-1 mr-2 pl-2 collapse-none">
						<div class="float-right">{{ convertToDate(message.created_at) }}</div>
						<h5 class="excerpt mt-1 mb-0">{{ getPartner(message).name }}</h5>
						<p class="mb-0 excerpt">{{ message.message }}</p>
						<ellipsis :partner_id="getPartnerId(message)" class="float-right"></ellipsis>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</template>
<script>
import ellipsis from './EllipsisComponent.vue'

export default {
	components: {
		ellipsis
	},
	data () {
		return {
			mutable_message_list: this.message_list,
			search: '',
			users: []
		}
	},
	methods: {
		convertToDate: function(d) {
			if(!d)
				return '';
			var date = new Date(d);
			var months = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
			var day = date.getDay();
			var today = new Date();
			if(today.getDate() == date.getDate() && today.getMonth() == date.getMonth() && today.getFullYear() == date.getFullYear()) {
				return 'Today';
			}
			return months[date.getMonth()]+' '+date.getDate();
		},
		messageReceived: function(data) {
			let partner_id = this.getPartnerId(data);
			let _this = this;
			let isExist = false;
			for(let i = 0; i<this.mutable_message_list.length; i++) {
				/* Here, the first condition is for the scenerio when a user first time send more than one message to anyone. */
				if(!this.mutable_message_list[i].sender || this.mutable_message_list[i].sender.id == partner_id || this.mutable_message_list[i].receiver.id == partner_id) {
					_this.mutable_message_list[i].id = data.id;
					_this.mutable_message_list[i].message = data.message;
					_this.mutable_message_list[i].viewed_at = data.viewed_at;
					isExist = true;
					break;
				}
			}
			if(!isExist) {
				this.mutable_message_list.push(data);
			}
			if(this.mutable_message_list.length>1)
				this.mutable_message_list.sort((a, b) => { return b.id - a.id;});
		},
		onlineUpdateUser:function(users) {
			this.users = users;
		},
		isOnline:function(message) {
			let objIndex = this.users.findIndex((obj => obj.id == this.getPartnerId(message)));
			return objIndex > -1 ? true : false;
		},
		getPartner: function(message) {
			if(!message.sender)
				return this.partner;
			if(message.sender.id == this.user.id)
				return message.receiver;
			return message.sender;
		},
		getPartnerId: function(response) {
			if(response.sender_id == this.user.id)
				return response.receiver_id;
			return response.sender_id;
		},
		chatListClick: function(e) {
			let popover = e.target.getAttribute('data-toggle');
			let baseUrl = document.head.querySelector("[name='base-url']").getAttribute('content');
			if(popover !== "popover") {
				window.location.replace(baseUrl+'/chats/'+e.currentTarget.getAttribute('partner'));
			} else {
			
			}
		},
		searched: function(user) {
			var name = user.name.toUpperCase();;
			var string = this.search.toUpperCase();
			if(!this.search || name.includes(string)) {
				return true;
			}
			return false;
		},
		isHighlight: function(message) {
			return !message.viewed_at && message.sender_id != this.user.id && message.sender_id != this.partner.id;
		}
	},
	computed: {
		
	},
	mounted: function() {
	},
	created() {
		this.$eventBus.$on('message', this.messageReceived);
		this.$eventBus.$on('users', this.onlineUpdateUser);
	},
	beforeDestroy() {
		this.$eventBus.$off('message');
		this.$eventBus.$off('users');
	},
	props: ['user', 'partner', 'message_list']
}
</script>
<style>
.sidebar-collapse .main-sidebar .collapse-fit {
	width:45px !important;
	height:45px !important;
}
.sidebar-collapse .main-sidebar .collapse-none {
	display:none !important;
}
.main-sidebar {
	padding-top:50px !important;
}
</style>