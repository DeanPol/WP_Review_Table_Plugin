<?php
    $strJsonFileContents = file_get_contents("WD_Doc_1.json", __FILE__);
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
                    <tr>
                        <td> <!-- We need to be sure to assign the correct id and class tags for proper and concice css styling options -->
                            <div id="Image"> <img src="<?php echo $json_a['toplists']['575'][0]['logo']?>"> </div>
                            <div><a href=<?php echo get_site_url() . "/". $json_a['toplists']['575'][0]['brand_id']?>>Review</a></div>
                        </td>
                        <td>
                            <div id="Rating">RATINGIMAGE1</div> <!-- The img here will be selected from a pool of custom images, with factor being our 'rating' property -->
                            <div><?php echo $json_a['toplists']['575'][0]['info']['bonus']?></div>
                        </td>
                        <td>
                            <div id="FeaturesList">
                                <ul>
                                    <?php foreach($json_a['toplists']['575'][0]['info']['features'] as $feature){ //for every feature listed in our json object, display it!
                                        echo "<li>" . $feature . "</li>"; } ?>
                                </ul>
                            </div>
                        </td>
                        <td>
                            <?php echo "<div><a href=" . $json_a['toplists']['575'][0]['play_url'] . " class=\"PlayButton\">Play Now</a></div>"?> <!-- Hardcoding in the first entry sure is easy. Need to find an effective way for the rest-->
                            <div id="TermsNConditions"> <?php echo $json_a['toplists']['575'][0]['terms_and_conditions'] ?></div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>