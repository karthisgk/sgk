<html>
  <head>
        <!-- App CSS -->
        <link href="<?=base_url();?>assets/css/style.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="<?=base_url();?>assets/file_style.css"></link>
        <!-- jQuery  -->
        <script src="<?=base_url();?>assets/js/jquery.min.js"></script>
        <!-- bootstrap -->
        <script src="<?=base_url();?>assets/js/bootstrap.min.js"></script>
        <script>var base_url = "<?=base_url();?>";</script>
	<title><?=$data[0]->name;?></title>
  </head>
  <body>
    <div style="padding: 50px;">
      <label id="label-ele">HTML: <?=$cur_name;?></label>
      <textarea style="min-height: 200px;" id="txt" class="form-control" placeholder="HTML"><?=$cur_content;?></textarea>
      <hr>
    </div>

	<div id="wrk-area">
            <?=$cur_content;?>
	</div>

      <!--<form action="<?=base_url();?>index.php/editor/upd" method="post" class="row">
          <div class="col-sm-4">
            <input type="text" name="inp_name" class="form-control" />
          </div>
      </form>-->
  <div id="save-model" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Save</h4>
            </div>
            <div class="modal-body">
                <div class="row" style="padding: 30px;">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <input type="text" maxlength="255" id="f-name" class="form-control" placeholder="Enter File Name" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="submit-btn" class="btn btn-success">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>

  </div>
  </div>

  <div id="open-model" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Open</h4>
            </div>
            <div class="modal-body scrolable-content scrolable-bar">
                <div class="row" style="padding: 30px;">
                    <div class="col-sm-12">
                        <ul class="file-list"></ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="open-btn" class="btn btn-success">Open</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>

  </div>
  </div>

<div id="loading">
    <img
class="image" src="<?=base_url();?>media/loading.png" alt="" height="50">
</div>
</body>

	<script>
        var cur = <?=$this->session->userdata('cur') != '' ? 'true' : 'false';?>;
	$(document).ready(function(){
		$('#txt').keyup(function(){
			$('#wrk-area').html(this.value);
		});

            $(window).keyup(function(e){
               if(e.shiftKey && e.keyCode == 83){ /*save file*/
                   if(!cur){
                       $('#save-model').modal();
                       $('#submit-btn').off('click').click(function(){
                           var post = getPost();
                           if(post.file_name != ''){
                               save();
                               $('#save-model').modal('toggle');
                               $('#label-ele').text('HTML: '+post.file_name);
                           }else{
                               alert('Enter File Name!');
                           }
                       });
                   }else
                        save();
               }else if(e.shiftKey && e.keyCode == 78){ /*new file*/
                    $('#label-ele').text('HTML: ');
                    $('textarea#txt').val('');
                    $('#f-name').val('');
                    $('#wrk-area').html('');
                    cur = false;
                    $.ajax({
                        type: 'post',
                        url: base_url+'editor/new_action'
                    });
               }else if(e.shiftKey && e.keyCode == 79){ /*get all files*/
                    $('#open-model').modal();
                    $('#loading').show();
                    $.ajax({
                        url: base_url+'editor/get_files',
                        dataType: 'json',
                        success: function(data){
                            $('#loading').hide();
                            if(data.length > 0){
                                initOpen(data);
                            }else{
                                var er = $('<h3>No Files</h3>');
                                er.css({'text-align': 'center'});
                                $('ul.file-list').html(er);
                            }
                        }
                    });
               }
            });
	});

        function initOpen(data){
            $('ul.file-list').html('');
            $.each(data, function(k, j){
                var ele = $('<li><h3>'+j.name+'</h3></li>');
                ele.attr('data-id', j.id);
                $('ul.file-list').append(ele);
            });
            $('ul.file-list').children().off('click').click(function(){
                $('ul.file-list').children().removeClass('selected');
                $(this).addClass('selected');
            });
            $('#open-btn').off('click').click(function(){ /*after select and open*/
               var sel = $('ul.file-list li.selected');
               if(sel.length == 1){
                   $.ajax({
                       url: base_url+'editor/get_single/'+sel.attr('data-id'),
                       dataType: 'json',
                       success: function(data){
                           cur = true;
                           if(!$.isEmptyObject(data)){
                                $('#label-ele').text('HTML: '+data.name);
                                $('textarea#txt').val(data.content);
                                $('#wrk-area').html(data.content);
                                $('#open-model').modal('toggle');
                           }
                       }
                   })
               }else
                   alert('select files to open');
            });
        }

        function getPost(){
            var post = {
                file_name: $('#f-name').val(),
                file_content: $('textarea#txt').val()
            };
            return post;
        }

        function save(){
            var post = getPost();
            $.ajax({
                type: 'post',
                url: base_url+'editor/save',
                data: post,
                success: function(data){
                    cur = true;
                }
            });
        }

	</script>


</html>