<?php
    $iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
    $ipad = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
    $android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
    $palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
    $berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
    $ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
    $symbian =  strpos($_SERVER['HTTP_USER_AGENT'],"Symbian");
    if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian == true) {
        $mobile = 1;
    } else {
        $mobile = 0;
    }
?>
<!-- 
    <?php if($mobile == 0){ ?>
        <iframe style="width: 75%; height: 1000px; padding-top: 5px; padding-left: 25%;" src="<?php echo $pedido['boleto']?>" title="description"></iframe>
    <?php } else { ?>
        <iframe style="width: 70%; height: 1000px; padding-top: 49px; padding-left: 16%; padding-right: 12%;" src="<?php echo $pedido['boleto']?>" title="description"></iframe>
    <?php } ?>
-->

<script>
    $(document).ready(function openInNewTab(){
    });
    
    function openInNewTab(){
        window.open(<?php echo $pedido['boleto'];?>, '_blank').focus();
    }
</script>