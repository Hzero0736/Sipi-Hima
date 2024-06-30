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
                    <form class="row g-3" method="post" action="<?= base_url() ?>/peminjaman/tambah">
                      <div class="col-12">
                        <label for="nama_peminjaman" class="form-label">Nama Barang</label>
                        <select class="form-control" id="kdbarang" name="kdbarang" required>
                          <option value="" disabled selected>Pilih Barang</option>
                          <?php foreach ($barang as $b) : ?>
                            <option value="<?= $b['kdbarang']; ?>"><?= $b['nama_barang']; ?> (<?= $b['kondisi_barang']; ?>)</option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="col-12">
                        <label for="idpelanggan" class="form-label">Nama Peminjam</label>
                        <select class="form-control" id="idpelanggan" name="idpelanggan" required>
                          <option value="" disabled selected>Pilih Peminjam</option>
                          <?php foreach ($pelanggan as $p) : ?>
                            <option value="<?= $p['idpelanggan']; ?>"><?= $p['nama_pelanggan']; ?> (<?= $p['delegasi']; ?>)</option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="col-12">
                        <label for="tanggal_peminjaman" class="form-label">Tanggal Peminjaman</label>
                        <input type="datetime-local" class="form-control" id="tanggal_peminjaman" name="tanggal_peminjaman" required>
                      </div>
                      <div class="col-12">
                        <label for="tanggal_pengembalian" class="form-label">Tanggal Pengembalian</label>
                        <input type="datetime-local" class="form-control" id="tanggal_pengembalian" name="tanggal_pengembalian" required>
                      </div>
                      <div class="col-12">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" class="form-select" aria-label="Pilih Kondisi" id="status" required>
                          <option selected disabled>Pilih Kondisi</option>
                          <?php foreach ($status as $status_barang) : ?>
                            <option value="<?= $status_barang ?>"><?= $status_barang ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div><!-- End Vertically centered Modal-->

            <button type="button" class="btn btn-secondary mt-3 mb-2" id="printButton">
              CETAK DATA
            </button>

            <!-- flash data -->
            <?php if (session()->getFlashdata('success')) : ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('success'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')) : ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('error'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php endif; ?>


            <!-- Table with stripped rows -->
            <table class="table datatable text-center">
              <thead>
                <tr>
                  <th class="text-center">NO</th>
                  <th class="text-center">Nama Peminjam</th>
                  <th class="text-center">Nama Barang</th>
                  <th class="text-center">Tanggal Pinjam</th>
                  <th class="text-center">Tanggal Kembali</th>
                  <th class="text-center">Status</th>
                  <th class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($peminjaman as $index => $p) : ?>
                  <tr>
                    <td class="text-center"><?= $index + 1; ?></td>
                    <td class="text-center"><?= $p['nama_pelanggan']; ?></td>
                    <td class="text-center"><?= $p['nama_barang']; ?></td>
                    <td class="text-center"><?= $p['tanggal_peminjaman']; ?></td>
                    <td class="text-center"><?= $p['tanggal_pengembalian']; ?></td>
                    <td class="text-center"><?= $p['status']; ?></td>
                    <td class="text-center">
                      <div class="btn-group" role="group">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#detailModal<?= $p['id_peminjaman']; ?>">
                          <i class="bi bi-eye"></i>
                        </button>
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?= $p['id_peminjaman']; ?>"><i class="bi bi-pencil"></i></button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $p['id_peminjaman']; ?>"><i class="bi bi-trash"></i></button>
                      </div>
                    </td>
                  </tr>

                  <!-- Modal Detail -->
                  <div class="modal fade" id="detailModal<?= $p['id_peminjaman']; ?>" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="detailModalLabel">Detail Peminjaman</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-12">
                              <strong>Status:</strong>
                              <p><?= $p['status']; ?></p>
                            </div>
                            <div class="col-12">
                              <strong>Nama Peminjam:</strong>
                              <p><?= $p['nama_pelanggan']; ?></p>
                            </div>
                            <div class="col-12">
                              <strong>Nama Barang:</strong>
                              <p><?= $p['nama_barang']; ?></p>
                            </div>
                            <div class="col-12">
                              <strong>Tanggal Peminjaman:</strong>
                              <p><?= $p['tanggal_peminjaman']; ?></p>
                            </div>
                            <div class="col-12">
                              <strong>Tanggal Pengembalian:</strong>
                              <p><?= $p['tanggal_pengembalian']; ?></p>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <!-- Modal Edit -->
          <?php foreach ($peminjaman as $p) : ?>
            <div class="modal fade" id="editModal<?= $p['id_peminjaman']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Peminjaman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form class="row g-3" method="post" action="<?= base_url() ?>/peminjaman/edit/<?= $p['id_peminjaman']; ?>">
                      <div class="col-12">
                        <label for="idpelanggan" class="form-label">Nama Peminjam</label>
                        <select class="form-control" id="idpelanggan" name="idpelanggan" required>
                          <?php foreach ($pelanggan as $pel) : ?>
                            <option value="<?= $pel['idpelanggan']; ?>" <?= ($pel['idpelanggan'] == $p['idpelanggan']) ? 'selected' : ''; ?>><?= $pel['nama_pelanggan']; ?> (<?= $pel['delegasi']; ?>)</option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="col-12">
                        <label for="kdbarang" class="form-label">Nama Barang</label>
                        <select class="form-control" id="kdbarang" name="kdbarang" required>
                          <?php foreach ($barang as $b) : ?>
                            <option value="<?= $b['kdbarang']; ?>" <?= ($b['kdbarang'] == $p['kdbarang']) ? 'selected' : ''; ?>><?= $b['nama_barang']; ?> (<?= $b['kondisi_barang']; ?>)</option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="col-12">
                        <label for="tanggal_peminjaman" class="form-label">Tanggal Peminjaman</label>
                        <input type="date" class="form-control" id="tanggal_peminjaman" name="tanggal_peminjaman" value="<?= $p['tanggal_peminjaman']; ?>" required>
                      </div>
                      <div class="col-12">
                        <label for="tanggal_pengembalian" class="form-label">Tanggal Pengembalian</label>
                        <input type="date" class="form-control" id="tanggal_pengembalian" name="tanggal_pengembalian" value="<?= $p['tanggal_pengembalian']; ?>" required>
                      </div>
                      <div class="col-12">
                        <label for="status" class="status">Status</label>
                        <select class="form-select" id="status" name="status">
                          <?php foreach ($status as $status_barang) : ?>
                            <option value="<?= $status_barang ?>" <?= ($status_barang == $p['status']) ? 'selected' : ''; ?>><?= $status_barang ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
          <!-- Modal Hapus -->
          <?php foreach ($peminjaman as $p) : ?>
            <div class="modal fade" id="deleteModal<?= $p['id_peminjaman']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Hapus Peminjaman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <p>Anda yakin ingin menghapus Data Peminjaman <b> <?= $p['nama_pelanggan']; ?></b> ini?</p>
                  </div>
                  <div class="modal-footer d-flex justify-content-center">
                    <form action="<?php echo base_url('peminjaman/hapus/' . $p['id_peminjaman']); ?>" method="post">
                      <input type="hidden" name="_method" value="DELETE">
                      <button type="submit" class="btn btn-primary">Yakin</button>
                    </form>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>

        </div>
      </div>
    </div>
  </section>

  <script>
    document.getElementById('printButton').addEventListener('click', function() {
      window.print();
    });
  </script>
</main>