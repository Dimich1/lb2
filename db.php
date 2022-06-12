<?php

function showPublisher($db)
{
    $statement = $db->distinct("Publisher");
    foreach ($statement as $data) {
        echo "<option value='$data'>$data</option>";
    }
}

function showAuthor($db)
{
    $statement = $db->distinct("Author");
    foreach ($statement as $data) {
        echo "<option value='$data'>$data</option>";
    }
}

function bookByPublisher($db, $publisher)
{
    $statement = $db->find(["literate" => "Book", "Publisher" => "$publisher"]);

    echo "<div id='add'><table style='text-align: center'>";
    $str = "";
    echo "<tr><th>Title</th><th>ISBN</th><th>Publisher</th><th>Year</th><th>Number Of Pages</th></tr>";
    foreach ($statement->toArray() as $value) {
        $str .= "Title {$value['title']} -- ISBN {$value['ISBN']} -- Publisher {$value['Publisher']}<br>";
        echo "
                <tr>
                    <td>{$value['title']}</td>
                    <td>{$value['ISBN']}</td>
                    <td>{$value['Publisher']}</td>
                    <td>{$value['Date']}</td>
                    <td>{$value['Quantity']}</td>
                </tr>
            ";
    }
    echo "</table></div>";
}

function bookByTime($db, $start, $stop)
{
    $start = new \MongoDB\BSON\UTCDateTime(strtotime($start)*1000);
    $stop = new \MongoDB\BSON\UTCDateTime(strtotime($stop)*1000);
    $statement = $db->find(['Date' => ['$gte' => $start, '$lte'=>$stop]]);
    //var_dump($statement->toArray()[0]["Date"]<(string)(strtotime($stop)*1000));

    echo "<div id='add'><table style='text-align: center'>";
    echo "<tr><th>Name</th><th>Date</th><th>Literate</th>";
    foreach ($statement->toArray() as $data){
        echo "
            <tr>
                <td>{$data['title']}</td>
                <td>{$data['Date']}</td>
                <td>{$data['literate']}</td>
            </tr>
        ";
    }
    echo "</table></div>";
}

function bookByAuthor($db, $author)
{
    $statement = $db->find(["literate" => "Book", "Author" => "$author"]);

    echo "<div id='add'><table style='text-align: center'>";
    echo "<tr><th>Title</th><th>ISBN</th><th>Publisher</th><th>Year</th><th>Number Of Pages</th><th>Author</th></th></tr>";
    foreach ($statement->toArray() as $value) {
        echo "
                <tr>
                    <td>{$value['title']}</td>
                    <td>{$value['ISBN']}</td>
                    <td>{$value['Publisher']}</td>
                    <td>{$value['Date']}</td>
                    <td>{$value['Quantity']}</td>
                    <td>{$value['Author']}</td>
                </tr>
            ";
    }
    echo "</table></div>";
}