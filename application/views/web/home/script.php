<script>
  fetchApi('Produk/getKategori')
    .then(datas => {
      console.log(datas)
      let html = '';
      let produks
      for (data in datas) {
        produks = datas[data].produk;
        console.log(produks)
        if (produks.length != 0) {
          html += `
          <div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordian" href="#${potong(datas[data].nama_kategori)}">
										<span class="badge pull-right"><i class="fa fa-plus"></i></span>
										${datas[data].nama_kategori}
									</a>
								</h4>
							</div>
							<div id="${potong(datas[data].nama_kategori)}" class="panel-collapse collapse">
								<div class="panel-body">
									<ul>`;
          for (produk in produks) {
            html += `<li><a href="${base_url+'produk/'+datas[data].kode_kategori}">${produks[produk].nama_produk}</a></li>`;
          }
          html += `</ul>
								</div>
							</div>
						</div>
          `;
        } else {
          html += `<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title"><a href="#${datas[data].nama_kategori}">${datas[data].nama_kategori}</a></h4>
							</div>
						</div>`;
        }
      }
      const list = document.querySelector('#accordian');
      list.innerHTML = html;
    })

  const potong = (stringVal) => {
    return stringVal.replace(/ /g, "")
  }
</script>