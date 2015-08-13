<div class='slideshow' >
<?php  
  for($i=0; $i < sizeof($imagefield); $i++ ){ 
  $value = $imagefield[$i];  
?>      

  <?php if($value['filepath']){    ?>

    
    <div class="slide slide-<?php print $i ?>" >      
    <?php if($value['data']['url']){  ?>
      <a href="<?php print $value['data']['url'] ?>" >
    <?php } ?>
    
      <?php if(!empty($value['data']['title'])){ ?>     
        <div class="slide-title">
          <?php print $value['data']['title'] ?>
        </div>
      <?php } ?>
      
      <?php if(!empty($value['data']['description'])){ ?>     
        <div class="slide-description">
          <?php print $value['data']['description'] ?>
        </div>
      <?php } ?>
      
       <?php print theme("image",$value['filepath'],$value['data']['alt'],$value['data']['title']); ?>
    
    <?php if($value['data']['url']){  ?>          
      </a>
    <?php } ?>
    
    
    </div> 
  <?php  } ?>

<?php  } ?>   
</div>
  
