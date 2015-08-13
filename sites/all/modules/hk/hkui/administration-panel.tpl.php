
<div id='hkui-administrator'>
<?php foreach($groups as $group_name => $items){ ?>
  <fieldset >
  <legend><?php print $group_name ?></legend>
    <?php foreach($items as $item) {?>
      <div class='form-item hkui-administrator-item'>
        <a href="<?php print $item['path'] ?>" >
          <?php if($item['image']) { ?>
            <img src="<?php print $item["image"]?>" alt="" />
          <?php } ?>
          <br/>
          <strong><?php print $item["title"] ?></strong>
        </a><br/>
        <small><?php print $item["description"] ?></small>
      </div>
    <?php } ?>
 </fieldset>   
<?php } ?>
</div>
