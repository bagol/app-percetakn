<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <ul id="list"></ul>
  <script>
    const fetchApi = () => {
      return fetch('http://localhost/best/Produk/getKategori')
        .then(response => response.json())

    }
    fetchApi()
      .then(datas => {
        let html = '';
        let produks
        for (data in datas) {
          produks = datas[data].produk;
          if (produks.length != 0) {
            html += `
            <li>${datas[data].nama_kategori}
              <ul>`;
            for (produk in produks) {
              html += `<li>${produks[produk].nama_produk}</li>`;
            }
            html += `</ul>
            </li>
          `;
          } else {
            html += `<li>${datas[data].nama_kategori}</li>`;
          }
        }
        const list = document.querySelector('#list');
        list.innerHTML = html;
      })
  </script>
</body>

</html>