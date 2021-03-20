const fetchApi = (url) => {
  return fetch(`${base_url + url}`).then((response) => response.json());
};

fetchApi("Produk/getKategori").then((datas) => {
  let html = "";
  let panjang = datas.length < 5 ? datas.length : 5;
  for (let i = 0; i < panjang; i++) {
    html += `<li><a href="#">${datas[i].nama_kategori}</a></li>`;
  }
  const list = document.querySelector("#footer-produk");
  list.innerHTML = html;
});
