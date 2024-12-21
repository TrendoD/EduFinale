<!-- begin MAIN PAGE CONTENT -->
<div id="page-wrapper">
    <div class="page-content">
        <!-- begin PAGE TITLE AREA -->
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title">
                    <h1><?= $title ?>
                        <small><?= $description ?></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?= base_url('') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="active"><?= $title ?></li>
                    </ol>
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <!-- end PAGE TITLE AREA -->

        <!-- begin CHAT CONTENT -->
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="portlet portlet-blue">
                            <div class="portlet-heading">
                                <div class="portlet-title">
                                    <h4><i class="fa fa-users"></i> Kontak</h4>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div id="blue" class="panel-collapse collapse in">
                                <div class="portlet-body">
                                    <?php if($data->tipe == "mahasiswa" && empty($pembimbing)): ?>
                                    <div class="alert alert-warning">
                                        <i class="fa fa-info-circle"></i> Anda belum memiliki dosen pembimbing. Dosen pembimbing akan ditampilkan disini setelah proposal Anda disetujui dan dosen pembimbing ditentukan oleh Kaprodi.
                                    </div>
                                    <?php endif; ?>

                                    <?php if($data->tipe == "dosen" && empty($mahasiswa)): ?>
                                    <div class="alert alert-warning">
                                        <i class="fa fa-info-circle"></i> Saat ini Anda belum memiliki mahasiswa bimbingan. Daftar mahasiswa bimbingan akan ditampilkan disini setelah Anda ditugaskan sebagai dosen pembimbing oleh Kaprodi.
                                    </div>
                                    <?php endif; ?>

                                    <?php if(isset($pembimbing)): ?>
                                        <?php foreach($pembimbing as $p): ?>
                                            <div class="contact-item" data-user-id="<?= $p->nim ?>" style="padding:10px; border-bottom:1px solid #eee; cursor:pointer;">
                                                <div style="display:flex; align-items:center;">
                                                    <?php if(!empty($p->photo) && file_exists(FCPATH.'img/profile/'.$p->photo)): ?>
                                                        <img src="<?= base_url('img/profile/'.$p->photo) ?>" class="img-circle" style="width:40px; height:40px; margin-right:10px;">
                                                    <?php else: ?>
                                                        <div style="width:40px; height:40px; background:#34495e; border-radius:50%; color:white; display:flex; align-items:center; justify-content:center; margin-right:10px; font-weight:bold;">
                                                            <?= substr($p->nama, 0, 2) ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <div>
                                                        <h4 style="margin:0;"><?= $p->nama ?></h4>
                                                        <small class="text-muted">Dosen Pembimbing</small>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>

                                    <?php if(isset($mahasiswa)): ?>
                                        <?php foreach($mahasiswa as $m): ?>
                                            <div class="contact-item" data-user-id="<?= $m->nim ?>" style="padding:10px; border-bottom:1px solid #eee; cursor:pointer;">
                                                <div style="display:flex; align-items:center;">
                                                    <?php if(!empty($m->photo) && file_exists(FCPATH.'img/profile/'.$m->photo)): ?>
                                                        <img src="<?= base_url('img/profile/'.$m->photo) ?>" class="img-circle" style="width:40px; height:40px; margin-right:10px;">
                                                    <?php else: ?>
                                                        <div style="width:40px; height:40px; background:#34495e; border-radius:50%; color:white; display:flex; align-items:center; justify-content:center; margin-right:10px; font-weight:bold;">
                                                            <?= substr($m->nama, 0, 2) ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <div>
                                                        <h4 style="margin:0;"><?= $m->nama ?></h4>
                                                        <small class="text-muted">Mahasiswa Bimbingan</small>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="portlet portlet-default">
                            <div class="portlet-heading">
                                <div class="portlet-title">
                                    <h4><i class="fa fa-comments"></i> <span id="chat-title">Pilih kontak untuk memulai chat</span></h4>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div id="chat" class="panel-collapse collapse in">
                                <div id="chat-messages" class="portlet-body" style="height: 400px; overflow-y: auto; padding: 15px;">
                                    <!-- Messages will be loaded here -->
                                </div>
                                <div class="portlet-footer">
                                    <form id="chat-form" role="form">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" id="message-input" class="form-control" placeholder="Ketik pesan...">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-primary" type="button" id="send-message">
                                                        <i class="fa fa-paper-plane"></i> Kirim
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end CHAT CONTENT -->
    </div>
</div>
<!-- end MAIN PAGE CONTENT -->

<script>
var currentReceiverId = null;

$(document).ready(function() {
    $('.contact-item').click(function() {
        $('.contact-item').css('background-color', '');
        $(this).css('background-color', '#f5f5f5');
        
        var name = $(this).find('h4').text();
        $('#chat-title').text('Chat dengan ' + name);
        
        currentReceiverId = $(this).data('user-id');
        loadMessages();
    });
    
    $('#send-message').click(sendMessage);
    
    $('#message-input').keypress(function(e) {
        if(e.which == 13) {
            sendMessage();
            return false;
        }
    });
    
    setInterval(function() {
        if(currentReceiverId) {
            loadMessages();
        }
    }, 5000);
});

function loadMessages() {
    $.get('<?= base_url('chat/get_messages') ?>', { receiver_id: currentReceiverId }, function(data) {
        var messages = JSON.parse(data);
        var html = '';
        
        messages.forEach(function(msg) {
            var isMe = msg.sender_id == '<?= $data->nim ?>';
            var time = new Date(msg.timestamp).toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});
            
            html += '<div style="margin: 10px 0; ' + (isMe ? 'text-align: right;' : '') + '">' +
                   '<div style="display: inline-block; max-width: 70%; ' + 
                   'background: ' + (isMe ? '#007bff' : '#f8f9fa') + '; ' +
                   'color: ' + (isMe ? 'white' : 'black') + '; ' +
                   'padding: 8px 12px; border-radius: 15px; text-align: left;">' +
                   '<div>' + msg.message + '</div>' +
                   '<div style="font-size: 12px; color: ' + (isMe ? '#e3f2fd' : '#666') + '; margin-top: 5px;">' + time + '</div>' +
                   '</div></div>';
        });
        
        var chatMessages = $('#chat-messages');
        chatMessages.html(html);
        chatMessages.scrollTop(chatMessages[0].scrollHeight);
        
        $.post('<?= base_url('chat/mark_as_read') ?>', { sender_id: currentReceiverId });
    });
}

function sendMessage() {
    var messageInput = $('#message-input');
    var message = messageInput.val().trim();
    
    if(!message || !currentReceiverId) return;
    
    $.post('<?= base_url('chat/send_message') ?>', {
        receiver_id: currentReceiverId,
        message: message
    }, function(response) {
        messageInput.val('');
        loadMessages();
    });
}
</script>