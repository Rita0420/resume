 <div class="di"
     style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
     <marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
         <?php
					$ads=$Ad->all(['sh'=>1]);
					foreach($ads as $ad){
						echo $ad['text'];
						echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
					}
					?>
     </marquee>
     <div style="height:32px; display:block;"></div>
     <!--正中央-->
    <h3>更多最新消息顯示區</h3>
    <hr>
    <?php
        $all=$News->count(['sh'=>1]);
        $div=5;
        $pages=ceil($all/$div);
        $now=$_GET['p']??1;
        $start=($now-1)*$div;
		$news=$News->all(['sh'=>1]," limit $start,$div");
    ?>
    <ol start=<?=$start+1;?>>
     <?php
        
		foreach($news as $new){
			echo "<li class='sswww'>";
			echo mb_substr($new['text'],0,25);
			echo "<span class='all' style='display:none'>";
			echo $new['text'];
			echo "</span>";
			echo "</li>";
		}
		?>
    </ol>
     <div class="cent">
            <?php
            if($now-1>0):?>
            <a href="?do=<?=$do;?>&p=<?=$now-1;?>" class="bl"><</a>
            <?php endif;?>

            <?php for($i=1;$i<=$pages;$i++):
                $size=($now==$i)?'24px':''; ?>
            <a href="?do=<?=$do;?>&p=<?=$i;?>" class="bl" style="font-size:<?=$size;?>"><?=$i;?></a>
            <?php endfor;?>
            <?php
            if($now+1<=$pages):?>
            <a href="?do=<?=$do;?>&p=<?=$now+1;?> " class="bl">></a>
            <?php endif;?>
        </div>
 </div>

  <script>
            $(".sswww").hover(
                function() {
                    $("#alt").html("<pre>" + $(this).children(".all").html() + "</pre>").css({
                        "top": $(this).offset().top
                    })
                    $("#alt").show()
                }
            )
            $(".sswww").mouseout(
                function() {
                    $("#alt").hide()
                }
            )
            </script>