<?php
    $strJsonFileContents = file_get_contents("WD_Doc_1.json", __FILE__); //For now, needs to be locally present.
    $json_a = json_decode($strJsonFileContents, true); 
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Review Table Plugin</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="container">
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>Casino</th>
                        <th>Bonus</th>
                        <th>Features</th>
                        <th>Play</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                 $sorted_object = $json_a['toplists']['575'];
                 usort($sorted_object, function($a, $b) {
                     return $a['position'] <=> $b['position'];
                 });
                  foreach($sorted_object as $row_entry)
                  {
                      echo    "<tr>
                                  <td>
                                      <div class=\"LogoImage\"> <img src=" . $row_entry['logo'] . "> </div>
                                      <div id=\"ReviewButton\"><a href=". get_site_url() . "/" . $row_entry['brand_id'] . " class=\"ReviewButton\">Review</a></div>
                                  </td>
                                  <td id=\"Rating\">";
                                  switch($row_entry['info']['rating'])
                                  {
                                      case 1:
                                          echo "<div><img src=" . plugins_url('images/rating_1.png', __FILE__) . "></div>"; 
                                          break;
                                      case 2:
                                          echo "<div><img src=" . plugins_url('images/rating_2.png', __FILE__) . "></div>";
                                          break;
                                      case 3:
                                          echo "<div><img src=" . plugins_url('images/rating_3.png', __FILE__) . "></div>";
                                          break;
                                      case 4:
                                          echo "<div><img src=" . plugins_url('images/rating_4.png', __FILE__) . "></div>";
                                          break;
                                      case 5:
                                          echo "<div><img src=" . plugins_url('images/rating_5.png', __FILE__) . "></div>";
                                          break;
                                      default:
                                          break;
                                  }
                            echo "<div class=\"Bonus\">" . $row_entry['info']['bonus'] . "</div>
                                  </td>
                                  <td>
                                      <div class=\"FeaturesList\">
                                          <ul>";
                                          foreach($row_entry['info']['features'] as $features) {echo "<li> <img src=" . plugins_url('images/check.png', __FILE__) . ">" . $features . "</li>";}
                                    echo "</ul>
                                      </div>
                                  </td>
                                  <td>
                                      <div><a href=" . $row_entry['play_url'] . " class=\"PlayButton\">Play Now</a></div>
                                      <div class=\"TermsNConditions\">" . $row_entry['terms_and_conditions'] . "</div> 
                                  </td>
                              </tr>"; }?>
                </tbody>
            </table>
        </div>
    </body>
</html>