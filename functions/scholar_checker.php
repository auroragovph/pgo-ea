<?php

if (!function_exists('scholar_checker')) {

    function scholar_checker(array $post): int
    {

        $con = mysqli_connect("localhost", "root", "", "e_assis");

        if (mysqli_connect_errno()) {
            echo "Connection Fail try to contact your Developer" . mysqli_connect_error();
        }

        $first_name = $post['fname'];
        $last_name  = $post['lname'];

        $sql = "SELECT * FROM `scholar` WHERE `fname` LIKE '{$first_name}' AND `lname` LIKE '{$last_name}'";

        $result = $con->query($sql);

        $result = $result->num_rows;

        return $result;
    }

}
