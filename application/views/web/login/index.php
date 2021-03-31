<section id="form">
		<!--form-->
		<?php if ($this->session->flashdata("err")): ?>
			<div class="container">
				<div class="alert alert-danger" role="alert">
					<strong>Terjadi Kesalahan</strong>
					<br>
					<p><?=$this->session->flashdata("err")?></p>
				</div>
			</div>
		<?php endif;?>
		<div class="container">
				<div class="row">
						<div class="col-sm-4 col-sm-offset-1">
								<div class="login-form" id="app">
										<!--login form-->
										<h2>Login to your account</h2>
										<form action="<?=base_url("Auth/login_pelanggan")?>" method="post">
												<input type="email" placeholder="email" name="email" autocomplete="off" />
												<input :type="visible" placeholder="Katasandi" name="katasandi" />
												<span>
														<input v-model="isVisible" type="checkbox" class="checkbox">
														lihat Password
												</span>
												<button type="submit" class="btn btn-default">Masuk</button>
										</form>
								</div>
								<!--/login form-->
						</div>
						<div class="col-sm-1">
								<h2 class="or">OR</h2>
						</div>
						<div class="col-sm-4">
								<div class="signup-form">
										<!--sign up form-->
										<h2>New User Signup!</h2>
										<form action="<?=base_url("User/Register")?>" method="post">
												<input type="text" name="nama_pelanggan" placeholder="Nama" autocomplete="off" />
												<input type="email" name="email" placeholder="Alamat Email" autocomplete="off" />
												<input type="password" name="katasandi" placeholder="Katasandi" />
												<button type="submit" class="btn btn-default">Dafatar</button>
										</form>
								</div>
								<!--/sign up form-->
						</div>
				</div>
		</div>
</section>
<!--/form-->
<script src="<?=base_url("assets/js/vue.js")?>"></script>
<script>
	const vm = new Vue({
		el:"#app",
		data:{
			visible:"password",
			isVisible: false
		},
		watch:{
			isVisible: function(){
				if (this.isVisible) return this.visible = "text";
				this.visible = "password";
			}
		}
	})
</script>