<?php
    try {
        
        $connString = "mysql:host=localhost;dbname=travels";
        $user ="root";
        $pass = "";
        
        $pdo = new PDO ($connString, $user, $pass);
        $sql = "select * from GeoContinents order by ContinentName";
        $continents = $pdo -> query($sql);
        $sql = "select distinct CountryName from GeoCountries INNER JOIN TravelImageDetails ON GeoCountries.ISO=TravelImageDetails.CountryCodeISO order by GeoCountries.CountryName";
        $popular = $pdo -> query($sql);
        
        
        $sql = "select distinct AsciiName, GeoNameID from GeoCities INNER JOIN TravelImageDetails ON GeoCities.GeoNameID=TravelImageDetails.CityCode order by GeoCities.AsciiName";
        $cityFilter = $pdo -> query($sql);
        $sql = "select distinct CountryName, ISO from GeoCountries INNER JOIN TravelImageDetails ON GeoCountries.ISO = TravelImageDetails.CountryCodeISO order by GeoCountries.CountryName";
        $countryFilter = $pdo -> query($sql);
        
        if(!isSet($_GET['city'])){
            $sql ="select * From TravelImage, TravelImageDetails Where TravelImage.ImageID=TravelImageDetails.ImageID";
            $images = $pdo -> query($sql);
        }
        else {
            $city = $_GET['city'];
            $country = $_GET['country'];
            $sql ="select * From TravelImage, TravelImageDetails Where TravelImage.ImageID=TravelImageDetails.ImageID AND (TravelImageDetails.CountryCodeISO='$country' or TravelImageDetails.CityCode = '$city')";
            $images = $pdo -> query($sql);
        }
        
        $user = "%";
        if(isSet($_GET["search"])){
            $user = $_GET["search"] . "%";
            
        }
        $sql = "select FirstName, LastName, Email, University, City from Customers WHERE LastName LIKE '$user' order by LastName";
        
        $customers = $pdo -> query($sql);
        
        $pdo = null;
    }
    catch(PDOException $e){
        die( $e->getMessage() );
    }

   
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <title>Travel Template</title>
   <?php include 'includes/travel-head.inc.php'; ?>
</head>
<body>

<?php include 'includes/travel-header.inc.php'; ?>
   
<div class="container">  <!-- start main content container -->
   <div class="row">  <!-- start main content row -->
      <div class="col-md-3">  <!-- start left navigation rail column -->
         <?php include 'includes/travel-left-rail.inc.php'; ?>
         
      </div>  <!-- end left navigation rail --> 
      
      <div class="col-md-9">  <!-- start main content column -->
         <ol class="breadcrumb">
           <li><a href="#">Home</a></li>
           <li><a href="#">Browse</a></li>
           <li class="active">Images</li>
         </ol>          
    
         <div class="well well-sm">
            <form class="form-inline" role="form" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
              <div class="form-group" >
                <select class="form-control" name="city">
                  <option value="0">Filter by City</option>
        				<?php 
                        while($city = $cityFilter->fetch()){
                          echo "<option value=" .$city['GeoNameID'] . ">" . $city['AsciiName'] . "</option>";
                        }
                 
                    ?>
    							
                </select>
              </div>
              <div class="form-group">
                <select class="form-control" name="country">
                  <option value="ZZZ">Filter by Country</option>
     				<?php 
                        while($country = $countryFilter->fetch()){
                           $iso = $country['ISO'];
                          echo "<option value=" .$iso . ">" . $country['CountryName'] . "</option>";
                        }
                 
                    ?>
                </select>
              </div>  
              <button type="submit" class="btn btn-primary">Filter</button>
            </form>         
         </div>      <!-- end filter well -->
         
         <div class="well">
            <div class="row">
                <!-- display image thumbnails code here -->
                <?php
                while($picture = $images->fetch()){ 
                		echo "<img src=\"images/travel/square/" . $picture['Path'] . "\" alt=\"image\" />";
                }
                
                ?>
                
                
            </div>
         </div>   <!-- end images well -->

      </div>  <!-- end main content column -->
   </div>  <!-- end main content row -->
</div>   <!-- end main content container -->
   
<?php include 'includes/travel-footer.inc.php'; ?>   

   
   
 <!-- Bootstrap core JavaScript
 ================================================== -->
 <!-- Placed at the end of the document so the pages load faster -->
 <script src="bootstrap3_travelTheme/assets/js/jquery.js"></script>
 <script src="bootstrap3_travelTheme/dist/js/bootstrap.min.js"></script>
 <script src="bootstrap3_travelTheme/assets/js/holder.js"></script>
</body>
</html>