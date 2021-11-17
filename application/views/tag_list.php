<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Daftar Tags</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?= form_error('name', "<div class='alert alert-danger' role='alert'> ", "</div>"); ?>
                    <?= $this->session->flashdata('insert'); ?>
                    <?= $this->session->flashdata('delete'); ?>
                    <?= $this->session->flashdata('update'); ?>
                    <div class="card">
                        <div class="card-body">
                            <button style="margin-bottom: 10px; margin-right: 15px ;float: right;" type="button" class="btn btn-primary btn-round" data-toggle="modal" data-target="#exampleModal">
                                Tambah Tag Baru
                            </button>
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tag</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Tag</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($name as $n) { ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><?= $n->name; ?></td>
                                                <td>
                                                    <a href='<?= base_url('tags/edit_tag/'); ?><?= $n->id; ?>' class="badge badge-success" data-toggle="modal" data-target="#editTagModal_<?= $n->id; ?>">Edit</a>
                                                    <a href='<?= base_url('tags/hapus_tag/'); ?><?= $n->id; ?>' class="badge badge-danger" onclick="return confirm('Apakah anda yakin ingin menghapus tag ini ?')">X</a>
                                                </td>
                                            </tr>
                                        <?php $i++;
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Tag Baru</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= base_url('tags/tambah_tag'); ?>" method='post'>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name='name' placeholder="Nama Tag">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Tambah Tag</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php foreach ($name as $n) { ?>
                    <div class="modal fade" id="editTagModal_<?= $n->id ?>" tabindex="-1" role="dialog" aria-labelledby="editTagModal" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Tag</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="<?= base_url('tags/edit_tag/') . $n->id; ?>" method='post'>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name='name' placeholder="<?= $n->name ?>">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Edit Tag</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>