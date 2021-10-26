<!DOCTYPE html>
<html>

<head>
<?php
// tax amount is 7%
define("TAX", 0.07);


// 1. Add 3 properties to the Book class: $title, $author, and $price. 
class Book {

  private $title;
  private $author;
  private $price;
  
    // 2. Fill-in the following constructor method, so that it assigns values to the properties $title, $author, and $price
    function __construct($title, $author, $price) {
		  $this->title = $title;
		  $this->author = $author;
		  $this->price = $price;

    }

    // 3. Create a method called display(), which outputs a line for the current book with title, author, and price
	
	public function display(){
	
	echo "<br /><b>Title is: </b>". $this->title;
	echo "<br /><b>Author is: </b>".$this->author;
	echo "<br /><b>Price is: </b>".$this->price;
	}
	



// 4. Create a function called get_tax() that calculates the tax using the constant TAX defined above. Return the price * tax amount.

		public function get_tax() {
	          return $this->price * TAX;
		}
}

$book1 = new Book($_POST['book1title'], $_POST['book1author'], $_POST['book1price']);
echo "<b><br />Book1 Details are:- </b><br />";
$book1->display();

// 5. Create a second object called book2. Use the values posted from index.php to assign values to the properties of the book object. Display it.

$book2 = new Book($_POST['book2title'], $_POST['book2author'], $_POST['book2price']);
echo "<b><br /><br />Book2 Details are:- </b><br />";
$book2->display();
// 6. Create variables for $tax, $cost_with_tax. Calculate and display a total cost before tax (both books), tax cost, and total cost with tax.

  $tax1 = $book1->get_tax();
  $tax2 = $book2->get_tax();
  $totalcost = $_POST['book2price'] + $_POST['book1price'];
  $totaltax = $tax1 + $tax2;
  $totalwithtax = $totaltax + $totalcost;
  
  echo "<b><br /><br /><br />Tax for Book1 is: </b>" .$tax1;
  echo "<b><br />Tax for Book2 is: </b>". $tax2;
  echo "<b><br />Total cost before tax(both books) is: </b>". $totalcost;
  echo "<b><br />Total tax cost: </b>". $totaltax;
  echo "<b><br />Total cost with tax: </b>". $totalwithtax;
?>
</head>
<body>
</body>
</html>