<?php include('header.php');?>

<?php
$csv = array_map('str_getcsv', file('https://raw.githubusercontent.com/macarenapardo/csvtop10/master/top10.csv'));
      array_walk($csv, function(&$a) use ($csv) {
      $a = array_combine($csv[0], $a);
      });
      array_shift($csv);
?>

<main role="main" class="container">
<h1 class="mb-4">My Top 10 movies (on Netflix)</h1>
<div class="row">

<?php for($t = 0; $t < count($csv); $t++){?>
    <div class="col-sm-4 col-md-3 py-3">
    <h3 class="border-top pt-3"><?php print($csv[$t]['date'])?></h3>
    
    <figure style="height:120px; overflow:hidden;">
    
    <img src="
    <?php if ($csv[$t]['image'] == NULL){
        print ("img/gris.png");
    } else {
        print ($csv[$t]['image']);
    };?>" 

    class="img-fluid">
    </figure>

    <?php if ($csv[$t]['name'] == NULL){
        print '<h5><a href="'.($csv[$t]['link']).'">'.($csv[$t]['location']).'</a></h5>';
    } else {
        print '<h5><a href="'.($csv[$t]['link']).'">'.($csv[$t]['name']).'</a></h5>';
    }?>

    <p class="border-top pt-3"><?php print($csv[$t]['description'])?></p>
    <b><p class="border-top pt-3"><?php print($csv[$t]['length'])?></p></b>

    </div>
<?php };?>
</div>

</main>
<?php include('footer.php');?>