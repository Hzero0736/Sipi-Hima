  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Penitipan Barang</h1>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">

              <button type="button" class="btn btn-primary mt-3 mb-2" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                TAMBAH PENITIPAN
              </button>
              <div class="modal fade" id="verticalycentered" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">TAMBAH PENITIPAN</h5>
                    </div>
                    <div class="modal-body">
                      <form class="row g-3">
                        <div class="col-12">
                          <label for="inputNamaPenitip" class="form-label">Nama Penitip</label>
                          <input type="text" class="form-control" id="inputNamaPenitip">
                        </div>
                        <div class="col-12">
                          <label for="inputNamaBarang" class="form-label">Nama Barang</label>
                          <input type="text" class="form-control" id="inputNamaBarang">
                        </div>
                        <div class="col-12">
                          <label for="satuanBarang" class="form-label">Satuan</label>
                          <input type="number" class="form-control" id="satuanBarang" name="satuanBarang" required>
                        </div>
                        <div class="col-12">
                          <label for="deskripsiBarang" class="form-label">Deskripsi</label>
                          <textarea class="form-control" id="deskripsiBarang" name="deskripsiBarang" rows="3" required></textarea>
                        </div>
                        <div class="col-12">
                          <label for="inputNamaBarang" class="form-label">No Hp</label>
                          <input type="number" class="form-control" id="inputNamaBarang">
                        </div>
                        <div class="col-12">
                          <label for="waktuTitip" class="form-label">Waktu Titip</label>
                          <input type="datetime-local" class="form-control" id="waktuTitip" name="waktuTitip" required>
                        </div>
                        <div class="col-12">
                          <label for="waktuKembali" class="form-label">Waktu Kembali</label>
                          <input type="datetime-local" class="form-control" id="waktuKembali" name="waktuKembali" required>
                        </div>
                        <div class="col-12">
                          <label for="fotoBarang" class="form-label">Foto</label>
                          <input type="file" class="form-control" id="fotoBarang" name="fotoBarang" accept="image/*" required>
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
                    <th class="text-center">
                      <b>N</b>ama Penitip
                    </th>
                    <th class="text-center">Nama Barang</th>
                    <th class="text-center">satuan</th>
                    <th class="text-center">deskripsi</th>
                    <th class="text-center">No.Hp</th>
                    <th class="text-center">Tanggal Pinjam</th>
                    <th class="text-center">Tanggal Kembali</th>
                    <th class="text-center">Foto</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>arta</td>
                    <td>buku</td>
                    <td>01</td>
                    <td>buku deadnote warna hitam ni99a buluk robek robek</td>
                    <td>0831439780</td>
                    <td>10/07/2023</td>
                    <td>12/07/2023</td>
                    <td><img src="assets/img/card.jpg" alt="Kursi" style="width: 100px; height: auto;"></td>
                    <td>Selesai</td>
                    <td>
                      <!-- Button detail barang -->
                      <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#detailModal"><i class="bi bi-eye"></i></button>

                      <!-- Modal -->
                      <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="detailModalLabel">DETAIL PENITIPAN</h5>
                            </div>

                            <div class="modal-body">
                              <div class="row g-3">
                                <div class="col-12 d-flex justify-content-between align-items-center">
                                  <label class="form-label mb-0">Status:</label>
                                  <p id="statusBarang" class="mb-0 text-success">Selesai</p>
                                </div>
                                <div class="col-12 d-flex justify-content-between align-items-center">
                                  <label class="form-label mb-0">Nama Penitip:</label>
                                  <p id="namaPenitip" class="mb-0">Artod</p>
                                </div>
                                <div class="col-12 d-flex justify-content-between align-items-center">
                                  <label class="form-label mb-0">Nama Barang:</label>
                                  <p id="namaBarang" class="mb-0">Meja</p>
                                </div>
                                <div class="col-12 d-flex justify-content-between align-items-center">
                                  <label class="form-label mb-0">Satuan:</label>
                                  <p id="satuanBarang" class="mb-0">40</p>
                                </div>
                                <div class="col-12 d-flex justify-content-between align-items-center">
                                  <label class="form-label mb-0">Deskripsi:</label>
                                  <p id="deskripsiBarang" class="mb-0">Buku Deadnote warna hitam ni99a buluk robek robek</p>
                                </div>
                                <div class="col-12 d-flex justify-content-between align-items-center">
                                  <label class="form-label mb-0">No Hp:</label>
                                  <p id="deskripsiBarang" class="mb-0">0831439780</p>
                                </div>
                                <div class="col-12 d-flex justify-content-between align-items-center">
                                  <label class="form-label mb-0">Waktu Pinjam:</label>
                                  <p id="waktuPinjam" class="mb-0">10/07/2023</p>
                                </div>
                                <div class="col-12 d-flex justify-content-between align-items-center">
                                  <label class="form-label mb-0">Waktu Kembali:</label>
                                  <p id="waktuKembali" class="mb-0">10/07/2023</p>
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
                    <h5 class="modal-title" id="editModalLabel">Edit Penitipan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form id="editForm">
                      <div class="col-12">
                        <label for="inputNamaPenitip" class="form-label">Nama Penitip</label>
                        <input type="text" class="form-control" id="inputNamaPenitip">
                      </div>
                      <div class="col-12">
                        <label for="inputNamaBarang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="inputNamaBarang">
                      </div>
                      <div class="col-12">
                        <label for="satuanBarang" class="form-label">Satuan</label>
                        <input type="number" class="form-control" id="satuanBarang" name="satuanBarang" required>
                      </div>
                      <div class="col-12">
                        <label for="deskripsiBarang" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsiBarang" name="deskripsiBarang" rows="3" required></textarea>
                      </div>
                      <div class="col-12">
                        <label for="inputNamaBarang" class="form-label">No Hp</label>
                        <input type="number" class="form-control" id="inputNamaBarang">
                      </div>
                      <div class="col-12">
                        <label for="waktuTitip" class="form-label">Waktu Titip</label>
                        <input type="datetime-local" class="form-control" id="waktuTitip" name="waktuTitip" required>
                      </div>
                      <div class="col-12">
                        <label for="waktuKembali" class="form-label">Waktu Kembali</label>
                        <input type="datetime-local" class="form-control" id="waktuKembali" name="waktuKembali" required>
                      </div>
                      <div class="col-12">
                        <label for="fotoBarang" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="fotoBarang" name="fotoBarang" accept="image/*" required>
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
                  <h5 class="modal-title" id="deleteModalLabel">Hapus Penitipan</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <p>Anda yakin ingin menghapus Data penitipan ini?</p>
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