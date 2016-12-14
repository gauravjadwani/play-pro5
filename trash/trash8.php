 <?php
               /* print_r($task_details_array);
                exit();*/

              for($i=0;$i<count($task_details_array);$i++)
              {

             /*echo 'count is '.count($task_details_array).'<br>';*/
             echo '<tr>';
                  for($j=0;$j<count($task_details_array[$i]);$j++)

                  {
                        if($j==8)
                        {
                print '<td><button type="button" class="btn btn-info btn-sm" onclick="projectid(this.id)" data-toggle="modal" data-target="#myModal" value="" id="" ng-init="false" ng-disabled="">DELETE</button></td>'; 

                        }
                        else
                        {
                      echo '<td>'.$task_details_array[$i][$j].'</td>';
                        }
                  }
                  echo '</tr>';

               


              }

           ?>
      