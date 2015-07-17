
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css" media="screen" title="no title" charset="utf-8">
        <title>MythTest</title>
    </head>
    <body>
    <?php
#error_reporting(0);
$PATH = 'http://os-mitadores.lucasflicky.com/files/theme/BADGES/';
$servidor = 'localhost';
$banco    = 'scout_camp';
$usuario  = 'root';
$senha    = '';
$link     = mysql_connect($servidor, $usuario, $senha);
$db          = mysql_select_db($banco,$link);
if(!$link){
    echo "erro ao conectar ao banco de dados!";exit();
}


#1489576273
$selectMyth = mysql_query("SELECT * FROM MEMBER");
while ($myth = mysql_fetch_array($selectMyth)){
    $crest_id = $myth["Crest_crest_id"];
    $selectCrest = mysql_query("SELECT * FROM CREST WHERE CREST_ID = $crest_id");
    $crest = mysql_fetch_array($selectCrest);
    var_dump($crest);
    
    
 echo '<div id="tabelas">';
 echo '<table  class="tg" style="table-layout: margin-bottom: 10px; fixed; width: 100%">';
 echo '<colgroup>';
 echo '<col style="width: 50px"><col style="width: 150px">';
 echo '</colgroup>';
 echo '<tr>';
          #<!-- CREST ICON -->
 echo '<th class="crest">';
 echo '<img class="crestpic" title="',$crest["titulo"],'" src="',$PATH,$crest["img"],'.png">';
 echo '</th>';
          #<!-- NAME -->
 echo '<th align="left" class="name" colspan="3">';
 echo $myth["usual_name"];
 echo '</th>'; 
 #<!-- Espacinho -->
 #<!-- TIER -->
 echo '<th align="left" class="tiername"><span class="tierlevel">TierLevel</span>Tier: <strong> TierNome </strong></th>';
 echo '<th align="right" class="tiericon"> <div><img class="tier" title=" TierTitulo " src="imagemTier.png"></th>';
 echo '</tr>';
 echo '<tr>';
          #<!-- PROFILE PIC -->
 echo '<td align="center" class="profilepic" colspan="2" rowspan="5">';
 echo '<a target="_blank" href="https://www.facebook.com/',$myth["face_id"],'">';
 echo '<img class="profile" src="http://graph.facebook.com/',$myth["face_id"],'/picture?width=151&height=151"></a>';

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
?>
    </body>
</html>
