<?php
function doc_size($a_bytes) {
    $file=filesize($a_bytes);
    if ($file < 1024) {
        return $file .' B';
    } elseif ($file < 1048576) {
        return round($file / 1024, 2) .' KB';
    } else {
        return round($file / 1048576, 2) . ' MB';
    } 
}
function count_comments($id) {
    include'db.php';
    $q=$db->query("select doc from docs_comments where doc='".$id."'");
    $num=$q->num_rows;
    return $num;
}
function finduser($id) {
    include'db.php';
    $q=$db->query("select * from users where id='".$id."'");
    $row=$q->fetch_assoc();
    return $row['username'];
}
function checkconn($id1,$id2) {
    include'db.php';
    $q1=$db->query("select * from conn where frm='".$id1."' and tt='".$id2."'");
    $q2=$db->query("select * from users where id='".$id2."'");
    $q3=$db->query("select * from conn where frm='".$id2."' and tt='".$id1."'");
    $num2=$q3->num_rows;
    $row2=$q2->fetch_assoc();
    $num1=$q1->num_rows;
    if ($num1==1 && $num2==0) {
        return '<a style="float:right; margin:3px; background:#eee; color:#000;" class="btn">You Already Know '.$row2['username'].'</a>';
    }
    elseif($num1==1 && $num2==1) {
        return '<a style="float:right; margin:3px; background:#eee; color:#000;" num="'.$id2.'" id="remove_list" class="btn">Remove this user from your list</a>';
    }
    elseif ($id1==$id2) {
        return '<a style="float:right; margin:3px; background:#eee; color:#000;" class="btn">This is you</a>';
    }
    elseif ($num1!=$num2) {
        return '<a style="float:right; background:#E23B25; margin:3px;" class="btn" id="ikh" num="'.$id2.'">'.$row2['username'].' says "I know him"</a>';
    }
    else {
        return '<a style="float:right; margin:3px;" class="btn" id="ikh" num="'.$id2.'">Add '.$row2['username'].' to my list</a>';
    }
    
}
function msgusers($id1) {
    include 'db.php';
    $q4=$db->query("select * from users");
    $num4=$q4->num_rows;
    for ($i=0; $i<$num4; $i++) {
        $row4=$q4->fetch_assoc();
        $q1=$db->query("select * from conn where frm='".$id1."' and tt='".$row4['id']."'");
        $q2=$db->query("select * from conn where frm='".$row4['id']."' and tt='".$id1."'");
        $num2=$q2->num_rows;
        $num1=$q1->num_rows;
        if($num1==1 && $num2==1) {
            echo '<option value="'.$row4['id'].'">'.$row4['username'].'</option>';
            }
    }
}
function check_read_msg($id) {
    include 'db.php';
    $q1=$db->query("select red from msgs where red='1' and id='".$id."'");
    $num1=$q1->num_rows;
    if ($num1==1){
        return "<div id=\"read_msg\">Read</div>";
    }
    else {
        return "<div id=\"read_msg\">unRead</div><div id=\"cancel_msg\" can_num=\"".$id."\">Cancel</div>";
    }
}
function check_read_msg2($id) {
    include 'db.php';
    $q1=$db->query("select red from msgs where red='1' and id='".$id."'");
    $num1=$q1->num_rows;
    if ($num1==1){
        return "<div id=\"old_msg\">Old</div>";
    }
    else {
        return "<div id=\"new_msg\">New</div>";
    }
}
function shouts_comments($id) {
    include 'db.php';
    $q1=$db->query("select * from shouts_comments where shout='".$id."'");
    $num1=$q1->num_rows;
    return $num1;
}
function shouts_loves($id) {
    include 'db.php';
    $q1=$db->query("select * from shouts_rates where shout='".$id."' and rate='1'");
    $num1=$q1->num_rows;
    return $num1;
}
function shouts_hates($id) {
    include 'db.php';
    $q1=$db->query("select * from shouts_rates where shout='".$id."' and rate='0'");
    $num1=$q1->num_rows;
    return $num1;
}
function redir($loc) {
    echo '<script> window.location="'.$loc.'"; </script>';
}
function profile_pic($id) {
    include 'db.php';
    $q1=$db->query("select profile_pic from users where id='".$id."'");
    $row1=$q1->fetch_assoc();
    if ($row1['profile_pic']=="") {
        return 'images/user.png';
    }
    else {
        return 'profiles/'.$id.'/'.$row1['profile_pic'];
    }
}
function doc_privacy($doc_id) {
    include 'db.php';
    $q1=$db->query("select * from docs where id='".$doc_id."'");
    $row1=$q1->fetch_assoc();
    if ($row1['privacy']==1) {
        return "This doc is only visible to you";
    }
}
function ext ($name) {
    $name=substr($name,-6,6);
    $name=strstr($name,'.');
    return $name;
}
function comn_img($img) {
    include 'db.php';
    $q=$db->query("select * from fotos_comments where foto='".$img."'");
    $num=$q->num_rows;
    if ($num==0) {
    }
    else {
        return '<span id="img-title">Comments: '.$num.'</span>';
    }
}
function tut_own($tut,$user) {
    include 'db.php';
    $q1=$db->query("select * from tuts where id='".$tut."'");
    $row1=$q1->fetch_assoc();
    if ($row1['creator']==$user) {
        return '<img id="edit-tut" onclick="window.location=\'tutgen.php?tut='.$tut.'\'" title="Edit" src="images/edit.png"/><img id="delt-tut" tut="'.$tut.'" title="Delete" src="images/delete.png"/>';
    }
}
?>