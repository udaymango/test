<?php
$db1 = mysql_connect("localhost", "root", "");
$rv = mysql_select_db("classicmodels", $db1);
$query2 = "SET @s = 0";
mysql_query($query2);
$query = "           
                SELECT
                orders.orderNumber,
                orders.orderDate,
                orders.requiredDate,
                orders.shippedDate,
                orders.`status`,
                orders.comments,
                orders.customerNumber,
                @s := @s + orders.customerNumber as total
                FROM
                        orders
                WHERE
                        orders.orderDate >= '2003-01-01'
                AND orders.orderDate <= '2003-12-01'
                AND orders.comments LIKE 'Cust%';
                ";
				//dsdkfl
$result = mysql_query($query);
echo "<pre>";
while ($data = mysql_fetch_assoc($result)) {
        print_r($data);
}

