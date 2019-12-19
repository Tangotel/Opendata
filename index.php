
<?php
  $url = "https://data.enseignementsup-recherche.gouv.fr/api/records/1.0/search/?dataset=fr-esr-principaux-diplomes-et-formations-prepares-etablissements-publics&rows=0&sort=-rentree_lib&facet=diplome_lib&facet=typ_diplome_lib&refine.rentree_lib=2017-18";
  $contents = file_get_contents($url);
  $results = json_decode($contents, true);

  $url2 = "https://data.enseignementsup-recherche.gouv.fr/api/records/1.0/search/?dataset=fr-esr-principaux-diplomes-et-formations-prepares-etablissements-publics&rows=0&sort=-rentree_lib&facet=sect_disciplinaire_lib&refine.rentree_lib=2017-18";
  $contents2 = file_get_contents($url2);
  $results2 = json_decode($contents2, true);

  $url3 = "https://data.enseignementsup-recherche.gouv.fr/api/records/1.0/search/?dataset=fr-esr-principaux-diplomes-et-formations-prepares-etablissements-publics&facet=reg_etab_lib&refine.rentree_lib=2017-18";
  $contents3 = file_get_contents($url3);
  $results3= json_decode($contents3, true);

  $url4 = "https://data.enseignementsup-recherche.gouv.fr/api/records/1.0/search/?dataset=fr-esr-principaux-diplomes-et-formations-prepares-etablissements-publics&facet=dep_etab_lib&refine.rentree_lib=2017-18";
  $contents4 = file_get_contents($url4);
  $results4 = json_decode($contents4, true);

  $url5 = "https://data.enseignementsup-recherche.gouv.fr/api/records/1.0/search/?dataset=fr-esr-principaux-diplomes-et-formations-prepares-etablissements-publics&facet=com_etab_lib&refine.rentree_lib=2017-18";
  $contents5 = file_get_contents($url5);
  $results5 = json_decode($contents5, true);

  $url6 = "https://data.enseignementsup-recherche.gouv.fr/api/records/1.0/search/?dataset=fr-esr-principaux-diplomes-et-formations-prepares-etablissements-publics&facet=aca_etab_lib&refine.rentree_lib=2017-18";
  $contents6 = file_get_contents($url6);
  $results6 = json_decode($contents6, true);

  $url7 = "https://data.enseignementsup-recherche.gouv.fr/api/records/1.0/search/?dataset=fr-esr-principaux-diplomes-et-formations-prepares-etablissements-publics&facet=etablissement_lib&refine.rentree_lib=2017-18";
  $contents7 = file_get_contents($url7);
  $results7 = json_decode($contents7, true);

?>


<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link rel="stylesheet" type="text/css" href="css/MyStyles.css">
    <link rel="stylesheet" type="text/css" href="css/button.css">
    <link rel="stylesheet" type="text/css" href="css/Content.css">
    <link rel="stylesheet" type="text/css" href="css/Animations.css">

    <script type="text/javascript" src="js/MyScript.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>

    <title>OpenDataProject</title>
  </head>

  <body>

    <video id="bgvid" playsinline autoplay muted loop>
      <source src="vid/1.mp4" type="video/mp4">
    </video>

    <headbanner>
      <h class="center1">Nom du site</h>
    </headbanner>

    <div class="topnav">
      <div class="search-container">
        <form>
          <input type="text" placeholder="Rechercher.." name="search">
        </form>
      </div>
    </div>

    <div id="home" >
      <div id="filters">
        <div id="container-1" class="tab">
          <div onclick="openFilter(event, 'diplome')" class="btn btn-two tablinks">
            <span>Diplome</span>
          </div>
          <div onclick="openFilter(event, 'formation')" class="btn btn-two tablinks">
            <span>Formation</span>
          </div>
          <div onclick="openFilter(event, 'region')" class="btn btn-two tablinks">
            <span>Région</span>
          </div>
          <div onclick="openFilter(event, 'departement')" class="btn btn-two tablinks">
            <span>Département</span>
          </div>
          <div onclick="openFilter(event, 'ville')" class="btn btn-two tablinks">
            <span>Ville</span>
          </div>
          <div onclick="openFilter(event, 'academie')" class="btn btn-two tablinks">
            <span>Académie</span>
          </div>
          <div onclick="openFilter(event, 'etablissement')" class="btn btn-two tablinks">
            <span>Etablissement</span>
          </div>
        </div>



        <div id="container-2">
          <form method="post" action="index.php">
            <div id="diplome" class="tabcontent">

                <?php
                $x = 0;
                foreach ($results["facet_groups"][0]["facets"] as $diplome) {
                  printf("<div class='checkbox'><input type='checkbox' id='diplome' name='checkboxdiplome".$x."' value=\"%s\"><label for=\"%s\">%s</label></div>",$diplome["name"],$diplome["name"],$diplome["name"]);
                  $x = $x+1;
                }
                ?>

            </div>

            <div id="formation" class="tabcontent">

                <?php
                $x = 0;
                foreach ($results2["facet_groups"][0]["facets"] as $formation) {
                  printf("<div class='checkbox'><input type='checkbox' id='formation' name='checkboxformation".$x."' value=\"%s\"><label for=\"%s\">%s</label></div>",$formation["name"],$formation["name"],$formation["name"]);
                  $x = $x+1;
                }
                ?>

            </div>

            <div id="region" class="tabcontent">

                <?php
                $x = 0;
                foreach ($results3["facet_groups"][0]["facets"] as $region) {
                  printf("<div class='checkbox'><input type='checkbox' id='region' name='checkboxregion".$x."' value=\"%s\"><label for=\"%s\">%s</label></div>",$region["name"],$region["name"],$region["name"]);
                  $x = $x+1;
                }
                ?>

            </div>

            <div id="departement" class="tabcontent">

                <?php
                $x = 0;
                foreach ($results4["facet_groups"][0]["facets"] as $departement) {
                  printf("<div class='checkbox'><input type='checkbox' id='departement' name='checkboxdepartement".$x."' value=\"%s\"><label for=\"%s\">%s</label></div>",$departement["name"],$departement["name"],$departement["name"]);
                  $x = $x+1;
                }
                ?>

            </div>

            <div id="ville" class="tabcontent">

                <?php
                $x = 0;
                foreach ($results5["facet_groups"][0]["facets"] as $ville) {
                  printf("<div class='checkbox'><input type='checkbox' id='ville' name='checkboxville".$x."' value=\"%s\"><label for=\"%s\">%s</label></div>",$ville["name"],$ville["name"],$ville["name"]);
                  $x = $x+1;
                }
                ?>

            </div>

            <div id="academie" class="tabcontent">

                <?php
                $x = 0;
                foreach ($results6["facet_groups"][1]["facets"] as $academie) {
                  printf("<div class='checkbox'><input type='checkbox' id='academie' name='checkboxacademie".$x."' value=\"%s\"><label for=\"%s\">%s</label></div>",$academie["name"],$academie["name"],$academie["name"]);
                  $x = $x+1;
                }
                ?>

            </div>

            <div id="etablissement" class="tabcontent">

                <?php
                $x = 0;
                foreach ($results7["facet_groups"][0]["facets"] as $etablissement) {
                  printf("<div class='checkbox'><input type='checkbox' id='etablissement' name='checkboxetablissement".$x."' value=\"%s\"><label for=\"%s\">%s</label></div>",$etablissement["name"],$etablissement["name"],$etablissement["name"]);
                  $x = $x+1;
                }
                ?>

            </div>

          </form>

        </div>

        <div id="checkboxvalue">
          <?php
          echo $_POST["checkboxetablissement1"];
          ?>
          Votre sélection :
          <p></p>
        </div>

      </div>

      <div class="contents">
        <table>
          <tr id="head">
            <th>Diplome</th>
            <th>Formation</th>
            <th>Région</th>
            <th>Département</th>
            <th>Ville</th>
            <th>Académie</th>
            <th>Etablissement</th>
            <th>Description</th>
          </tr>

          <?php



          //$urltab1 = "https://data.enseignementsup-recherche.gouv.fr/explore/dataset/fr-esr-principaux-diplomes-et-formations-prepares-etablissements-publics/download/?format=json&refine.rentree_lib=2017-18";
          $contentstab1 = file_get_contents($urltab1);
          $tab = json_decode($contentstab1, true);

          $color = true;
          foreach ($tab as $value) {
              if ($color == true) {
                echo "<tr id='first'>";
                  echo "<td>";
                  print($value['fields']['typ_diplome_lib']);
                  echo "</td>";
                  echo "<td>";
                  print($value['fields']['discipline_lib']);
                  echo "</td>";
                  echo "<td>";
                  print($value['fields']['reg_etab_lib']);
                  echo "</td>";
                  echo "<td>";
                  print($value['fields']['dep_etab_lib']);
                  echo "</td>";
                  echo "<td>";
                  print($value['fields']['com_etab_lib']);
                  echo "</td>";
                  echo "<td>";
                  print($value['fields']['aca_etab_lib']);
                  echo "</td>";
                  echo "<td>";
                  print($value['fields']['etablissement_lib']);
                  echo "</td>";
                  echo "<td><button>test</button></td>";
                echo "</tr>";
                $color = false;
              } else {
                echo "<tr id='second'>";
                  echo "<td>";
                  print($value['fields']['typ_diplome_lib']);
                  echo "</td>";
                  echo "<td>";
                  print($value['fields']['discipline_lib']);
                  echo "</td>";
                  echo "<td>";
                  print($value['fields']['reg_etab_lib']);
                  echo "</td>";
                  echo "<td>";
                  print($value['fields']['dep_etab_lib']);
                  echo "</td>";
                  echo "<td>";
                  print($value['fields']['com_etab_lib']);
                  echo "</td>";
                  echo "<td>";
                  print($value['fields']['aca_etab_lib']);
                  echo "</td>";
                  echo "<td>";
                  print($value['fields']['etablissement_lib']);
                  echo "</td>";
                  echo "<td><button>test</button></td>";
                echo "</tr>";
                $color = true;
              }
          }
          ?>

        </table>
      </div>
    </div>

    <footer>
      <button>A propos</button>
      <button>Aide</button>
    </footer>

  </body>

  <script>
    $(window).ready(function(){
    $(".boton").wrapInner('<div class=botontext></div>');

    $(".botontext").clone().appendTo( $(".boton") );

    $(".boton").append('<span class="twist"></span><span class="twist"></span><span class="twist"></span><span class="twist"></span>');

    $(".twist").css("width", "25%").css("width", "+=3px");
    });

    function openFilter(evt, filter) {
      document.getElementById("container-1").style.float="left";
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(filter).style.display = "block";
      evt.currentTarget.className += " active";
    }

    $('input').on('click', function(){
      var tab = [];

      $.each($('input:checked'), function() {
        tab.push($(this).val());
      });

      $('p').text(tab.join(" - "));
    });

  </script>
</html>
