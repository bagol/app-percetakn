<section id="acount_user">
	<style>
		th {
			border: none !important;
		}
		td	{
			border: none !important;
		}
		table	{
			/*border: 1px #ccc solid;*/
			border-radius: 5px;
			box-shadow: 2px 2px 10px #ccc;
		}
	</style>
	<div class="container">
		<div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Profile Account</li>
            </ol>
        </div>
        <?php if ($this->session->flashdata("err")): ?>
        	<div class="alert alert-danger" role="alert">
			  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			  <span class="sr-only">Error:</span>
			  <?=$this->session->flashdata("err")?>
			</div>
        <?php endif ?>
        <?php if ($this->session->flashdata("scc")): ?>
        	<div class="register-req">
	            <p>
	                <?=$this->session->flashdata("scc")?>
	            </p>
	        </div>
        <?php endif ?>
		<div class="row" id="app">
			<form action="<?=base_url("User/updateProfile")?>" enctype="multipart/form-data" method="post">
				<div class="col col-md-5">
					<div class="panel panel-default">
					  <div class="panel-body text-center">
					    <img :src="gambar" alt="" width="300">
					  </div>
					  <div class="panel-footer">
					  
					  	<label for="gambar" class="btn btn-sm btn-success" style="width: 100%;">
					  		Ganti Foto Profile
					  		<input type="file" id="gambar" name="gambar" style="display:none;">
					  	</label>
					  </div>
					</div>
				</div>
				<div class="col col-md-7">
					<table class="table">
						<tr>
							<th>Nama Pelanggan</th>
							<td><input type="text" value="<?=$this->session->userdata("nama_pelanggan") ?>" name="nama_pelanggan" class="form-control"></td>
						</tr>
						<tr>
							<th>No Telepon</th>
							<td>
								<input type="text" class="form-control" v-model="no_tlpn" name="no_tlpn" placeholder="Masukan No telpon anda" required>
							</td>
						</tr>
						<tr>
							<th>Provinsi</th>
							<td>
								<select name="provinsi" class="form-control" v-model="provinsi" >
									<option value="0">Pilih Provinsi</option>
									<option v-for="p in provinces" :value="p.province_id">{{p.province}}</option>
								</select>
							</td>
						</tr>
						<tr>
							<th>Kota</th>
							<td>
								<select name="kota" class="form-control" v-model="kota" >
									<option value="0">Pilih Kota</option>
									<option v-for="c in city" :value="c.city_id">{{c.type}} - {{c.nama_kota}}</option>
								</select>
							</td>
						</tr>
						<tr>
							<th>Kecamatan</th>
							<td>
								<input type="text" class="form-control" v-model="kecamatan" name="kecamatan" placeholder="Masukan Nama Kecamatan Anda" required>
							</td>
						</tr>
						<tr>
							<th>Kelurahan</th>
							<td>
								<input type="text" class="form-control" v-model="kelurahan" name="kelurahan" placeholder="Masukan Nama Kelurahan anda" required>
							</td>
						</tr>
						<tr>
							<th>Kode Pos</th>
							<td>
								<input type="text" class="form-control" v-model="kode_pos" name="kode_pos" placeholder="Masukan Kode Pos anda" required>
							</td>
						</tr>
						<tr>
							<th>Alamat</th>
							<td>
								<input type="text" class="form-control" v-model="alamat" name="alamat" placeholder="Masukan Alamat Anda" required>
							</td>
						</tr>
						<tr>
							<td></td>
							<td>
								<input type="hidden" name="kode_pelanggan" value="<?=$this->session->userdata('kode_pelanggan')?>">
								<button type="submit" class="btn btn-primary" style="float: right;margin-top: 0;width: 100%;">Simpan</button>
							</td>
						</tr>
					</table>
				</div>
			</form>
		</div>
	</div>
</section>

<script src="<?=base_url("assets/js/vue.js")?>"></script>
<script>
	const vm = new Vue({
		el:"#app",
		data:{
			gambar: "",
			provinsi: `<?=$user['provinsi']?>`,
			provinces:[], // data provinsi seindonesia
			kota: `<?=$user['kota']?>`,
			city:[], // data kota per provinsi
			kecamatan: `<?=$user['kecamatan']?>`,
			kelurahan: `<?=$user['kelurahan']?>`,
			kode_pos: `<?=$user['kode_pos']?>`,
			alamat: `<?=$user['alamat']?>`,
			no_tlpn: "<?=$user['no_tlpn']?>"
		},
		updated(){
			this.getCity(this.provinsi);
		},
		mounted(){
			this.getProvinsi();
			this.getGambar();
		},
		methods: {
			getGambar(){
				this.gambar = `<?=base_url('assets/images/pelanggan/')?>` + `<?=$user['gambar']?>`
			},
			async getProvinsi(){
				const province = await fetch(`<?=base_url("CurlRajaOngkir/province")?>`);
				const response = await province.json();
				this.provinces = response;
			},
			async getCity(){
				const city = await fetch(`<?=base_url("CurlRajaOngkir/city/")?>${this.provinsi}`);
				const response = await city.json();
				this.city = response;
			}
		},
		watch: {
			provinsi(){
				this.getCity();
			},

		},
		filters: {
			checkData(value){
				if(!value) return '';
				return value;
			}
		}
	})
</script>