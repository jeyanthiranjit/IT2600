<?php
require_once('database.php');

// Get course ID
if (!isset($ourse_id)) {
    $course_id = filter_input(INPUT_GET, 'course_id', 
            FILTER_VALIDATE_INT);
			 if ($course_id == NULL || $course_id == FALSE) {
        $course_id = 'IT-1025';
    }
}
// Get title for selected course
$queryCourses = 'SELECT * FROM courses WHERE course_id = :course_id';
$statement1 = $db->prepare($queryCourses);
$statement1->bindValue(':course_id', $course_id);
$statement1->execute();

$course =  $statement1->fetch();
$course_ID = $course['course_id'];
$course_title = $course['title'];
$course_description = $course['description'];
$course_prerequisite = $course['prerequisites'];
$statement1->closeCursor();


// Get all courses
$query = 'SELECT * FROM `courses` order by course_id;';
$statement = $db->prepare($query);
$statement->execute();
$courses = $statement->fetchAll();
$statement->closeCursor();

// Get products for selected category
$queryProducts = 'SELECT description FROM courses
                  WHERE course_id = :course_id
                  ORDER BY course_id';
$statement3 = $db->prepare($queryProducts);
$statement3->bindValue(':course_id', $course_id);
$statement3->execute();
$description = $statement3->fetchAll();
$statement3->closeCursor();
?>
<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>Courses in IT1150</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<!-- the body section -->
<body>
<header><h1>My Course List</h1></header>
<main>
    <h1>Course List</h1>

    <aside>
          
    </aside>

    <section>
        <!-- display a table of products -->
        <h2><?php echo $course_title; ?></h2>
        <table>
            <tr>
				<th>course ID</th>
                <th>title</th>
                <th>credit hrs</th>
				<th>description</th>
				<th>Prerequites</th>
                <th>&nbsp;</th>
            </tr>

            <?php foreach ($courses as $course) : ?>
            <tr>
                <td><?php echo $course['course_id']; ?></td>
                <td><?php echo $course['title']; ?></td>
				 <td><?php echo $course['credit_hrs']; ?></td>
				<td><?php echo $course['description']; ?></td>
				<td><?php echo $course['prerequisites']; ?></td>
            
                
            </tr>
            <?php endforeach; ?>
        </table>
             
    </section>
</main>
<footer>
    <p>&copy; <?php echo date("Y"); ?> My Tri-C, Inc.</p>
</footer>
</body>
</html>