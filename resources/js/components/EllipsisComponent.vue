<template>
<span class="chat-ellipsis height-15">
    <a href="#" class="fa fa-ellipsis-h line-height-15 font-16" :class="'partner-'+partner_id" data-toggle="popover" title="Settings" data-placement="left" @click.prevent="del($event)"></a>
</span>
</template>
 
<script>
    export default {
		data() {
			return {
				
			}
		},
		methods: {
			setContent: function() {
				let _this = this;
				$('[data-toggle="popover"].partner-'+this.partner_id).popover({html:true, content:_this.popoverContent});
			},
			del: function(event) {
				event.stopPropagation();
			}
		},
		computed: {
			popoverContent: function() {
				let baseUrl = document.head.querySelector("[name='base-url']").getAttribute('content');
				return '<div class="list-group">'
					+'<a href="'+baseUrl+'/chats/delete/'+this.partner_id+'" class="list-group-item" id="del-'+this.partner_id+'">Delete</a>'
					+'<a href="'+baseUrl+'/chats/block/'+this.partner_id+'" class="list-group-item" id="blo-'+this.partner_id+'">Block</a>'
				+'</div>';
			},
			jqueryInitialize: function() {
				$(window).on('click', function (e) {
					if ($(e.target).data('toggle') !== 'popover' && $(e.target).parents('.popover.in').length === 0) { 
						$('[data-toggle="popover"]').popover('hide');
					}
				});
			}
		},
		mounted: function() {
			this.jqueryInitialize;
			this.setContent();
		},
		props: ['partner_id']
    }
</script>
<style>
	.chat-ellipsis {
		visibility:hidden;
	}
	.ellipsis-hover:hover .chat-ellipsis {
		visibility:visible;
	}
</style>