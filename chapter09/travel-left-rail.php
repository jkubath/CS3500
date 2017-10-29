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
           <?php
            sort($continents);
            echo "<ul class='list-group'>";
            foreach($continents as $c => $c_value){
              echo "<li class='list-group-item'><a href='#'>" . $c_value . "</a></li>";
            }
            echo "</ul>";

           ?>
         </div>  <!-- end continents panel -->
         <div class="panel panel-info">
           <div class="panel-heading">Popular Countries</div>
           <?php
            asort($countries);
            echo "<ul class='list-group'>";
            foreach($countries as $c_key => $c_value){
              echo "<li class='list-group-item'><a href='chapter09-project02.php?country=" . $c_key . "'>" . $c_value . "</a></li>";
            }
            echo "</ul>";

           ?>
         </div>  <!-- end countries panel -->
