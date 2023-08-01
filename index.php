<?php
require_once('fpdf186/fpdf.php'); 
// Retrieving form data
$name = $_POST['name'];
$email = $_POST['email'];
$dob = $_POST["dob"];
    $phone = $_POST["phone"];
    $html = $_POST['html'];
    $css = $_POST['css'];
    $js = $_POST['js'];
    $php = $_POST['php'];
    $sql = $_POST['sql'];
     $highSchool = $_POST['high_school'];
     $diploma = $_POST['diploma'];
     $maxEducation = $_POST['max_education'];
     $bachelor_degree = isset($_POST["bachelor_degree"]) ? $_POST["bachelor_degree"] : '';
     $master_degree = isset($_POST["master_degree"]) ? $_POST["master_degree"] : '';
     $hobbies = $_POST["Hobbies"];
$language1 = $_POST['Language1'];
$language2 = $_POST['Language2'];
$about = $_POST['about'];
$personal_url = $_POST['personal_url'];

// Generating PDF
$pdf = new FPDF();
    $pdf->AddPage();

     // Setting background color
     $pdf->SetFillColor(255, 255, 255); 

     // Filling the entire page with black color
     $pdf->Rect(0, 0, $pdf->GetPageWidth(), $pdf->GetPageHeight(), 'F');
 
     // Seting the background area 
     $pdf->SetFillColor(0,0,0); 
     $pdf->Rect(0, 0, $pdf->GetPageWidth() * 0.3, $pdf->GetPageHeight(), 'F');
 
    
$pdf->SetTextColor(255, 255, 255);


$pdf->SetX(5);
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, 'Skills Section', 0, 1);


function displayRangeBar($rating)
{
    global $pdf;
    $barWidth = $rating * 0.5; 
    $barHeight = 6; 
    $pdf->SetDrawColor(0, 0, 0); 
    $pdf->SetFillColor(135, 206, 250); 
    $pdf->Rect($pdf->GetX(), $pdf->GetY(), $barWidth, $barHeight, 'F');
}

$pdf->SetX(5);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, "HTML: $html", 0, 1);
$pdf->SetX(5);
displayRangeBar($html);

$pdf->Ln(10);

$pdf->SetX(5);
$pdf->Cell(0, 10, "CSS: $css", 0, 1);
$pdf->SetX(5);
displayRangeBar($css);

$pdf->Ln(10);

$pdf->SetX(5);
$pdf->Cell(0, 10, "JavaScript: $js", 0, 1);
$pdf->SetX(5);
displayRangeBar($js);

$pdf->Ln(10);

$pdf->SetX(5);
$pdf->Cell(0, 10, "PHP: $php", 0, 1);
$pdf->SetX(5);
displayRangeBar($php);

$pdf->Ln(10);

$pdf->SetX(5);
$pdf->Cell(0, 10, "SQL: $sql", 0, 1);
$pdf->SetX(5);
displayRangeBar($sql);

$pdf->Ln(10);
$pdf->Ln(20);

$pdf->SetX(5);
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, 'Hobbies', 0, 1);
$pdf->SetX(5);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, "$hobbies", 0, 1);

if (!empty($language1) || !empty($language2)) {
    $pdf->Ln(10);
    $pdf->SetX(5);
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(0, 10, 'Languages', 0, 1);
    $pdf->SetX(5);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, "Language1: $language1", 0, 1);
    if (!empty($language2)) {
        $pdf->SetX(5);
        $pdf->Cell(0, 10, "Language2: $language2", 0, 1);
    }
}



 $rightSideX = $pdf->GetPageWidth() * 0.35;
 $rightSideY = 5; // Set the Y position to 15 
 $pdf->SetXY($rightSideX,$rightSideY);
 $pdf->SetTextColor(0, 0, 0);
 $pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Portfolio', 0, 1, 'C');
$pdf->Ln(10);
$pdf->SetFont('Arial', '', 12);
$pdf->SetX($rightSideX);
 $pdf->Cell(0, 10, "Name: $name", 0, 1);
 
 $pdf->SetX($rightSideX);
 $pdf->Cell(0, 10, "Email: $email", 0, 1);
 
 $pdf->SetX($rightSideX);
 $pdf->Cell(0, 10, "Date of Birth: $dob", 0, 1);
 
 $pdf->SetX($rightSideX);
 $pdf->Cell(0, 10, "Phone Number: $phone", 0, 1);

 $pdf->SetX($rightSideX);
 $pdf->SetFont('Arial', 'B', 14);
 $pdf->Cell(0, 10, 'Educational Background', 0, 1);
 


 
 $pdf->SetX($rightSideX);
 $pdf->SetFont('Arial', '', 12);
 $pdf->Cell(0, 10, "High School: $highSchool", 0, 1);
 
 // Addind some space between High School and Diploma 
 if (!empty($diploma)) {
     $pdf->Ln(10);
     $pdf->SetX($rightSideX);
     $pdf->Cell(0, 10, "Diploma: $diploma", 0, 1);
 }
 
 $pdf->Ln(10);
 $pdf->SetX($rightSideX);
 $pdf->Cell(0, 10, "Max Education: $maxEducation", 0, 1);
    
 $pdf->Ln(10);
$pdf->SetX($rightSideX);
$pdf->Cell(0, 10, "Bachelor's Degree: $bachelor_degree", 0, 1);
$pdf->Ln(10);
$pdf->SetX($rightSideX);
$pdf->Cell(0, 10, "Master's Degree: $master_degree", 0, 1);

$pdf->Ln(10);
$pdf->SetX($pdf->GetPageWidth() * 0.35);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, "About MySelf: $about", 0, 1,);

$pdf->Ln(10);
$pdf->SetX($pdf->GetPageWidth() * 0.35);
$pdf->Cell(0, 10, "Personal Website URL: $personal_url", 0, 1);

       
 // Storing user data in MySQL database
 $servername = "localhost";
 $username = "root"; 
 $password = ""; 
 $dbname = "portifolio_data"; 

 // Createing a connection to the database
 $conn = new mysqli($servername, $username, $password, $dbname);

 // Checking connection
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }

 // Inserting user data into the database
 $sql = "INSERT INTO user_data (name, email, PhoneNo) VALUES ('$name', '$email', '$phone')";



 if ($conn->query($sql) === TRUE) {
    echo "User data stored successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


// Output of PDF as a downloadable file
$pdf->Output('portfolio.pdf', 'F');

// Displaying portfolio on the webpage
echo "<h2>Your Portfolio:</h2>";
echo "<embed src='portfolio.pdf' type='application/pdf' width='100%' height='100%'>";


echo "<div id='download-button-container'>";
echo "<a href='portfolio.pdf' download='portfolio.pdf' id='download-button'>Download Portfolio PDF</a>";
echo "</div>";
?>
