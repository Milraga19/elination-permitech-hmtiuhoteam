<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Daftar Topik Diskusi</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?= form_error('name', "<div class='alert alert-danger' role='alert'> ", "</div>"); ?>
                    <?= $this->session->flashdata('insert'); ?>
                    <?= $this->session->flashdata('delete'); ?>
                    <div class="card">
                        <div class="card-body">
                            <button style="margin-bottom: 10px; margin-right: 15px ;float: right;" type="button" class="btn btn-primary btn-round" data-toggle="modal" data-target="#exampleModal">
                                Tambah Topik Baru
                            </button>
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Judul Topik</th>
                                            <th>Tag</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Judul Topik</th>
                                            <th>Tag</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($rows as $r) { ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><?= $r->user_name; ?></td>
                                                <td><?= $r->discuss_topic; ?></td>
                                                <td><?= $r->name; ?></td>
                                                <?php
                                                if ($r->status == 0) {
                                                    echo "<td><span class='badge badge-danger'>Not Solved</span></td>";
                                                } else {
                                                    echo "<td><span class='badge badge-primary'>Solved</span></td>";
                                                }
                                                ?>
                                                <!-- <td><?= $r->status; ?></td> -->
                                                <td>
                                                    <a href='<?= base_url('discuss/hapus_discuss/'); ?><?= $n->id; ?>' class="badge badge-danger" onclick="return confirm('Apakah anda yakin ingin menghapus tag ini ?')">X</a>
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
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Topik Baru</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= base_url('discuss/tambah_discuss'); ?>" method='post'>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <div class="form-group form-floating-label">
                                            <select class="form-control input-border-bottom" id="user_id" name="user_id" required="">
                                                <option></option>
                                                <?php foreach ($rows as $r) { ?>
                                                    <option value="<?= $r->user_id ?>"><?= $r->user_name ?></option>
                                                <?php } ?>
                                            </select>
                                            <label for="selectFloatingLabel" class="placeholder">Nama User</label>
                                        </div>
                                        <input type="text" class="form-control" id="discuss_topic" name='discuss_topic' placeholder="Judul Topik">
                                        <div class="form-group form-floating-label">
                                            <select class="form-control input-border-bottom" id="tag_id" name="tag_id" required="">
                                                <option></option>
                                                <?php foreach ($name as $n) { ?>
                                                    <option value="<?= $n->id ?>"><?= $n->name ?></option>
                                                <?php } ?>
                                            </select>
                                            <label for="selectFloatingLabel" class="placeholder">Tag</label>
                                        </div>
                                        <div class="form-group form-floating-label">
                                            <select class="form-control input-border-bottom" id="status" name="status" required="">
                                                <option></option>
                                                <?php foreach ($rows as $r) { ?>
                                                    <option value="<?= $r->status ?>">
                                                        <?php
                                                        if ($r->status == 0) {
                                                            echo "Not Solved";
                                                        } else {
                                                            echo "Solved";
                                                        }
                                                        ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                            <label for="selectFloatingLabel" class="placeholder">Status</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Tambah Topik</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>