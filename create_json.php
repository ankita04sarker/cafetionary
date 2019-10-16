 <?php  
 require_once('admin/db/connect.php');
 final class createJson{  
      public static function get_data() {  
            global $pdo;
            $sql="SELECT * FROM foods";
            $qry=$pdo->prepare($sql);
            $qry->execute();
            $rslt=$qry->fetch(PDO::FETCH_BOTH);
            //print_r($rslt);
            while($row = $qry->fetch(PDO::FETCH_BOTH)){  
                 $categories[] = array(  
                      'id'        =>  $row['id'],
                      'name'      =>  $row["name"],  
                      'price'     =>  $row["price"],  
                      'image'     =>  $row["image"],
                      'type'      =>  $row['type']
                 );  
            }  
      return json_encode($categories);   
      }  
       
}
 ?> 