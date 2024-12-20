<div class="form-group">
    <label for="textInput" class="col-sm-2 control-label">Nama</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="nama" name="nama" 
               value="<?php echo isset($data->nama) ? htmlspecialchars($data->nama) : ''; ?>" readonly>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">Jenis Kelamin</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" 
               value="<?php echo ($data->gender == 'lakilaki') ? 'Laki - Laki' : 'Perempuan'; ?>" readonly>
        <input type="hidden" name="gender" value="<?php echo $data->gender; ?>">
    </div>
</div>

<div class="form-group">
    <label for="textInput" class="col-sm-2 control-label">NIM / Username</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="nim" name="nim" 
               value="<?php echo isset($data->nim) ? htmlspecialchars($data->nim) : ''; ?>" readonly>
    </div>
</div>

<div class="form-group">
    <label for="textInputDisabled" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
        <input type="password" class="form-control" id="password" name="password" 
               placeholder="Kosongkan jika tidak ingin mengubah password">
        <small class="text-muted">Hanya isi jika ingin mengubah password</small>
    </div>
</div>

<br>
<div class="form-group">
    <label class="col-sm-2 control-label"></label>
    <div class="col-sm-10">
        <button type="submit" class="btn btn-default">Simpan</button>
    </div>
</div>