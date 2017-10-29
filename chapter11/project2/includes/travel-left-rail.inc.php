         <div class="panel panel-default">
           <div class="panel-heading">Search</div>
           <div class="panel-body">
             <form>
               <div class="input-group">
                  <input type="text" class="form-control" placeholder="search ...">
                  <span class="input-group-btn">
                    <button class="btn btn-warning" type="button"><span class="glyphicon glyphicon-search"></span>          
                    </button>
                  </span>
               </div>  
             </form>
           </div>
         </div>  <!-- end search panel -->       
      
         <div class="panel panel-info">
           <div class="panel-heading">Continents</div>
<!--             style="list-style-type: none" -->
           <ul class="list-group" >  
				<?php 
                while($continent = $continents->fetch()){
                    echo "<li><a href='#'>" . $continent['ContinentName'] . "</a></li>";
                }
             
             ?>

           </ul>
         </div>  <!-- end continents panel -->  
         <div class="panel panel-info">
           <div class="panel-heading">Popular Countries</div>
           <ul class="list-group">  
			<?php 
                while($pop = $popular->fetch()){
                    echo "<li><a href='#'>" . $pop['CountryName'] . "</a></li>";
                }
             
             ?>
  
           </ul>
         </div>  <!-- end countries panel -->    