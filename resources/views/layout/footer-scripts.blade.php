<!-- SUBSCRIPTION MODAL START -->
<div class="modal fade genModal" id="genModal1" tabindex="-1" aria-labelledby="genModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<div class="row align-items-center mb-5">
					<div class="col-6">
						<p class="heading">Subscription</p>
						<p class="desc">Monthly Subscriptions / Memberships</p>
					</div>
					<div class="col-6">
						<div class="amount">
							<p class="rate">$30</p>
							<p class="pkgType text-end">Monthy</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-6">
						<div class="modalSong xy-center">
							<img src="assets/images/song-img-1.png" alt="img" class="bgImg">
							<img src="assets/images/play-icon1.png" alt="img" class="plyModalBtn">
						</div>
					</div>
					<div class="col-6">
						<div class="modalSong xy-center">
							<img src="assets/images/black.png" alt="img" class="bgImg">
							<img src="assets/images/play-icon2.png" alt="img" class="plyModalBtn">
						</div>
					</div>
					<div class="col-12">
						<a href="#!" class="genBtn mt-5 planBtn">Start Plan</a>
					</div>
				</div>	
				<p class="closeBtn xy-center subsCloseBtn" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i></p>	
			</div>
		</div>
	</div>
</div>
<!-- SUBSCRIPTION MODAL END -->

<!-- EDIT EVENT MODAL START -->
<div class="modal fade genModal" id="genModal2" tabindex="-1" aria-labelledby="genModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<p class="heading pb-3">Events Edit</p>

				<form class="row eventForm">
					<div class="col-12">
						<div class="form-group mb-3">
							<label class="label1">Event Title</label>
							<input type="text" class="eventInput" placeholder="Awesome Event">	
						</div>
					</div>
					<div class="col-12">
						<div class="form-group mb-3">
							<label class="label1">Conventional Hall</label>
							<input type="text" class="eventInput" placeholder="Conventional Hall">	
						</div>
					</div>
					<div class="col-12">
						<div class="form-group mb-3">
							<label class="label1">Event Details</label>
							<textarea class="eventInput textArea">lorem ipsum dolor sit amet, consectetur  adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim</textarea>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12 col-12">
						<div class="form-group mb-3">
							<label class="label1">Date</label>
							<input type="date" class="eventInput" placeholder="Conventional Hall">	
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12 col-12">
						<div class="form-group mb-3">
							<label class="label1">Time</label>
							<input type="time" class="eventInput" placeholder="Conventional Hall">	
						</div>
					</div>

					<div class="col-12">
						<div class="form-group mt-3">
							<a href="#!" class="genBtn">Update</a>	
						</div>
					</div>
				</form>
				<p class="closeBtn xy-center" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i></p>	
			</div>
		</div>
	</div>
</div>
<!-- EDIT EVENT MODAL END -->

<!-- ADD EVENT MODAL START -->
<div class="modal fade genModal" id="genModal3" tabindex="-1" aria-labelledby="genModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<p class="heading pb-3">Add Event</p>

				<form class="row eventForm">
					<div class="col-12">
						<div class="form-group mb-3">
							<label class="label1">Event Title</label>
							<input type="text" class="eventInput" placeholder="Awesome Event">	
						</div>
					</div>
					<div class="col-12">
						<div class="form-group mb-3">
							<label class="label1">Conventional Hall</label>
							<input type="text" class="eventInput" placeholder="Conventional Hall">	
						</div>
					</div>
					<div class="col-12">
						<div class="form-group mb-3">
							<label class="label1">Event Details</label>
							<textarea class="eventInput textArea">lorem ipsum dolor sit amet, consectetur  adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim</textarea>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12 col-12">
						<div class="form-group mb-3">
							<label class="label1">Date</label>
							<input type="date" class="eventInput" placeholder="Conventional Hall">	
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12 col-12">
						<div class="form-group mb-3">
							<label class="label1">Time</label>
							<input type="time" class="eventInput" placeholder="Conventional Hall">	
						</div>
					</div>

					<div class="col-12">
						<div class="form-group mt-3">
							<a href="#!" class="genBtn">Create Event</a>	
						</div>
					</div>
				</form>
				<p class="closeBtn xy-center" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i></p>	
			</div>
		</div>
	</div>
</div>
<!-- ADD EVENT MODAL END -->

<!-- BOOTSTRAP 5 -->	
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script> 
<!-- BOOTSTRAP 5 -->	
<!-- JQUERY  -->
	
<script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
<!-- JQUERY  -->	
<!-- RESPONSIVE NAVIFATION -->
<script src="{{asset('assets/js/stellarnav.min.js')}}"></script>
<!-- RESPONSIVE NAVIFATION -->
<!-- SWIPER SLIDER -->
<script src="{{asset('assets/js/swiper-bundle.min.js')}}"></script>
<!-- SWIPER SLIDER -->
<!-- FANCY BOX IMAGE VIEWER -->
<script src="{{asset('assets/js/jquery.fancybox.min.js')}}"></script> 
<!-- FANCY BOX IMAGE VIEWER -->
<!-- JAVASCRIPT SHEETS -->
<script src="{{asset('assets/js/Chart2.js')}}"></script>
<script src="{{asset('assets/js/utils.js')}}"></script>
<script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
{{-- <script src="{{asset('assets/js/audio.js')}}"></script>--}} 
{{-- <script src="{{asset('assets/js/custom.js')}}"></script> --}} 
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.growl.js')}}"></script>
    <script src="{{asset('assets/js/notifIt.js')}}"></script>
    <script src="{{asset('assets/js/rainbow.js')}}"></script>
    <script src="{{asset('assets/js/sample.js')}}"></script>

	<script>
        $(document).ready(function () {

            var msg = $('#mSg').val();
            var color = $('#mSg').attr('color');
            var title = $('#mSg').attr('title');

            if (msg) {
                not(msg, color, title);
            }
        });

        function not(msg, color, title) 
        {
            notif({
                msg: "<b>" + title + ": </b>" + msg + " ",
                type: color
            });
        }

    </script>
<!-- JAVASCRIPT SHEETS -->
