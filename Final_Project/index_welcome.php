

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


?>
<html>
<head>
<title>User Login</title>
<link href="./view/css/style.css" rel="stylesheet" type="text/css" />
</head>
<style>
  a.logout-button {
    color: #09f;
}
</style>
<body>
<h3>Login Success !</h3>
    <div>
        <div class="dashboard">
            <div class="member-dashboard">Welcome <b><?php echo $displayName; ?></b>, You have successfully logged in!<br><br />
			Your User ID is - <b><?php echo $displayID; ?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Click to <a href="./logout.php" class="logout-button">Logout</a><br /><br />
                Click to &nbsp;&nbsp;&nbsp;<a href="./index.html" class="logout-button">go to main page</a>&nbsp;&nbsp;&nbsp;
				<a href="./schedule.php" class="logout-button">Registration</a>&nbsp;&nbsp;&nbsp;
						<a href="./activities.php" class="logout-button">Student Clubs</a>&nbsp;&nbsp;&nbsp;
				<a href="./sections.php" class="logout-button">Available Sections</a><br /><br />
				Click to <a href="./logout.php" class="logout-button">Logout</a>
            </div>
        </div>
    </div>
</body>
</html>
<?php 
} else {
    //require_once './view/login-form.php';
	echo "Invalid Credentials ";
	?>
	<br /><a href="./login.php" class="logout-button">Go back to Login Page</a>
	<?php
}
?>