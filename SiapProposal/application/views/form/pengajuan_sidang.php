                                            <th>Jam</th>
                                            <th>Nama File</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $count = 0;
                                        foreach ($berkas as $row):
                                            $count++;
                                        ?>
                                            <tr>
                                                <td><?=$count?></td>
                                                <td><?=tgl($row->date)?></td>
                                                <td><?=jam($row->date)?></td>
                                                <td><?=$row->filename?></td>
                                                <td>
                                                    <a download href="/buku/<?=$row->filename?>" class="btn btn-info btn-sm">
                                                        <i class="fa fa-download"></i> Unduh
                                                    </a>
                                                    <a href="/sidang/revisi/delete/buku/<?=$row->filename?>" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash-o"></i> Hapus
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.page-content -->
</div>
<!-- /#page-wrapper -->

<script>
$(document).ready(function() {
    // Initialize select2 if needed
    if ($.fn.select2) {
        $('[name=bidangminat]').select2();
        $('[name=pilihandosen1]').select2();
    }

    // Prevent collapse events from bubbling
    $('#rincianInformasi, #statusPengajuan, #buktiBimbingan, #softFileBuku').on('show.bs.collapse hide.bs.collapse', function(e) {
        e.stopPropagation();
    });

    // Add icon rotation for collapse indicators
    $('.portlet-heading a[data-toggle="collapse"]').on('click', function() {
        $(this).find('i').toggleClass('fa-chevron-down fa-chevron-up');
    });
});
</script>
