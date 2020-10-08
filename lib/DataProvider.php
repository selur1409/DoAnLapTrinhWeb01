<?php
class DataProvider
{
    public static function ExecuteQuery($sql)
    {
        $connection = mysqli_connect('localhost','root','','shoesshop') or die ("couldn't connect to localhost");
        mysqli_query($connection,"set name 'utf-8'");
        $result = mysqli_query($connection,$sql);
        mysqli_close($connection);
        return $result;
    }
    public static function ChangeURL($path)
    {
        echo '<script type = "text/javascript">';
        echo 'location = "'.$path.'";';
        echo '</script>';
    }
}
?>