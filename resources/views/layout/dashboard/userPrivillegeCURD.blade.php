<?php 
	$userdata=Auth::user();
   
	$insertUser=$userdata->privilege['insertUser'];
    $updateUser=$userdata->privilege['updateUser'];
    $deleteUser=$userdata->privilege['deleteUser'];
    $importUser=$userdata->privilege['importUser'];
    $exportUser=$userdata->privilege['exportUser'];
    //dd($insertUser);
 ?>
<form>
<input type="hidden" name="insertUser" id="insertUser" value=<?php echo $insertUser ?> />
<input type="hidden" name="updateUser" id="updateUser" value=<?php echo $updateUser ?> />
<input type="hidden" name="deleteUser" id="deleteUser" value=<?php echo $deleteUser ?> />
<input type="hidden" name="importUser" id="importUser" value=<?php echo $importUser ?> />
<input type="hidden" name="exportUser" id="exportUser" value=<?php echo $exportUser ?> />
 
</form>