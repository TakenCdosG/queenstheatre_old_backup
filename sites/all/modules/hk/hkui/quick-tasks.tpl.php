
<div class='hkui-quick-tasks'>
  <a href='javascript:window.back()'>&lt;<?php print t("Go back") ?></a> | 
  <a href='<?php print url("cp") ?>'><?php print t("Control Panel") ?></a> |
   <a href='<?php print url("logout") ?>'><?php print t("Logout") ?></a>
   
  <div class='actions'>
    <label>Action:</label><select onchange='if(this.value)window.location=this.value' >
      <option value=''><?php print t("--Select--") ?></option>
        <?php foreach($groups as $group_name => $items){ ?>
         <optgroup label='<?php print $group_name ?>' >
           <?php  foreach($items as $item){?>
              <option value='<?php print $item["path"] ?>' ><?php print $item["title"] ?></option>
          <?php  } ?>
        </optgroup>
      <?php  } ?>
    </select>
  </div>    
</div>
