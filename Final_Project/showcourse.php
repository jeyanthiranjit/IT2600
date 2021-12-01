<!DOCTYPE html>
<html>
<head>
<style>
th, td { 
border: 1px solid black;
padding: 6px;
}

table {
	border-collapse: collapse;
}
td.register {
	cursor: pointer;
	color: blue;
}		
</style>


<title>Final Project - Registration</title>
<meta charset="utf-8" />
  
	<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
   <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
  

<?php 
 session_start();
		

class Member
{

    private $dbConn;

    private $ds;

    function __construct()
    {
        
        $this->ds = new DataSource();
    }

    function getMemberById($memberId)
    {
        $query = "select * FROM users WHERE id = ?";
        $paramType = "i";
        $paramArray = array($memberId);
        $memberResult = $this->ds->select($query, $paramType, $paramArray);
        
        return $memberResult;
    }
    
    public function processLogin($username, $password) {
        $passwordHash = md5($password);
        $query = "select * FROM users WHERE user_id = ? AND password = ?";
        $paramType = "ss";
        $paramArray = array($username, $password);
        $memberResult = $this->ds->select($query, $paramType, $paramArray);
        if(!empty($memberResult)) {
            $_SESSION["userId"] = $memberResult[0]["id"];
            return true;
        }
    }
}

class DataSource
{

 
    const HOST = 'localhost';

    const USERNAME = 'root';

    const PASSWORD = 'Hariharan@26';

    const DATABASENAME = 'it2600';

    private $conn;

    function __construct()
    {
        $this->conn = $this->getConnection();
    }

    /**
     * If connection object is needed use this method and get access to it.
     * Otherwise, use the below methods for insert / update / etc.
     *
     * @return \mysqli
     */
    public function getConnection()
    {
        $conn = new \mysqli(self::HOST, self::USERNAME, self::PASSWORD, self::DATABASENAME);
        
        if (mysqli_connect_errno()) {
            trigger_error("Problem with connecting to database.");
        }
        
        $conn->set_charset("utf8");
        return $conn;
    }

    /**
     * To get database results
     ** @return array
     */
    public function select($query, $paramType="", $paramArray=array())
    {
        $stmt = $this->conn->prepare($query);
        
        if(!empty($paramType) && !empty($paramArray)) {
            $this->bindQueryParams($stmt, $paramType, $paramArray);
        }
        
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $resultset[] = $row;
            }
        }
        
        if (! empty($resultset)) {
            return $resultset;
        }
    }
    
    /**
     * To insert
      * @return int
     */
    public function insert($query, $paramType, $paramArray)
    {
        print $query;
        $stmt = $this->conn->prepare($query);
        $this->bindQueryParams($stmt, $paramType, $paramArray);
        $stmt->execute();
        $insertId = $stmt->insert_id;
        return $insertId;
    }
    
    /**
     * To get database results
         */
    public function numRows($query, $paramType="", $paramArray=array())
    {
        $stmt = $this->conn->prepare($query);
        
        if(!empty($paramType) && !empty($paramArray)) {
            $this->bindQueryParams($stmt, $paramType, $paramArray);
        }
        
        $stmt->execute();
        $stmt->store_result();
        $recordCount = $stmt->num_rows;
        return $recordCount;
    }
	public function bindQueryParams($stmt, $paramType, $paramArray=array())
    {
        $paramValueReference[] = & $paramType;
        for ($i = 0; $i < count($paramArray); $i ++) {
            $paramValueReference[] = & $paramArray[$i];
        }
        call_user_func_array(array(
            $stmt,
            'bind_param'
        ), $paramValueReference);
    }
}
   
     $sem = $_POST['id'];
	 $sem = trim($sem);
	 
	 $servername = "localhost";
$username = "root";
$password = "Hariharan@26";
$dbname = "it2600";

	 $conn = mysqli_connect($servername, $username, $password, $dbname);
	   $sql2 = "SELECt sections.crn, sections.course_id, courses.title, courses.credit_hrs, room, days, times 
				from sections inner join courses on sections.course_id = courses.course_id
                where sections.semester = '{$sem}'";
      $result = mysqli_query($conn, $sql2);
	  if (! empty($_SESSION["userId"])) {

	 $displayName = '';
	 $displayID='';
    $member = new Member();
    $memberResult = $member->getMemberById($_SESSION["userId"]);
    if(!empty($memberResult[0]["display_name"])) {
        $displayName = ucwords($memberResult[0]["first_name"]);
		$displayID = ucwords($memberResult[0]["user_id"]);
    } else {
        $displayName = $memberResult[0]["first_name"];
		$displayID = $memberResult[0]["user_id"];
    }
	  
	  while($rows = mysqli_fetch_array($result)) {
		  
	  ?>
	  <table>
	  
	  <tr> 
		  <td onclick="addclass('<?php echo $rows['crn']; ?> ', '<?php echo $sem ; ?>', '<?php echo $displayID ?>')" class="register"><i class="fas fa-plus-circle"></i>Register</td>
	      <td><?php echo $rows['crn']; ?> </td>
		  <td><?php echo $rows['course_id']; ?>  </td>
		  <td ><?php echo $rows['title']; ?>  </td>
		  <td><?php echo $rows['credit_hrs']; ?>  </td>
		  <td><?php echo $rows['room']; ?>  </td>
		  <td><?php echo $rows['days']; ?>  </td>
		  <td><?php echo $rows['times']; ?>  </td>
		  
	  </tr>
	  </table>
	  <?php
	  }
	  }  
	   
	   ?>
	   <script>
/* function addclass(crn, semester, userID) {
	window.open('Addclass.php?crn='+ crn + '&semester=' + semester +'&userID=' + userID);
}
 */</script>
	  </head>
	  </html>