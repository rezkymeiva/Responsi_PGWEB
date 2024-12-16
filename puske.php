<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Leaflet JS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <link rel="stylesheet" href="plugin/leaflet-search-master/leaflet-search-master/dist/leaflet-search.min.css">
    <link rel="stylesheet"
        href="plugin/Leaflet.defaultextent-master/Leaflet.defaultextent-master/dist/leaflet.defaultextent.css">
    <style>
        html,
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: rgb(238, 238, 239);
            /* Soft light background */
            color: #333;
            /* Dark text for readability */
        }

        #map {
            width: 100%;
            height: calc(100vh - 56px);
            border-radius: 10px;
        }

        .navbar {
            background-color: #00b0ff;
            /* Light blue navbar */
            padding: 15px 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        .navbar-brand {
            color: #333 !important;
            /* White text for brand */
            font-size: 1.5rem;
        }

        .navbar-nav .nav-link {
            color: #333 !important;
            font-weight: 500;
        }

        .navbar-nav .nav-link:hover {
            color:rgb(155, 104, 87) !important;
            /* Yellow hover effect */
        }

        .btn-primary,
        .btn-success {
            font-size: 1.1rem;
            padding: 10px 20px;
            border-radius: 5px;
            background-color:rgb(100, 162, 229);
            /* Primary blue button */
            border: none;
        }

        .btn-primary:hover,
        .btn-success:hover {
            opacity: 0.9;
            transform: scale(1.05);
            transition: all 0.3s ease;
        }

        .modal-content {
            border-radius: 8px;
            border: none;
            background-color: #ffffff;
            /* White background for the modal */
        }

        .modal-header {
            background-color:rgb(121, 174, 199);
            /* Light blue modal header */
            color: #fff;
        }

        .modal-footer {
            border-top: none;
        }

        .modal-title {
            font-size: 1.3rem;
        }

        .legend-title {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
            /* Dark color for legend title */
        }

        .legend-item {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
        }

        .legend-icon-container {
            margin-right: 10px;
        }

        .legend-icon {
            display: inline-block;
            width: 20px;
            height: 20px;
            background-size: contain;
        }

        .legend-label {
            font-size: 14px;
            color: #333;
            /* Dark color for legend label */
        }

        .info.legend {
            background: rgba(255, 255, 255, 0.8);
            /* Light info box */
            color: #333;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
            font-family: Arial, sans-serif;
        }

        .navbar-toggler-icon {
            background-color: #fff;
            /* White navbar toggler icon */
        }

        .search-input {
            width: 250px;
            border-radius: 5px;
            padding: 8px;
            border: 1px solid #ddd;
            background-color: #f4f4f9;
            /* Light input field */
            color: #333;
            /* Dark text inside input */
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><i class="fa-solid fa-map-location-dot"></i> PERSEBARAN PUSKESMAS KOTA BANDUNG</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.bandung.go.id//" target="_blank"><i class="fa-solid fa-layer-group"></i> Sumber Data</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#infoModal"> <i class="fa-solid fa-circle-info"></i> Info</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Map Container -->
    <div id="map"></div>

    <!-- Tombol Kembali ke Beranda -->
    <div class="container mt-3">
        <a href="awal.php" class="btn btn-primary">Kembali ke Beranda</a>
    </div>

    <!-- Daftar Modal -->
    <div class="modal fade" id="daftarModal" tabindex="-1" aria-labelledby="daftarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="daftarModalLabel">Daftar Pemeriksaan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Anda akan diarahkan ke halaman untuk mengisi data pendaftaran pemeriksaan.</p>
                    <a href="input.php" class="btn btn-primary w-100">Masuk ke Halaman Pendaftaran Pemeriksaan</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Info Modal -->
    <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="infoModalLabel">Info Pembuat</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <tr>
                            <th>Nama</th>
                            <td>Rezky Meiva Anisa</td>
                        </tr>
                        <tr>
                            <th>NIM</th>
                            <td>23/513284/SV/22209</td>
                        </tr>
                        <tr>
                            <th>Kelas</th>
                            <td>A</td>
                        </tr>
                        <tr>
                            <th>GitHub</th>
                            <td><a href="https://github.com/rezkymeiva" target="_blank" rel="noopener noreferrer">
                                    https://github.com/rezkymeiva </a></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Feature Modal -->
    <div class="modal fade" id="featureModal" tabindex="-1" aria-labelledby="featureModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="featureModalTitle"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-body" id="featureModalBody">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <script src="plugin/leaflet-search-master/leaflet-search-master/dist/leaflet-search.min.js"></script>

    <script src="plugin\Leaflet.defaultextent-master\Leaflet.defaultextent-master\dist\leaflet.defaultextent.js"></script>

    <script>
        // Inisialisasi peta
        var map = L.map("map").setView([-6.91432771774103, 107.60812059368078], 10);

        // Tile Layer Base Map
        var basemap = L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        });

        // Menambahkan basemap ke dalam peta
        basemap.addTo(map);

        // GeoJSON Point Sarana Prasarana
        var fasilitas_kesehatan = L.geoJSON(null, {
            // Style
            pointToLayer: function(feature, latlng) {
                return L.marker(latlng, {
                    icon: L.icon({
                        iconUrl: "icon/titik_puske.png", // icon marker
                        iconSize: [28, 28], // ukuran icon
                        iconAnchor: [24, 48], // posisi icon terhadap titik (point)
                        popupAnchor: [0, -48], // posisi popup terhadap icon
                        tooltipAnchor: [-16, -30], // posisi tooltip terhadap icon
                    }),
                });
            },

            onEachFeature: function(feature, layer) {
                // Variable popup content
                var popup_content = "Nama: " + feature.properties.NAMA + "<br>" +
                    "Koordinat: " + feature.geometry.coordinates[1] + ", " + feature.geometry.coordinates[0] + "<br>" +
                    '<button class="btn btn-primary mt-3 daftarPemeriksaanBtn">Daftar Pemeriksaan</button>' +
                    '<a href="tabel_data.php" class="btn btn-success mt-3 w-100">Lihat Tabel Data</a>'; // Added button and link

                layer.on({
                    click: function(e) {
                        // Menampilkan feature modal
                        $("#featureModalTitle").html("Fasilitas Kesehatan");
                        $("#featureModalBody").html(popup_content);
                        $("#featureModal").modal("show");
                    },

                    mouseover: function(e) {
                        layer.bindTooltip(feature.properties.NAMA, {
                            direction: "top",
                            sticky: true,
                        });
                    },
                });

                // Event listener untuk tombol "Daftar Pemeriksaan"
                $(document).on('click', '.daftarPemeriksaanBtn', function() {
                    // Tutup modal feature
                    $("#featureModal").modal("hide");

                    // Pindah ke modal daftar pendaftaran
                    $("#daftarModal").modal("show");

                    // Logika untuk menutup tooltip
                    layer.unbindTooltip(); // Hapus tooltip dari layer terkait
                });
            }

        });
        $.getJSON("data/puskesmas_bandung.geojson", function(data) {
            fasilitas_kesehatan.addData(data); // Menambahkan data ke dalam GeoJSON Point Sarana Prasarana
            map.addLayer(fasilitas_kesehatan); // Menambahkan GeoJSON Point Sarana Prasarana ke dalam peta
            //map.fitBounds(sarana_prasarana.getBounds());
        });

        // GeoJSON Polyline Jalan
        map.createPane('paneJalan');
        map.getPane("paneJalan").style.zIndex = 401;
        var jalan = L.geoJSON(null, {
            pane: 'paneJalan',
            // Style
            style: function(feature) {
                return {
                    color: "rgba(255, 99, 71, 0.8)", // Soft red with opacity
                    opacity: 1,
                    weight: 2,
                };
            },
            // onEachFeature
            onEachFeature: function(feature, layer) {
                // variable popup content
                var popup_content = "Fungsi: " + feature.properties.REMARK + "<br>";

                layer.on({
                    click: function(e) {
                        //jalan.bindPopup(popup_content);

                        //Menampilkan feature modal
                        $("#featureModalTitle").html("Jalan");
                        $("#featureModalBody").html(popup_content);
                        $("#featureModal").modal("show");

                    },
                    mouseover: function(e) {
                        jalan.bindTooltip(feature.properties.REMARK, {
                            direction: "auto",
                            sticky: true,
                        });
                    },
                });
            },

        });
        $.getJSON("data/jalan.geojson", function(data) {
            jalan.addData(data); // Menambahkan data ke dalam GeoJSON Polyline Jalan
            map.addLayer(jalan); // Menambahkan GeoJSON Polyline Jalan ke dalam peta
            map.fitBounds(jalan.getBounds());
        });

        var symbologyCategorized = {
            "Tinggi": "#2c7fb8",
            "Sedang": "#7fcdbb",
            "Rendah": "#edf8b1"
        };
        // GeoJSON Polygon admin desa
        map.createPane('panebatas_admin');
        map.getPane("panebatas_admin").style.zIndex = 301;
        var batas_admin = L.geoJSON(null, {
            pane: 'panebatas_admin',
            // Style

            style: function(feature) {
                return {
                    color: "gray",
                    opacity: 1,
                    weight: 1,
                    fillColor: symbologyCategorized[feature.properties.KELAS],
                    fillOpacity: 0.8,
                };
            },

            // onEachFeature
            onEachFeature: function(feature, layer) {
                // variable popup content
                var popup_content = "Kecamatan " + feature.properties.WADMKC + "<br>" +
                    "Kelurahan" + feature.properties.WADMKK + "<br>" +
                    "Provinsi:" + feature.properties.WADMPR;

                layer.on({
                    click: function(e) {
                        //jumlah_penduduk.bindPopup(popup_content);

                        //Menampilkan feature modal
                        $("#featureModalTitle").html("informasi batas admin");
                        $("#featureModalBody").html(popup_content);
                        $("#featureModal").modal("show");

                    },
                    mouseover: function(e) {
                        batas_admin.bindTooltip(feature.properties.WADMKK, {
                            direction: "auto",
                            sticky: true,
                        });
                    },
                });
            },
            // filter: function (feature, layer) {
            //    return feature.properties.KELAS == 'Rendah';
            // },

        });
        $.getJSON("data/admindesa.geojson", function(data) {
            batas_admin.addData(data); // Menambahkan data ke dalam GeoJSON Polygon Jumlah Penduduk
            map.addLayer(batas_admin); // Menambahkan GeoJSON Polygon Jumlah Penduduk ke dalam peta
        });

        // Control Layer
        var baseMaps = {
            "Basemap": basemap,
        };

        var overlayMaps = {
            "Fasilitas Kesehatan": fasilitas_kesehatan,
            "Jalan": jalan,
            "Administrasi Desa": batas_admin,
        };

        var controllayer = L.control.layers(baseMaps, overlayMaps);
        controllayer.addTo(map);

        // Add Legend for Layers
        var legend = L.control({
            position: 'bottomright' // Position changed to 'bottomright'
        });

        legend.onAdd = function(map) {
            var div = L.DomUtil.create('div', 'info legend');
            var title = '<h4 class="legend-title">Legenda</h4>';
            var grades = {
                "Fasilitas Kesehatan": '<i class="legend-icon" style="background: url(icon/home_marker.png); width: 20px; height: 20px; background-size: contain;"></i>',
                "Jalan": '<i class="legend-icon" style="background: red; width: 20px; height: 5px;"></i>',
                "Administrasi Desa": '<i class="legend-icon" style="background: gray; width: 20px; height: 20px; border-radius: 5px;"></i>'
            };
            var labels = [];

            // Loop through the grades and generate labels
            for (var key in grades) {
                labels.push(
                    '<div class="legend-item"><span class="legend-icon-container">' + grades[key] + '</span><span class="legend-label">' + key + '</span></div>'
                );
            }

            // Combine the title and labels into the legend
            div.innerHTML = title + labels.join('');
            return div;
        };

        // Add the legend to the map
        legend.addTo(map);

        // CSS for better styling
        var style = document.createElement('style');
        style.innerHTML = `
    .info.legend {
        background: rgba(255, 255, 255, 0.8);
        padding: 10px;
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
        font-family: Arial, sans-serif;
    }
    .legend-title {
        font-size: 16px;
        font-weight: bold;
        margin-bottom: 10px;
        color: #333;
    }
    .legend-item {
        display: flex;
        align-items: center;
        margin-bottom: 5px;
    }
    .legend-icon-container {
        margin-right: 10px;
    }
    .legend-icon {
        display: inline-block;
        width: 20px;
        height: 20px;
        background-size: contain;
    }
    .legend-label {
        font-size: 14px;
        color: #333;
    }
`;
        document.head.appendChild(style);

        //Back to Default Extent
        L.control.defaultExtent()
            .addTo(map);

        // Menambahkan kontrol pencarian untuk fasilitas kesehatan
        var searchControl = new L.Control.Search({
            layer: fasilitas_kesehatan, // Menargetkan layer fasilitas_kesehatan
            propertyName: 'NAMA', // Mencari berdasarkan properti 'NAMA'
            marker: false, // Tidak menampilkan marker default saat pencarian
            moveToLocation: function(latlng, title, map) {
                map.setView(latlng, 15); // Memusatkan peta pada titik yang dicari dengan zoom level 15
            },
            textPlaceholder: 'Cari Fasilitas Kesehatan...', // Placeholder untuk kolom pencarian
            zoom: 15, // Zoom level saat peta dipusatkan
            position: 'topright', // Posisi pencarian di pojok kanan atas
        });

        // Event listener untuk ketika pencarian ditemukan
        searchControl.on('search:locationfound', function(e) {
            // Mengubah warna dan bentuk layer menjadi kustom
            e.layer.setStyle({
                fillColor: 'yellow', // Mengubah warna layer menjadi kuning
                color: 'black', // Menambahkan border hitam
                weight: 2 // Menambahkan ketebalan border
            });

            // Menampilkan popup jika ada
            if (e.layer._popup) {
                e.layer.openPopup(); // Menampilkan popup jika ada
            }

        }).on('search:collapsed', function(e) {
            // Jika pencarian dibatalkan, mengembalikan gaya layer ke keadaan semula
            fasilitas_kesehatan.eachLayer(function(layer) {
                fasilitas_kesehatan.resetStyle(layer); // Reset style layer
            });
        });

        // Menambahkan kontrol pencarian ke peta
        map.addControl(searchControl);

        L.Control.Watermark = L.Control.extend({
            onAdd: function(map) {
                var img = L.DomUtil.create('img');

                img.src = 'icon/logo_vokasi.png';
                img.style.width = '300px';

                return img;
            },

            onRemove: function(map) {
                // Nothing to do here
            }
        });

        L.control.watermark = function(opts) {
            return new L.Control.Watermark(opts);
        }

        L.control.watermark({
            position: 'bottomleft'
        }).addTo(map);
    </script>
</body>

</html>