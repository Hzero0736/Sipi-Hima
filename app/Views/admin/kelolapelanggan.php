<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Pelanggan</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">

                        <button type="button" class="btn btn-primary mt-3 mb-2" data-bs-toggle="modal" data-bs-target="#verticalycentered">
                            Tambah Pelanggan
                        </button>

                        <!-- Flash Data -->
                        <?php if (session()->getFlashdata('success')) : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= session()->getFlashdata('success') ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <?php if (session()->getFlashdata('error')) : ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= session()->getFlashdata('error') ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <div class="modal fade" id="verticalycentered" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Tambah Pelanggan</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form class="row g-3" action="/pelanggan/tambah" method="post">
                                            <div class="col-12">
                                                <label for="inputNanme4" class="form-label">Nama Pelanggan</label>
                                                <input type="text" class="form-control" id="inputNanme4" name="nama_pelanggan" required>
                                            </div>
                                            <div class="col-12">
                                                <label for="idpelanggan" class="form-label">NIM/NIP</label>
                                                <input type="text" class="form-control" id="idpelanggan" name="idpelanggan" required>
                                            </div>
                                            <div class="col-12">
                                                <label for="no_kontak" class="form-label">No Hp</label>
                                                <input type="number" class="form-control" id="no_kontak" name="no_kontak" required>
                                            </div>
                                            <div class="col-12">
                                                <label for="delegasi" class="form-label">Delegasi</label>
                                                <input type="text" class="form-control" id="delegasi" name="delegasi" required>
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


                        <!-- Table with stripped rows -->
                        <table id="datatable" class="table datatable text-center">
                            <thead>
                                <tr>
                                    <th class="text-center">NIP/NIM</th>
                                    <th class="text-center">Nama Pelanggan
                                    </th>
                                    <th class="text-center">No Hp</th>
                                    <th class="text-center">Delegasi</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pelanggan as $row) : ?>
                                    <tr>
                                        <td><?= $row['idpelanggan']; ?></td>
                                        <td><?= $row['nama_pelanggan']; ?></td>
                                        <td><?= $row['no_kontak']; ?></td>
                                        <td><?= $row['delegasi']; ?></td>
                                        <td>
                                            <!-- Button detail barang -->
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#detailModal<?= $row['idpelanggan']; ?>"><i class="bi bi-eye"></i></button>
                                            <!-- Button edit barang -->
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?= $row['idpelanggan']; ?>"><i class="bi bi-pencil"></i></button>
                                            <!-- Button hapus barang -->
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $row['idpelanggan']; ?>"><i class="bi bi-trash"></i></button>
                                        </td>
                                    </tr>
                                    <!-- Modal detail barang -->
                                    <div class="modal fade" id="detailModal<?= $row['idpelanggan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Detail Pelanggan</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row g-3">
                                                        <div class="col-12 d-flex justify-content-between">
                                                            <label class="form-label">Nama Pelanggan:</label>
                                                            <p id="namaBarang" class="mb-0"><?= $row['nama_pelanggan']; ?></p>
                                                        </div>
                                                        <div class="col-12 d-flex justify-content-between">
                                                            <label class="form-label">NIM/NIP:</label>
                                                            <p id="namaBarang" class="mb-0"><?= $row['idpelanggan']; ?></p>
                                                        </div>
                                                        <div class="col-12 d-flex justify-content-between">
                                                            <label class="form-label">No Hp:</label>
                                                            <p id="satuanBarang" class="mb-0"><?= $row['no_kontak']; ?></p>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="modal-footer text-center">
                                                    <button type="button" class="btn btn-danger mx-auto" data-bs-dismiss="modal">Kembali</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal Hapus Pelanggan -->
                                    <div class="modal fade" id="deleteModal<?= $row['idpelanggan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Pelanggan</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="text-center">Apakah anda yakin ingin menghapus pelanggan <b><?= $row['nama_pelanggan']; ?></b>?</p>
                                                    <form action="/pelanggan/hapus/<?= $row['idpelanggan']; ?>" method="post">
                                                        <?= csrf_field() ?>
                                                        <input type="hidden" name="idpelanggan" value="<?= $row['idpelanggan']; ?>">
                                                        <div class="modal-footer text-center">
                                                            <button type="button" class="btn btn-danger mx-auto" data-bs-dismiss="modal">Kembali</button>
                                                            <button type="submit" class="btn btn-success mx-auto">Hapus</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal Hapus Pelanggan -->

                                    <?php endforeach ?>
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                        <!-- Modal Edit Pelanggan -->
                        <!-- Modal Edit Pelanggan -->
                        <?php foreach ($pelanggan as $row) : ?>
                            <div class="modal fade" id="editModal<?= $row['idpelanggan']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel">Edit Pelanggan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="editForm" action="<?php echo base_url('pelanggan/edit/' . $row['idpelanggan']); ?>" method="post">
                                                <?= csrf_field() ?>
                                                <div class="col-12">
                                                    <label for="inputNanme4" class="form-label">Nama Pelanggan</label>
                                                    <input type="text" class="form-control" id="inputNanme4" name="nama_pelanggan" value="<?= $row['nama_pelanggan']; ?>">
                                                </div>
                                                <div class="col-12">
                                                    <label for="inputNim4" class="form-label">NIM/NIP</label>
                                                    <input type="text" class="form-control" id="inputNim4" name="idpelanggan" value="<?= $row['idpelanggan']; ?>" required readonly>
                                                </div>
                                                <div class="col-12">
                                                    <label for="satuanBarang" class="form-label">No Hp</label>
                                                    <input type="number" class="form-control" id="satuanBarang" name="no_kontak" value="<?= $row['no_kontak']; ?>" required>
                                                </div>
                                                <div class="col-12">
                                                    <label for="inputNanme5" class="form-label">Delegasi</label>
                                                    <input type="text" class="form-control" id="inputNanme5" name="delegasi" value="<?= $row['delegasi']; ?>">
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
                        <?php endforeach ?>


                    </div>
                </div>

            </div>
        </div>

    </section>

</main><!-- End #main -->