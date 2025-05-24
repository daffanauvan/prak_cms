

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Order Kopi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/nice-select.css">					
			<link rel="stylesheet" href="css/animate.min.css">
			<link rel="stylesheet" href="css/owl.carousel.css">
			<link rel="stylesheet" href="css/main.css">
    <style>
        body {
            background-color: #faf7f1;
        }
        .coffee-card {
            background: #fff;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
            position: relative;
            transition: transform 0.2s ease-in-out;
        }
        .coffee-card:hover {
            transform: translateY(-5px);
        }
        .coffee-price {
            position: absolute;
            top: 20px;
            right: 20px;
            font-weight: bold;
            color: #c59d5f;
        }
        .coffee-title {
            font-weight: 700;
            font-size: 1.2rem;
        }
        .coffee-description {
            font-size: 0.95rem;
            color: #555;
        }
    </style>
    <header id="header" id="home">
				<div class="header-top">
		  			<div class="container">
				  		<div class="row justify-content-end">
				  			<div class="col-lg-8 col-sm-4 col-8 header-top-right no-padding">
				  				<ul>
				  					<li>
				  						Mon-Fri: 8am to 2pm
				  					</li>
				  					<li>
				  						Sat-Sun: 11am to 4pm
				  					</li>
				  					<li>
				  						<a href="tel:(012) 6985 236 7512">(+62) 896 236 7512</a>
				  					</li>				  					
				  				</ul>
				  			</div>
				  		</div>			  					
		  			</div>
				</div>			  	
			    <div class="container">
			    	<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo">
				        <a href="index.html"><img src="img/logo.png" alt="" title="" /></a>
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li class="menu-active"><a href="coffees">Home</a></li>
				            </ul>
				          </li>
				        </ul>
				      </nav><!-- #nav-menu-container -->		    		
			    	</div>
			    </div>
			  </header><!-- #header -->
</head>
<body style="background-color: #f9f7f3;">
<div class="container my-5">
    <h1 class="text-center mb-3">☕ Pesan Kopimu Sekarang!</h1>
    <p class="text-center text-muted mb-4">Kami menyediakan kopi terbaik dari biji pilihan</p>

    {{-- Form Pemesanan --}}
    <div class="card mb-5 shadow-sm">
        <div class="card-body">
            <div class="container">
    <h3>Form Pesanan Kopi</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Pemesan</label>
            <input type="text" name="NAMA" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="coffee" class="form-label">Jenis Kopi</label>
            <select name="COFFEE" class="form-select" required>
                <option value="">-- Pilih Kopi --</option>
                <option value="Americano">Americano</option>
                <option value="Espresso">Espresso</option>
                <option value="Cappuccino">Cappuccino</option>
                <option value="Macchiato">Macchiato</option>
                <option value="Mocha">Mocha</option>
                <option value="Coffee Latte">Coffee Latte</option>
                <option value="Piccolo Latte">Piccolo Latte</option>
                <option value="Ristretto">Ristretto</option>
                <option value="Affogato">Affogato</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" name="JUMLAH" class="form-control" min="1" required>
        </div>
                <button type="submit" class="btn btn-primary">🛒 Pesan Sekarang</button>
            </form>
        </div>
    </div>

   <div class="row">
						<div class="col-lg-4">
							<div class="single-menu">
								<div class="title-div justify-content-between d-flex">
									<h4>Cappuccino</h4>
									<p class="price float-right">
										$2,5
									</p>
								</div>
								<p>
									kopi yang memiliki rasa lembut, halus, dan seimbang antara rasa pahit kopi dan manis susu. Rasa kopi tetap terasa kuat, namun dilapis busa susu yang creamy.
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-menu">
								<div class="title-div justify-content-between d-flex">
									<h4>Americano</h4>
									<p class="price float-right">
										$1,5
									</p>
								</div>
								<p>
									Rasa kopi yang kuat namun tidak terlalu pahit seperti espresso murni. 
								</p>								
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-menu">
								<div class="title-div justify-content-between d-flex">
									<h4>Espresso</h4>
									<p class="price float-right">
										$1,5
									</p>
								</div>
								<p>
									 Rasa pahit yang kuat, terutama karena konsentrasi kopi yang tinggi. 
								</p>								
							</div>
						</div>	
						<div class="col-lg-4">
							<div class="single-menu">
								<div class="title-div justify-content-between d-flex">
									<h4>Macchiato</h4>
									<p class="price float-right">
										$2
									</p>
								</div>
								<p>
									Rasa perpaduan unik antara rasa kopi yang kuat dan sentuhan lembut susu
								</p>								
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-menu">
								<div class="title-div justify-content-between d-flex">
									<h4>Mocha</h4>
									<p class="price float-right">
										$2
									</p>
								</div>
								<p>
									 Rasa perpaduan yang unik antara rasa kopi dan cokelat. Secara umum, mocha memiliki rasa manis seperti cokelat dengan sentuhan rasa pahit dari kopi.
								</p>								
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-menu">
								<div class="title-div justify-content-between d-flex">
									<h4>Coffee Latte</h4>
									<p class="price float-right">
										$1,5
									</p>
								</div>
								<p>
									Rasa perpaduan antara kopi yang sedikit pahit dan rasa susu yang lembut dan manis.
								</p>								
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-menu">
								<div class="title-div justify-content-between d-flex">
									<h4>Piccolo Latte</h4>
									<p class="price float-right">
										$2,5
									</p>
								</div>
								<p>
									Rasa kopi yang kuat namun tetap lembut karena perpaduan espresso dengan sedikit susu.
								</p>								
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-menu">
								<div class="title-div justify-content-between d-flex">
									<h4>Ristretto</h4>
									<p class="price float-right">
										$2
									</p>
								</div>
								<p>
									Rasa yang kuat, manis, dan sedikit asam dengan aroma buah atau cokelat.
								</p>								
							</div>
						</div>
						<div class="col-lg-4">
							<div class="single-menu">
								<div class="title-div justify-content-between d-flex">
									<h4>Affogato</h4>
									<p class="price float-right">
										$3
									</p>
								</div>
								<p>
									Perpaduan sensasi manis, pahit, dan dingin dari Es krim vanila
								</p>								
							</div>
						</div>															
					</div>
				</div>	
			</section>
    </div>
</div>
</body>
</footer>	
			<!-- End footer Area -->	

			<script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="js/vendor/bootstrap.min.js"></script>			
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  			<script src="js/easing.min.js"></script>			
			<script src="js/hoverIntent.js"></script>
			<script src="js/superfish.min.js"></script>	
			<script src="js/jquery.ajaxchimp.min.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>	
			<script src="js/owl.carousel.min.js"></script>			
			<script src="js/jquery.sticky.js"></script>
			<script src="js/jquery.nice-select.min.js"></script>			
			<script src="js/parallax.min.js"></script>	
			<script src="js/waypoints.min.js"></script>
			<script src="js/jquery.counterup.min.js"></script>					
			<script src="js/mail-script.js"></script>	
			<script src="js/main.js"></script>	
		</body>
	</html>

