<a href="add.php" >注册</a>
<?php
	require("redis.php");
	for($i=1;$i<=($redis->get("userid"));$i++){
		$data[]=$redis->hgetall("user:".$i);
	}
//	var_dump($data);
	$data=array_filter($data);
?>
<table border=1>
    <tr>
    	<th>uid</th>
    	<th>username</th>
    	<th>age</th>
	<th>操作></th>
    </tr>
<?php foreach($data as $v){?>
    <tr>
 	<td><?php echo $v['uid']?></td>
 	<td><?php echo $v['username']?></td>
 	<td><?php echo $v['age']?></td>
 	<td><a href="del.php?id=<?php echo $v['uid']?>">删除</a><a href="mod.php?id=<?php echo $v['uid']?>">编辑</a></td>
    </tr>
<?php }?>
</table>
