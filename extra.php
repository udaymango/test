<?php

//
//foreach (array('a','b','c') as $a) {
//    echo "$a ";
//    foreach (array('a','b','c') as $b) {
//        echo "$b";
//        if ($a == $b) { 
//            break ;  // this will break both foreach loops
//        }
//    }
//}
//echo "done";
//exit;
if (isset($_SESSION['TESTdATA'])) {
        $newArr = $_SESSION['TESTdATA'];
        unset($_SESSION['TESTdATA']);
        foreach ($data as $product => $proValuesData) {

                $sameProduct = FALSE;
                $equal = TRUE;
                foreach ($proValuesData as $key => $cartProducts) {

                        if ($newArr['productId'] == $cartProducts['productId']) {
                                $sameProduct = TRUE;
                                if (count($newArr['extras']) == count($cartProducts['extras'])) {

                                        foreach ($newArr['extras'] as $ekey => $evalue) {
                                                if ($evalue != $cartProducts['extras'][$ekey]) {
                                                        $flag = 1;
                                                }
                                        }
                                        if ($equal == TRUE) {
                                                echo "product exist and equal";
                                                $cartProducts['quantity'] = $cartProducts['quantity'] + $newArr['quantity'];
                                                $proValuesData[$key] = $cartProducts;
                                                break;
                                        } else {
                                                echo "same product & same extra size and not equal";
                                                $proValuesData[] = $cartProducts;
                                                break;
                                        }
                                } else {
                                        echo "same product but diff extras size";
                                        $proValuesData[] = $cartProducts;
                                        break;
                                }
                        }
                }

                if ($flag2 = 3) {
                        $data[$newArr['productId']][] = $newArr;
                }
                $data[$product] = $proValuesData;
        }
        $_SESSION['cart']['pizza'] = $data;
}
dd($data);
?>
<?php
$true = [];
$false = [];
$newArrJson = '{"productName":"MEAT DIVA","productPrice":"23.8","actualPrice":23.8,"productimage":"images\/1415642411Meat-Supreme--Signature.jpg","quantity":"1","eco":"","tax":"","extras":["Size : 10\u2019 Regular \u2013 4 Pax ## 0 ","Crust : HANDTOSSED ## 0 "]}';
$newArr = json_decode($newArrJson, true);
//$newArr = [];
//$data1 = '{"1":[{"productName":"MEAT DIVA","productPrice":"23.8","actualPrice":23.8,"productimage":"images\/1415642411Meat-Supreme--Signature.jpg","quantity":"1","eco":"","tax":"","extras":["Size : 10\u2019 Regular \u2013 4 Pax ## 0 ","Crust : HANDTOSSED ## 0 "]},{"productName":"MEAT DIVA","productPrice":"23.8","actualPrice":23.8,"productimage":"images\/1415642411Meat-Supreme--Signature.jpg","quantity":"1","eco":"","tax":"","extras":["Size : 10\u2019 Regular \u2013 4 Pax ## 0 ","Crust : THIN CRUST ## 0 "]},{"productName":"MEAT DIVA","productPrice":"23.8","actualPrice":23.8,"productimage":"images\/1415642411Meat-Supreme--Signature.jpg","quantity":"3","eco":"","tax":"","extras":["Size : 10\u2019 Regular \u2013 4 Pax ## 0 ","Crust : HANDTOSSED ## 0 "]},{"productName":"MEAT DIVA","productPrice":"23.8","actualPrice":30.8,"productimage":"images\/1415642411Meat-Supreme--Signature.jpg","quantity":"3","eco":"","tax":"","extras":["Size : 12\u2019 Medium \u2013 6 Pax ## 7 ","Crust : HANDTOSSED ## 0 "]}],"2":[{"productName":"GREEK CLASSIC","productPrice":"23.8","actualPrice":23.8,"productimage":"images\/1415642596Greek-classic.jpg","quantity":"3","eco":"","tax":"","extras":["Size : 10\u2019 Regular \u2013 4 Pax ## 0 ","Crust : HANDTOSSED ## 0 "]},{"productName":"GREEK CLASSIC","productPrice":"23.8","actualPrice":23.8,"productimage":"images\/1415642596Greek-classic.jpg","quantity":"2","eco":"","tax":"","extras":["Size : 10\u2019 Regular \u2013 4 Pax ## 0 ","Crust : HANDTOSSED ## 0 "]}]}';
$data1 = '{"1":[{"productName":"MEAT DIVA","productPrice":"23.8","actualPrice":23.8,"productimage":"images\/1415642411Meat-Supreme--Signature.jpg","quantity":"1","eco":"","tax":"","extras":["Size : 10\u2019 Regular \u2013 4 Pax ## 0 ","Crust : HANDTOSSED ## 0 "]},{"productName":"MEAT DIVA","productPrice":"23.8","actualPrice":30.8,"productimage":"images\/1415642411Meat-Supreme--Signature.jpg","quantity":"3","eco":"","tax":"","extras":["Size : 12\u2019 Medium \u2013 6 Pax ## 7 ","Crust : HANDTOSSED ## 0 "]}],"2":[{"productName":"GREEK CLASSIC","productPrice":"23.8","actualPrice":23.8,"productimage":"images\/1415642596Greek-classic.jpg","quantity":"3","eco":"","tax":"","extras":["Size : 10\u2019 Regular \u2013 4 Pax ## 0 ","Crust : HANDTOSSED ## 0 "]}]}';

$data = json_decode($data1, true);
foreach ($data as $product => $proValuesData) {
        $flag = 0;
        foreach ($proValuesData as $key => $cartProducts) {
                if (
                        $newArr['productName'] == $cartProducts['productName'] &&
                        $newArr['actualPrice'] == $cartProducts['actualPrice'] &&
                        count($newArr['extras']) == count($cartProducts['extras'])
                ) {
                        foreach ($newArr['extras'] as $ekey => $evalue) {
//                                echo $evalue.$cartProducts['extras'][$ekey];
                                if ($evalue != $cartProducts['extras'][$ekey]) {
                                        $flag = 1;
                                }
                        }
                        if ($flag != 1) {
                                //                        d($cartProducts);
                                $cartProducts['quantity'] = $cartProducts['quantity'] + $newArr['quantity'];
//                        d($cartProducts);
                                $proValuesData[$key] = $cartProducts;
                        } else {
                                $proValuesData[] = $cartProducts;
                        }
                }
        }
        $data[$product] = $proValuesData;
}
//d($data);
foreach ($data as $product => $proValuesData) {
//              echo $count = count($proValuesData);
        foreach ($proValuesData as $key => $value) {
//                     echo "<br>";
//                    echo
                $quantity = $value['quantity'];
//                   echo "===";
//                   echo $quantity % 2;
//                   echo "<br>";
                if ($quantity > 1) {

                        if ($quantity % 2 == 0) {
                                $value['actualPrice'] = $value['actualPrice'];
                                $true[] = $value;
                        } else {
                                $value['actualPrice'] = $value['actualPrice'];
                                $value['quantity'] = $value['quantity'] - 1;
                                $true[] = $value;
                                $value['actualPrice'] = $value['productPrice'];
                                $value['quantity'] = 1;
                                $false[] = $value;
                        }
                } else {
                        $false[] = $value;
                }
        }
}
//foreach ($false as $fkey => $fvalue) {
//        if (!isset($fvalue['free'])) {
//                d($fvalue);
//        }
//}
//function bubbleSort(array $false) {
$arr = $false;
$sorted = false;
while (false === $sorted) {
        $sorted = true;
        for ($i = 0; $i < count($arr) - 1; ++$i) {
                $current = $arr[$i]['actualPrice'];
//                $currentArr = $arr[$i];
                $next = $arr[$i + 1]['actualPrice'];
//                $nextArr = $arr[$i + 1];
                if ($next < $current) {
                        $arr[$i] = $arr[$i + 1];
                        $arr[$i + 1] = $arr[$i];
                        $sorted = false;
                        echo $next;
                        echo $current;
                } else {
                        echo "$next not gratet than $current";
                }
        }
}

//}
//d($true);
d($false);

//foreach ($false as $fkey => $fvalue) {
////       d($fvalue);
//        
//        foreach ($true as $tkey => $tvalue) {
//                $fflag2 = 0;
//                if (
//                        $fvalue['productName'] == $tvalue['productName'] &&
//                        count($fvalue['extras']) == count($tvalue['extras'])
//                ) {
//
//                        d($fvalue['extras']);
//                        d($tvalue['extras']);
//                        foreach ($fvalue['extras'] as $ekey => $evalue) {
//                                echo $evalue . "=>" . $tvalue['extras'][$ekey] . "<br>";
//                                if ($evalue == $tvalue['extras'][$ekey]) {
//                                        echo $evalue . "=>" . $tvalue['extras'][$ekey] . "smae <br>";
//                                } else {
//                                        $fflag2 = 1;
//                                }
//                        }
//                        if ($fflag2 != 1) {
//
//                                $true[$tkey]['productPrice'] = $true[$tkey]['productPrice'] + $tvalue['productPrice'];
//                        } else {
//                                
//                        }
//                }
//        }
//}
//d($true);
//d($false);
//echo json_encode($data);
//session_destroy();
//header("location:" . URL);

function d($inp = NULL) {
        echo "<pre>";
        print_r($inp);
        echo "</pre>";
}

function dd($inp = NULL) {
        echo "<pre>";
        print_r($inp);
        echo "</pre>";
        exit;
}
?>
<script>
        $("#ddlTravel").change(function () {
        var name = $(this).val();
                $("#ddlType").change(function () {
        var type = $(this).val();
                $.ajax({
                type: "post",
                        url: "Travel.aspx/getData",
                        data: '{"Name":"' + name + '","Type":"' + type + '"}',
                        contentType: "application/json; charset=utf-8",
                        dataType: "json",
                        success: function (TMList) {
                        alert(TMList.d);
                                $('#gvTravel tr').has('td').remove();
                                for (var i = 0; i < TMList.d.length; i++) {
                        $("#gvTravel").append("<tr><td>" + TMList.d[i].TravelsName + "</td>   <td>" + TMList.d[i].BusType + "</td><td>" + TMList.d[i].Seats + "</td></tr>" + TMList.d[i].Price + "</td></tr>");
                        }
                        console.log(TMList.d);
                        },
                        error: function (error) {
                        console.log(error);
                                alert(error.Message);
                        }
                });
                $('#chkAc,#chkNonAc').click(function () {
        var checked = $(this).is('input[name=chkAc,chkNonAc]:checked');
                alert(checked); return false;
        });
</script>
