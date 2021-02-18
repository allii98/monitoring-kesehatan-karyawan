<?php foreach ($suhu as $d) ?>
<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="defaultModalLabel">Data suhu karyawan</h4>
    </div>
    <form action="<?= base_url('Dashboard/editpost') ?>" method="POST">
        <div class="modal-body">
            <input type="hidden" value="<?= $d['id_suhu'] ?>" name="id" id="">
            <!-- <label for="suhu">Tanggal</label>
            <div class="form-group">
                <div class="form-line">
                    <input type="date" id="tanggal" name="tanggal" class="form-control"
                        value="<?= date_format(date_create($d['tanggal']), 'Y-m-d'); ?>">
                </div>
            </div> -->

            <label for="suhu">Pulang kerja</label>
            <div class="form-group">
                <div class="form-line">
                    <input type="text" id="masuk" name="masuk" class="form-control"
                        placeholder="Suhu pada saat masuk kerja" autocomplete="off" required>
                </div>
            </div>
            <label for="p">Petugas</label>
            <div class="form-group">
                <div class="form-line">
                    <input type="text" id="p" name="p" class="form-control" placeholder="Petugas pencatat"
                        autocomplete="off" required>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary waves-effect">Simpan</button>
            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
        </div>
    </form>
</div>