<?php
    error_reporting(0);
    
    function printImg($src,$tit,$classe,$path){
        if(!$tit){$tit = "";}
        if(!$path){
            $path = 'https://osmitadores.github.io/assets/';
        }else{
            $path = 'https://osmitadores.github.io/img/';
        }
        echo '<img class="',$classe,'" src="',$path,$src,'.png" title="',$tit,'">';
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta property="og:title" content="Os Mitadores">
        <meta property="og:type" content="company">
        <meta property="og:url" content="http://osmitadores.github.io/">
        <meta property="og:image" content="myth.png">
        <meta property="og:site_name" content="Os Mitadores">
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="style.css">
        <script type="text/javascript" src="gayQuery.js"></script>
        <script type="text/javascript" src="gayScroll.js"></script>
        <title>MythTest</title>
    </head>
    <body>
        <script type="text/javascript">
            // CUSTOM SCROLLBAR
            // API http://areaaperta.com/nicescroll/
        $(document).ready(function(){ 
            $("html").niceScroll({
                cursorcolor:"#813",
                cursorborder:"2px solid #411",
                cursorwidth:"7px",
                boxzoom:true
            });
        });
        </script>
        <?php
        echo '<div style="text-align:center ;font-family:Mythosmeister; font-size:35px; color:white;">';
        printImg('lecrest',"",""," ");
        echo '<br> THE MYTHBOARD </div>';
        
        
        $PATH = 'https://osmitadores.github.io/assets/';
        $servidor = 'localhost';
        $banco = 'scout_camp';
        $usuario = 'root';
        $senha = '';
        $link = mysql_connect($servidor, $usuario, $senha);
        $db = mysql_select_db($banco, $link);
        if (!$link) {
            echo '<div class="sem_conexao"> Os mitadores foram mitar, volte mais tarde!</div>';
            #exit();
        } else {


#1489576273
            $selectMyth = mysql_query("SELECT * FROM MEMBER");
            while ($myth = mysql_fetch_array($selectMyth)) {
                $crest_id = $myth["Crest_crest_id"];
                $face_id = $myth["face_id"];
                $selectMemberTier = mysql_query("SELECT * FROM MEMBER_HAS_TIER WHERE MEMBER_FACE_ID = $face_id");
                $memberTier = mysql_fetch_array($selectMemberTier);
                $tier_id = $memberTier["Tier_tier_id"];
                $selectTier = mysql_query("SELECT * FROM TIER WHERE TIER_ID = $tier_id");
                $tier = mysql_fetch_array($selectTier);
                $selectCrest = mysql_query("SELECT * FROM CREST WHERE CREST_ID = $crest_id");
                $crest = mysql_fetch_array($selectCrest);



                echo '<div id="tabelas">';
                echo '<table  class="tg" style="table-layout: margin-bottom: 10px; fixed; width: 100%">';
                echo '<colgroup>';
                echo '<col style="width: 50px"><col style="width: 150px">';
                echo '</colgroup>';
                echo '<tr>';
                #<!-- CREST ICON -->
                echo '<th class="crest">';
                printImg($crest["img"], $crest["titulo"], "crestpic");
                echo '</th>';
                #<!-- NAME -->
                echo '<th align="left" class="name" colspan="3">';
                echo $myth["usual_name"];
                echo '</th>';
                #<!-- Espacinho -->
                #<!-- TIER -->
                echo '<th align="left" class="tiername"><span class="tierlevel">', $tier["level"], '</span>Tier: <strong> ', $tier["nome"], ' </strong></th>';
                echo '<th align="right" class="tiericon"> <div> ';
                printImg($tier["img"], $tier["titulo"], "tier");
                echo '</th></tr>';
                echo '<tr>';
                #<!-- PROFILE PIC -->
                echo '<td align="center" class="profilepic" colspan="2" rowspan="5">';
                echo '<a target="_blank" href="https://www.facebook.com/', $myth["face_id"], '">';
                echo '<img class="profile" src="http://graph.facebook.com/', $myth["face_id"], '/picture?width=151&height=151"></a>';

                echo '</td><tr><td HEIGHT="1px" colspan="2"></td></tr>';
                echo '<td class="tg-e3zv"> Badges</td>';
                echo '<td class="tg-031e"></td>';
                echo '<td class="since" align="right"  colspan="3" >Mitando since  <strong class="mythano">Myth Ano</strong></td>';
                echo '</tr><tr>';
                #<!-- BADGES -->
                echo '<td class="badges" id="MythID" colspan="4">';
                echo '</td></tr>';
                echo '<tr><td class="badges"><td class="badges"><td colspan="2" align="right" class="badges2">  <i>Badges Coletadas:</i> <b id="MitoID"></b> </td></tr>';
                echo '</table></div><br>';
            }
        }
        ?>
    </body>
</html>
