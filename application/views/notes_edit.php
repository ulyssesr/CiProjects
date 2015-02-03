<?php foreach($query as $item):?><?php endforeach;?>
<?php $title = url_title($item->filename,'dash',true);?>
<?php $this->template->set('title',$title);?>
<?php $filename = array('name'=>'filename','id'=>'','value'=>$item->filename,'class'=>'span4 input');?>
<?php $content = array('name'=>'content','id'=>'content','value'=>$item->content,'rows'=>'35','cols'=>'120','width'=>'100');?>
<h2><?=$item->filename;?></h2>
<div class="errors">
<?php echo validation_errors(); ?>
</div>
<?=form_open('notes/save/'.$item->id, 'class="form-inline"');?>
<div class="control-group">
<label class="control-label" for="filename">Title:
<div class="controls"> 
<?=form_input($filename);?>
</div> 
</label>
<label class="control-label" for="filename">Tag: 
<div class="controls"> 
<?=form_dropdown('tag',$tags,$item->tag);?>  
</div> 
</label>
<label class="control-label" for="status">Status: 
<div class="controls"> 
<?php $status = array('private' => 'Private', 'public' => 'Public', 'draft' => 'Draft');?>
<?=form_dropdown('status',$status,$item->status);?>  
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
<button type=submit class='btn'/>Save</button>
</div>
</div>  
<?=form_close();?>