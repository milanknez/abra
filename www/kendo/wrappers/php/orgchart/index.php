<?php
require_once '../lib/DataSourceResult.php';
require_once '../lib/Kendo/Autoload.php';

require_once '../include/header.php';

$orgchart = new \Kendo\UI\OrgChart('orgchart');

$orgchart->dataSource(array(
    array('id' => 1, 'name' => "Gevin Bell", 'title' => "CEO", 'expanded' => true, 'avatar' => "../content/web/treelist/people/1.jpg" ),
    array('id' => 2, 'name' => "Clevey Thrustfield", 'title' => "COO", 'expanded' => true, 'avatar' => "../content/web/treelist/people/2.jpg", 'parentId' => 1 ),
    array('id' => 3, 'name' => "Carol Baker", 'title' => "CFO", 'expanded' => true, 'avatar' => "../content/web/treelist/people/3.jpg", 'parentId' => 1 ),
    array('id' => 4, 'name' => "Kendra Howell", 'title' => "CMO", 'expanded' => true, 'avatar' => "../content/web/treelist/people/4.jpg", 'parentId' => 1 ),
    array('id' => 5, 'name' => "Sean Rusell", 'title' => "Financial Manager", 'expanded' => true, 'avatar' => "../content/web/treelist/people/5.jpg", 'parentId' => 3 ),
    array('id' => 6, 'name' => "Steven North", 'title' => "Senior Manager", 'expanded' => true, 'avatar' => "../content/web/treelist/people/6.jpg", 'parentId' => 3 ),
    array('id' => 7, 'name' => "Michelle Hudson", 'title' => "Operations Manager", 'expanded' => true, 'avatar' => "../content/web/treelist/people/7.jpg", 'parentId' => 2 ),
    array('id' => 8, 'name' => "Andrew Berry", 'title' => "Team Lead", 'avatar' => "../content/web/treelist/people/8.jpg", 'parentId' => 5 ),
    array('id' => 9, 'name' => "Jake Miller", 'title' => "Junior Accountant", 'avatar' => "../content/web/treelist/people/9.jpg", 'parentId' => 5 ),
    array('id' => 10, 'name' => "Austin Piper", 'title' => "Accountant", 'avatar' => "../content/web/treelist/people/10.jpg", 'parentId' => 5 ),
    array('id' => 11, 'name' => "Dilyana Newman", 'title' => "Accountant", 'avatar' => "../content/web/treelist/people/11.jpg", 'parentId' => 5 ),
    array('id' => 12, 'name' => "Eva Andrews", 'title' => "Team Lead", 'avatar' => "../content/web/treelist/people/12.jpg", 'parentId' => 6 ),
    array('id' => 13, 'name' => "Elena Austin", 'title' => "Financial Specialist", 'avatar' => "../content/web/treelist/people/13.jpg", 'parentId' => 6 ),
    array('id' => 14, 'name' => "Kaya Nilsen", 'title' => "Team Lead", 'avatar' => "../content/web/treelist/people/14.jpg", 'parentId' => 4 ),
    array('id' => 15, 'name' => "Lora Samuels", 'title' => "Lawyer", 'avatar' => "../content/web/treelist/people/15.jpg", 'parentId' => 4 ),
    array('id' => 16, 'name' => "Lillian Carr", 'title' => "Operator", 'avatar' => "../content/web/treelist/people/17.jpg", 'parentId' => 7 ),
    array('id' => 17, 'name' => "David Henderson", 'title' => "Team Lead", 'avatar' => "../content/web/treelist/people/16.jpg", 'parentId' => 7 )
));

?>

<?php
echo $orgchart->render();
?>

<?php require_once '../include/footer.php'; ?>
