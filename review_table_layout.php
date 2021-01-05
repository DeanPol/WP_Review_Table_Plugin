<?php

    //======================= Load data from JSON file ==========================//

    // Wordpress allows us to read data from any table in the WordPress database
    // by using the global object $wpdb, an instantiation of the wpdb class.
    global $wpdb; //recommended way of accessing $wpdb in our PHP code.

    $table_name = $wpdb->prefix.'json_data';

    //All data in SQL queries must be SQL-escaped before the SQL query is executed to prevent against
    // SQL injection attacks. The prepare method performs this functionality for WordPress.
    // However, the only SQL query we have here is not injectable since it doesn't take any input.
    $results = $wpdb->get_results("SELECT * FROM $table_name"); //Fetch from our table in our database.

    // json_decode() decodes a JSON string and returns an object, which is easier said than done.
    // Here we must specify that we want to specifically decode the member 'json_object' which actually
    // holds all the information we actually need, since our query above returns a raw string of ugly
    // and incomprehensive data.
    $data = json_decode($results[0]->json_object, true); //When set true, json object is decoded into associative arrays.
    
    // We are currently interested in this list specifically.
    $sorted_object = $data['toplists']['575'];

    // Sort our list based on the key 'position'.
    usort($sorted_object, function($a, $b) {
    return $a['position'] <=> $b['position'];
    });
?>

<!-- ====================== Output page contents ======================= -->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>My Display Table Page</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo plugins_url() . '/review_table/css/style.css'?>">
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
                    foreach($sorted_object as $row_entry)
                    {
                        echo    "<tr>
                                    <td>
                                        <div class=\"LogoImage\"> <img src=" . $row_entry['logo'] . "> </div>
                                        <div id=\"ReviewButton\"><a href=". get_site_url() . "/" . $row_entry['brand_id'] . " class=\"ReviewButton\">Review</a></div>
                                    </td>
                                    <td id=\"Rating\">";
                                    switch($row_entry['info']['rating'])
                                    { // Based on the 'rating' key of our current entry, choose the correct custom image.
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
                                </tr>"; } 
                                
                            ?>
                </tbody>
            </table>
        </div>
    </body>
</html>