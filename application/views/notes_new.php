<h2>New Note</h2>

<div class="errors">
<?php echo validation_errors(); ?>
</div>

<?=form_open('notes/add', 'class="form-inline"');?>
<?php $filename = array('name'=>'filename','id'=>'','value'=>'','placeholder'=>'Enter Title','class'=>'span4 input');?>
<?php $content = array('name'=>'content','id'=>'content','value'=>'','rows'=>'55','cols'=>'120','width'=>'100');?>
<div class="control-group">
<label class="control-label" for="filename">Title:
<div class="controls"> 
<?=form_input($filename);?>  
</div> 
</label>
<label class="control-label" for="filename">Tag: 
<div class="controls"> 
<?=form_dropdown('tag',$tags);?>  
</div> 
</label>
<label class="control-label" for="status">Status: 
<div class="controls"> 
<?php $status = array('private' => 'Private', 'public' => 'Public', 'draft' => 'Draft');?>
<?=form_dropdown('status',$status);?>  
</div> 
</label>   
</div>  
<div class="control-group">
<div class="controls"> 
<?=form_textarea($content);?>
<script>CKEDITOR.replace('content');</script>
<script type="text/javascript">
CKEDITOR.config.width = '100%';
CKEDITOR.config.height = '400px';
</script>
</div>
</div>
<div class="control-group">
<div class="controls"> 
<button type=submit class='btn' />Save</button>
</div>
</div>
<?=form_close();?>