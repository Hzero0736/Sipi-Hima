<main id="main" class="main">

  <div class="pagetitle">
    <h1>Peminjaman Barang</h1>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">

            <button type="button" class="btn btn-primary mt-3 mb-2" data-bs-toggle="modal" data-bs-target="#verticalycentered">
              TAMBAH PEMINJAMAN
            </button>
            <div class="modal fade" id="verticalycentered" tabindex="-1">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">TAMBAH PEMINJAMAN</h5>
                  </div>
                  <div class="modal-body">
                    <form class="row g-3">
                      <div class="col-12">
                        <label for="inputNanme4" class="form-label">Nama Peminjam</label>
                        <input type="text" class="form-control" id="inputNanme4">
                      </div>
                      <div class="col-12">
                        <label for="inputAddress" class="form-label">Nama Barang</label>
                        <select class="form-control" id="kategori">
                          <option value="" disabled selected>Pilih Barang</option>
                          <option value="kategori1">Kursi</option>
                          <option value="kategori2">Meja</option>
                          <option value="kategori3">Proyektor</option>
                        </select>
                      </div>
                      <div class="col-12">
                        <label for="satuanBarang" class="form-label">Satuan</label>
                        <input type="number" class="form-control" id="satuanBarang" name="satuanBarang" required>
                      </div>
                      <div class="col-12">
                        <label for="waktuPinjam" class="form-label">Waktu Pinjam</label>
                        <input type="datetime-local" class="form-control" id="waktuPinjam" name="waktuPinjam" required>
                      </div>
                      <div class="col-12">
                        <label for="waktuKembali" class="form-label">Waktu Kembali</label>
                        <input type="datetime-local" class="form-control" id="waktuKembali" name="waktuKembali" required>
                      </div>
                      <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
                      </div>

                  </div>
                </div>
              </div>
              </form><!-- Vertical Form -->
            </div><!-- End Vertically centered Modal-->

            <button type="button" class="btn btn-primary mt-3 mb-2" id="printButton">
              CETAK
            </button>

            <!-- Table with stripped rows -->
            <table class="table datatable text-center">
              <thead>
                <tr>
                  <th class="text-center">NO</th>
                  <th class="text-center">
                    <b>N</b>ama Peminjam
                  </th>
                  <th class="text-center">Nama Barang</th>
                  <th class="text-center">Tanggal Pinjam</th>
                  <th class="text-center">Tanggal Kembali</th>
                  <th class="text-center">Status</th>
                  <th class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>01</td>
                  <td>Arta</td>
                  <td>kursi</td>
                  <td>10/07/2023</td>
                  <td>12/07/2023</td>
                  <td>prosess</td>
                  <td>
                    <!-- Button detail barang -->
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#detailModal"><i class="bi bi-eye"></i></button>

                    <!-- Modal -->
                    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="detailModalLabel">DETAIL PEMINJAMAN</h5>
                          </div>

                          <div class="modal-body">
                            <div class="row g-3">
                              <div class="col-12 d-flex justify-content-between">
                                <label class="form-label">Status:</label>
                                <p id="kodeBarang" class="mb-0 text-succes">Selesai</p>
                              </div>
                              <div class="col-12 d-flex justify-content-between">
                                <label class="form-label">Nama Pelanggan:</label>
                                <p id="namaBarang" class="mb-0">Artod</p>
                              </div>
                              <div class="col-12 d-flex justify-content-between">
                                <label class="form-label">Nama Barang:</label>
                                <p id="namaBarang" class="mb-0">meja</p>
                              </div>
                              <div class="col-12 d-flex justify-content-between">
                                <label class="form-label">Satuan:</label>
                                <p id="satuanBarang" class="mb-0">40</p>
                              </div>
                              <div class="col-12 d-flex justify-content-between">
                                <label class="form-label">Waktu Pinjam:</label>
                                <p id="satuanBarang" class="mb-0">10/07/2023</p>
                              </div>
                              <div class="col-12 d-flex justify-content-between">
                                <label class="form-label">Waktu Kembali:</label>
                                <p id="satuanBarang" class="mb-0">10/07/2023</p>
                              </div>

                            </div>
                          </div>
                          <div class="modal-footer text-center">
                            <button type="button" class="btn btn-danger mx-auto" data-bs-dismiss="modal">Kembali</button>
                          </div>
                        </div>
                      </div>
                    </div>
          </div>
          <!-- penutup nya -->

          <!-- Button edit barang -->
          <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal"><i class="bi bi-pencil"></i></button>

          <!-- Modal -->
          <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="editModalLabel">Edit Peminjaman</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form id="editForm">
                    <div class="col-12">
                      <label for="inputNanme4" class="form-label">Nama Peminjam</label>
                      <input type="text" class="form-control" id="inputNanme4">
                    </div>
                    <div class="col-12">
                      <label for="inputAddress" class="form-label">Nama Barang</label>
                      <select class="form-control" id="kategori">
                        <option value="" disabled selected>Pilih Barang</option>
                        <option value="kategori1">Kursi</option>
                        <option value="kategori2">Meja</option>
                        <option value="kategori3">Proyektor</option>
                      </select>
                    </div>
                    <div class="col-12">
                      <label for="satuanBarang" class="form-label">Satuan</label>
                      <input type="number" class="form-control" id="satuanBarang" name="satuanBarang" required>
                    </div>
                    <div class="col-12">
                      <label for="waktuPinjam" class="form-label">Waktu Pinjam</label>
                      <input type="datetime-local" class="form-control" id="waktuPinjam" name="waktuPinjam" required>
                    </div>
                    <div class="col-12">
                      <label for="waktuKembali" class="form-label">Waktu Kembali</label>
                      <input type="datetime-local" class="form-control" id="waktuKembali" name="waktuKembali" required>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                      <button type="submit" class="btn btn-primary">Tambah</button>
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- penutup nya -->

        <!-- Button hapus barang -->
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="bi bi-trash"></i></button>

        <!-- Delete Confirmation Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Hapus Peminjaman</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <p>Anda yakin ingin menghapus Data Peminjaman ini?</p>
              </div>
              <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn btn-primary" id="confirmDeleteButton">Yakin</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Penutup nya -->

      </td>
      </tr>
      <tr>
        <td>02</td>
        <td>Theodore Duran</td>
        <td>8971</td>
        <td>Dhanbad</td>

        <td>97%</td>
      </tr>
      <tr>
        <td>03</td>
        <td>Artra</td>
        <td>9958</td>
        <td>Curicó</td>

        <td>37%</td>
      </tr>
      <tr>
        <td>04</td>
        <td>Theodorerrr Duran</td>
        <td>8971</td>
        <td>Dhanbad</td>

        <td>97%</td>
      </tr>
      <tr>
        <td>05</td>
        <td>Artsfsfa</td>
        <td>9958</td>
        <td>Curicó</td>

        <td>37%</td>
      </tr>
      <tr>
        <td>06</td>
        <td>jhbkjaThescodor</td>
        <td>8971</td>
        <td>Dhanbad</td>
        <td>97%</td>
      </tr>
      <tr>
        <td>07</td>
        <td>mhjArta</td>
        <td>9958</td>
        <td>Curicó</td>

        <td>37%</td>
      </tr>
      <tr>
        <td>08</td>
        <td>bxvTheodore Duran</td>
        <td>8971</td>
        <td>Dhanbad</td>

        <td>97%</td>
      </tr>
      <tr>
        <td>09</td>
        <td>qdcArta</td>
        <td>9958</td>
        <td>Curicó</td>

        <td>37%</td>
      </tr>
      <tr>
        <td>10</td>
        <td>qweTheodore Duran</td>
        <td>8971</td>
        <td>Dhanbad</td>

        <td>97%</td>
      </tr>
      <tr>
        <td>11</td>
        <td>rtyArta</td>
        <td>9958</td>
        <td>Curicó</td>

        <td>37%</td>
      </tr>
      <tr>
        <td>12</td>
        <td>lavdsvTheodore Duran</td>
        <td>8971</td>
        <td>Dhanbad</td>
        <td>97%</td>
      </tr>
      <tr>
        <td>13</td>
        <td>svArta</td>
        <td>9958</td>
        <td>Curicó</td>
        <td>37%</td>
      </tr>
      <tr>
        <td>14</td>
        <td>bfTheodore Duran</td>
        <td>8971</td>
        <td>Dhanbad</td>

        <td>97%</td>
      </tr>

      </tbody>
      </table>
      <!-- End Table with stripped rows -->

    </div>
    </div>

    </div>
    </div>
  </section>

</main><!-- End #main -->