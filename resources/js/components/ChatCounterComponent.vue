<template>
	<span v-if="mutable_total_unread_message" class="badge badge-danger badge-counter">{{ mutable_total_unread_message }}</span>
</template>
<script>

export default {
	data () {
		return {
			mutable_total_unread_message: this.total_unread_message,
			users: [],
		}
	},
	methods: {
		updateCounter: function(e) {
			if(e.type == "text") {
				let partner_id = this.partner?this.partner.id:0;
				if(e.sender_id != this.user.id && e.sender_id != partner_id) {
					this.mutable_total_unread_message++;
					this.changeFavicon();
					this.sound();
				}
			}
		},
		sendReceivedNotification: function(message) {
			/* In chatting page partner variable will be available. Otherwise not */
			
			if(message.type == 'text' && this.isEmpty(this.partner)) {
				let data = {
					"id":message.id,
					"type":"received_notification",
					"sender_id":message.receiver_id,
					"receiver_id":message.sender_id,
				};
				this.sendByAxios(data);
			}
		},
		sendByAxios: function(data) {
			axios.post('/chats', data)
				.then(function(response) {
					
				})
				.catch(function(error) {
				});
		},
		isEmpty: function(obj) {
			return Object.entries(obj).length === 0 && obj.constructor === Object;
		},
		changeFavicon: function() {
			var link = document.querySelector("link[rel*='icon']") || document.createElement('link');
			link.type = 'image/x-icon';
			link.rel = 'shortcut icon';
			var base_url = document.querySelector('meta[name="base-url"]').content;
			link.href = base_url+'/assets/favicon-notification.ico';
			document.getElementsByTagName('head')[0].appendChild(link);
		},
		sound: function() {
			let audio = new Audio(base_url+'assets/audio.mp3');
			audio.play();
		}
	},
	computed: {
		onlineUserEmit: function() {
			this.$eventBus.$emit('users', this.users);
		}
	},
	mounted: function() {
		let _this = this;
		this.channel = Echo.private('Chat.'+_this.user.id)
			.listen('PrivateChatEvent', (e) => {
				_this.updateCounter(e);
				_this.sendReceivedNotification(e);
				
			});
		Echo.join('Chat')
		.here((users) => {
			_this.users = users;
			_this.onlineUserEmit;
		})
		.joining((user) => {
			_this.users.push(user);
			_this.onlineUserEmit;
		})
		.leaving((user) => {
			_this.users = _this.users.filter(function(e) { return e.id !== user.id });
			_this.onlineUserEmit;
		});
	},
	props: ['user', 'partner', 'total_unread_message']
}
</script>