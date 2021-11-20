

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
   // require_once './view/dashboard.php';

//namespace Phppot;

//use \Phppot\Member;

if (! empty($_SESSION["userId"])) {
    //require_once __DIR__ . './../class/Member.php';
	 $displayName = '';
    $member = new Member();
    $memberResult = $member->getMemberById($_SESSION["userId"]);
    if(!empty($memberResult[0]["display_name"])) {
        $displayName = ucwords($memberResult[0]["first_name"]);
    } else {
        $displayName = $memberResult[0]["first_name"];
    }


?>
<html>
<head>
<title>User Login</title>
<link href="./view/css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h3>Login Success !</h3>
    <div>
        <div class="dashboard">
            <div class="member-dashboard">Welcome <b><?php echo $displayName; ?></b>, You have successfully logged in!<br>
                Click to <a href="./index.html" class="logout-button">go to main page</a>
            </div>
        </div>
    </div>
</body>
</html>
<?php 
} else {
    //require_once './view/login-form.php';
	echo "Invalid Credentials ";
}
?>