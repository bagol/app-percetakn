<section id="registered">
	<div class="container">
		<?php if ($this->session->flashdata("scc")) {?>
			<div class="alert alert-success" role="alert">
				<strong>Pendaftaran Berhashil</strong>
				<br>
				<p><?=$this->session->flashdata("scc")?></p>
			</div>
		<?php } else {?>
			<div class="alert alert-danger" role="alert">
				<strong>Gagal mendaftar</strong>
				<br>
				<p><?=$this->session->flashdata("err")?></p>
			</div>
		<?php }?>
	</div>
</section>