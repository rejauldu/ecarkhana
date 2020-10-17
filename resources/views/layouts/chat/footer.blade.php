
	</div><!--end of #app-->
	<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
		@csrf
	</form>
	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}?{{ time() }}"></script>
	<!-- Smooth Scroll -->
	<!--- Box JavaScript -->
	<script src="{{ asset('js/adminlte.min.js') }}" defer></script>
	<script src="{{ asset('js/demo.js') }}" defer></script>
	<script src="{{ asset('js/smooth-scroll.js') }}" defer></script>
	@yield('script')
	<script src="{{ asset('js/theme.js') }}" defer></script>
</body>
</html>