<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right"><a href="<?php echo $back; ?>" class="btn btn-default"><i class="fa fa-reply"></i> <?php echo $button_back; ?></a></div>
      <h1><?php echo $heading_title; ?></h1>
      <ul class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
  <div class="container-fluid">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_form; ?></h3>
      </div>
      <div class="panel-body">
        <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo $form_113_117; ?>">
		  <div class="tab-content">
            <div class="tab-pane active" id="tab-cod">
			
			<legend><?php echo $text_send_from; ?></legend>
			<input type="hidden" name="order_id" value="<?php echo $order_id; ?>" />
			
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-codprofile"><?php echo $entry_name; ?></label>
                <div class="col-sm-10">
                  <input type="text" name="codprofile" value="<?php echo $codprofile; ?>" placeholder="<?php echo $entry_name; ?>" id="input-codprofile" class="form-control" />
                  <input type="hidden" name="codprofile_id" value="<?php echo $codprofile_id; ?>" />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-fio"><?php echo $entry_fio; ?></label>
                <div class="col-sm-10">
                  <input type="text" name="fio" value="<?php echo $fio; ?>" id="input-fio" class="form-control" />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-postcode"><?php echo $entry_postcode; ?></label>
                <div class="col-sm-10">
                  <input type="text" name="postcode" value="<?php echo $postcode; ?>" id="input-postcode" class="form-control" />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-address"><?php echo $entry_address; ?></label>
                <div class="col-sm-10">
                  <input type="text" name="address" value="<?php echo $address; ?>" id="input-address" class="form-control" />
                </div>
              </div>		
             <div class="form-group">
                <label class="col-sm-2 control-label" for="input-doc"><?php echo $entry_doc; ?></label>
                <div class="col-sm-10">
                  <input type="text" name="doc" value="<?php echo $doc; ?>" id="input-doc" class="form-control" />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-series"><?php echo $entry_series; ?></label>
                <div class="col-sm-10">
                  <input type="text" name="series" value="<?php echo $series; ?>" id="input-series" class="form-control" />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-number"><?php echo $entry_number; ?></label>
                <div class="col-sm-10">
                  <input type="text" name="number" value="<?php echo $number; ?>" id="input-number" class="form-control" />
                </div>
              </div>	
             <div class="form-group">
                <label class="col-sm-2 control-label" for="input-issue"><?php echo $entry_issue; ?></label>
                <div class="col-sm-10">
                  <input type="text" name="issue" value="<?php echo $issue; ?>" id="input-issue" class="form-control" />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-issue_date"><?php echo $entry_issue_date; ?></label>
                <div class="col-sm-10">
                  <input type="text" name="issue_date" value="<?php echo $issue_date; ?>" id="input-issue_date" class="form-control" />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-issue_year"><?php echo $entry_issue_year; ?></label>
                <div class="col-sm-10">
                  <input type="text" name="issue_year" value="<?php echo $issue_year; ?>" id="input-issue_year" class="form-control" />
                </div>
              </div>
			  
			  <legend><?php echo $text_send_to; ?></legend>

			  <div class="form-group">
                <label class="col-sm-2 control-label" for="input-sfio"><?php echo $entry_fio; ?></label>
                <div class="col-sm-10">
                  <input type="text" name="sfio" value="<?php echo $sfio; ?>" id="input-sfio" class="form-control" />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-spostcode"><?php echo $entry_postcode; ?></label>
                <div class="col-sm-10">
                  <input type="text" name="spostcode" value="<?php echo $spostcode; ?>" id="input-spostcode" class="form-control" />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-saddress"><?php echo $entry_address; ?></label>
                <div class="col-sm-10">
                  <input type="text" name="saddress" value="<?php echo $saddress; ?>" id="input-saddress" class="form-control" />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-os"><?php echo $entry_os; ?></label>
                <div class="col-sm-10">
                  <input type="text" name="os" value="<?php echo $os; ?>" id="input-os" class="form-control" />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-cod"><?php echo $entry_cod; ?></label>
                <div class="col-sm-10">
                  <input type="text" name="cod" value="<?php echo $cod; ?>" id="input-cod" class="form-control" />
                </div>
              </div>
			  
              <div class="text-right">
				<button type="submit" id="button-forms1" data-loading-text="<?php echo $text_loading; ?>" class="btn btn-primary"><i class="fa fa-paper-plane"></i> <?php echo $button_forms; ?></button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script type="text/javascript"><!--
// COD Profiles
$('input[name=\'codprofile\']').autocomplete({
	'source': function(request, response) {
		$.ajax({
			url: 'index.php?route=module/rpcod/autocomplete&token=<?php echo $token; ?>&filter_name=' +  encodeURIComponent(request),
			dataType: 'json',			
			success: function(json) {
				json.unshift({
					codprofile_id: '0',					
					name: '<?php echo $text_none; ?>',
					fio: '',
					postcode: '',
					address: '',
					doc: '',
					series: '',
					number: '',
					issue: '',			
					issue_date: '',
					issue_year: ''					
				});				
				
				response($.map(json, function(item) {
					return {
						label: item['name'],
						value: item['codprofile_id'],					
						fio: item['fio'],
						postcode: item['postcode'],
						address: item['address'],
						doc: item['doc'],
						series: item['series'],
						number: item['number'],
						issue: item['issue'],
						issue_date: item['issue_date'],
						issue_year: item['issue_year']					
					}
				}));
			}
		});
	},
	'select': function(item) {
		// Reset all custom fields
		$('#tab-cod input[name=\'codprofile\']').val(item['label']);
		$('#tab-cod input[name=\'codprofile_id\']').val(item['value']);
		$('#tab-cod input[name=\'fio\']').val(item['fio']);
		$('#tab-cod input[name=\'postcode\']').val(item['postcode']);
		$('#tab-cod input[name=\'address\']').val(item['address']);
		$('#tab-cod input[name=\'doc\']').val(item['doc']);		
		$('#tab-cod input[name=\'series\']').val(item['series']);
		$('#tab-cod input[name=\'number\']').val(item['number']);
		$('#tab-cod input[name=\'issue\']').val(item['issue']);
		$('#tab-cod input[name=\'issue_date\']').val(item['issue_date']);
		$('#tab-cod input[name=\'issue_year\']').val(item['issue_year']);
	}
});


$('#button-forms').on('click', function() {
	$.ajax({
		url: 'index.php?route=sale/order/api&token=<?php echo $token; ?>&api=api/rpcod&store_id=' + $('select[name=\'store_id\'] option:selected').val(),
		type: 'post',
		data: $('#tab-cod input[type=\'text\'], #tab-cod input[type=\'hidden\'], #tab-cod input[type=\'radio\']:checked, #tab-cod input[type=\'checkbox\']:checked, #tab-cod select, #tab-cod textarea'),
		dataType: 'json',
		beforeSend: function() {
			$('#button-forms').button('loading');
		},
		complete: function() {
			 $('#button-forms').button('reset');
		},
		success: function(json) {
			$('.alert, .text-danger').remove();
			$('.form-group').removeClass('has-error');
			
			if (json['error']) {
				$('#content > .container-fluid').prepend('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> ' + json['error'] + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
			}
			
			if (json['success']) {
				$('#content > .container-fluid').prepend('<div class="alert alert-success"><i class="fa fa-check-circle"></i> ' + json['success'] + '  <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
			}
			
			if (json['order_id']) {
				$('input[name=\'order_id\']').val(json['order_id']);
			}
		},
		error: function(xhr, ajaxOptions, thrownError) {
			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		}
	});	
});
//--></script></div>
<?php echo $footer; ?>