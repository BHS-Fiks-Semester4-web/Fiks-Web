<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semua Produk</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            scroll-behavior: smooth;
            background-color: #ecd3d3;
        }

        header {
            position: fixed;
            background: linear-gradient(to right, #1f000d, #d61968);
            z-index: 10000;
            width: 100%;
            top: 0;
        }

        .container {
            padding: 10px 80px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo img {
            width: auto;
            height: 55px;
        }

        .nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .nav ul li {
            display: inline-block;
            margin-right: 35px;
        }

        .nav ul li a {
            text-decoration: none;
            color: #fff;
            font-size: 20px;
        }

        h1 {
            margin-top: 100px;
            text-align: center;
        }

        .search {
            padding: 5px 10px;
            display: flex;
            align-items: center;
        }

        .search_form_nav {
            position: relative;
        }

        .search input[type="text"] {
            border-radius: 50px;
            border: none;
            padding: 10px 40px 10px 20px;
            margin-right: 7px;
            outline: none;
            font-size: 16px;
            width: 200px;
            text-align: left;
        }

        .btn_search_img_nav {
            background-color: #880039;
            border: none;
            border-radius: 50%;
            padding: 5px;
            cursor: pointer;
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            width: 35px;
            height: 35px;
        }

        .btn_search_img_nav:hover {
            background-color: #c71d64;
        }

        .btn_search_img_nav img {
            width: 20px;
            height: 20px;
        }

        section {
            height: 100vh;
        }

        .containerr {
            margin-top: 10px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .card {
            border: 1px solid #ddd;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 200px;
            overflow: hidden;
            text-align: center;
            padding: 10px;
            background-color: #fff;
            display: grid;
            grid-template-rows: 150px 1fr;
            gap: 10px;
        }

        .card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .card input {
            width: 100%;
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .detail {
            background-color: #ecd3d3;
            border: 4px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            text-decoration: none;
        }

     /* Style untuk modal */
/* Style untuk modal */
.modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.7); /* Warna latar belakang semi-transparan */
}

/* Konten modal */
.modal-content {
    background-color: #fefefe;
    margin: 10% auto;
    padding: 20px;
    border: 1px solid #888;
    border-radius: 10px;
    max-width: 80%; /* Lebar maksimum konten modal */
    overflow: auto; /* Mengaktifkan gulir jika konten melebihi ukuran modal */
    width: 400px; /* Lebar tetap untuk modal */
    height: 400px;
    max-width: 90%; /* Lebar maksimum, jika layar lebih kecil */
    max-height: 80%; /* Tinggi maksimum untuk konten, agar dapat digulir jika perlu */
    overflow-y: auto;
    align-items : center;
    
}

/* Gaya untuk elemen dalam modal */
.modal-content p,
.modal-content img {
    max-width: 100%; /* Lebar maksimum untuk paragraf dan gambar */
    height: auto;
}
/* Teks penutup modal */
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

/* Style untuk bagian atas modal */
.atas {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}
.atas p {
    font-size: 24px;
}

/* Style untuk gambar produk */
#modalImg {
    max-width: 100%; /* Lebar maksimum gambar */
    height: auto;
    margin-bottom: 20px;
    border-radius: 5px;
}

/* Style untuk bagian tengah modal */
.tengah {
    text-align: center;
}

/* Style untuk harga produk */
#modalHarga {
    font-weight: bold;
    font-size: 18px;
    align-items : center;
    
}

/* Animasi untuk tampilan modal */
.modal-content {
    animation: zoom 0.6s;
}

@keyframes zoom {
    from {
        transform: scale(0);
    }
    to {
        transform: scale(1);
    }
}

    
    
/* 
        .close {
            position: absolute;
            top: 10px;
            right: 20px;
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
        }
/*  */
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <a href="#home"><img src="/image/logo1x2.png" alt="Logo Akhwat Computer Jember"></a>
            </div>
            <div class="nav">
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('allproduct') }}">Produk</a></li>
                    <li><a href="{{ route('contact') }}">Kontak</a></li>
                </ul>
            </div>
            <div class="search">
                <form action="{{ route('search.index') }}" method="GET" class="search_form_nav">
                    <div class="search_input_container">
                        <input type="text" name="query" placeholder="Telusuri...">
                        <button type="submit" class="btn_search_img_nav">
                            <img src="/image/search.png">
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </header>

    <section id="allproduct">
        <h1>Semua Produk</h1>
        <div class="containerr">
            @foreach($barangs as $result)
                <div class="card" data-id="{{ $result->id }}">
                    <img src="{{ 'data:image/jpeg;base64,' . base64_encode($result->foto_barang) }}" alt="{{ $result->nama_barang }}">
                    <input type="text" value="Nama Barang: {{ $result->nama_barang }}" readonly>
                    <input type="text" value="Stok Barang: {{ $result->stok_barang }}" readonly>
                    <input type="text" value="Harga: Rp{{ number_format($result->harga_sebelum_diskon_barang, 0, ',', '.') }}" readonly>
                    <a class="detail" href="#">Lihat Detail</a>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Popup Modal HTML -->
    <div id="productDetailModal" class="modal">
        <div class="modal-content">
            <div class="atas">
                <p id="modalNamaBarang"></p>
                <span class="close">&times;</span>
            </div>
            <div class="tengah">
                  <img id="modalImg" src="data:image/jpeg;base64," alt="Gambar Produk" />
                    
                  <p id="modalDeskripsi"></p>
            </div>
            <div class="harga">
                <p id="modalHarga"></p>
            </div>
            
        </div>
    </div>

    <script>
        // document.addEventListener('DOMContentLoaded', (event) => {
            const modal = document.getElementById("productDetailModal");
            const modalImg = document.getElementById("modalImg");
            const modalNamaBarang = document.getElementById("modalNamaBarang");
            const modalDeskripsi = document.getElementById("modalDeskripsi");
            const modalHarga = document.getElementById("modalHarga");
            const closeModal = document.getElementsByClassName("close")[0];
            function formatRupiah(number) {
             return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(number);
                }
            document.querySelectorAll('.detail').forEach(button => {
                button.addEventListener('click', function (event) {
                    event.preventDefault();
                    const card = this.closest('.card');
                    const productId = card.getAttribute('data-id');

                    fetch(`/product-detail/${productId}`)
                        .then(response => response.json())
                        .then(data => {
                            // <img src="{{ 'data:image/jpeg;base64,' . base64_encode($result->foto_barang) }}" alt="{{ $result->nama_barang }}">
                            modalImg.src = "data:image/jpeg;base64," + data.foto_barang; // data.foto_barang berisi string base64 dari gambar

                            modalNamaBarang.innerHTML = `${data.nama_barang}`;
                            modalDeskripsi.innerHTML = `<h1>Spesifikasi:</h1></b> <br> ${data.deskripsi_barang}`;
                            modalHarga.innerHTML = `Harga: ${formatRupiah(data.harga_sebelum_diskon_barang)}`;
                            modal.style.display = "flex";
                        })
                        .catch(error => {
                            console.error('Error fetching product details:', error);
                        });
                });
            });

            closeModal.onclick = function () {
                modal.style.display = "none";
            }

            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        // });
    </script>
</body>
</html>
