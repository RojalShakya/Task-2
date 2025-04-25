<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArrayController extends Controller
{
    //
 public $people = [
        [
            "city" => "Tokyo",
            "country" => "Japan",
            "name" => "Haruto Tanaka",
            "gender" => "Male",
            "age" => 34,
            "fav_food" => "Sushi",
            "hobby" => "Photography"
        ],
        [
            "city" => "Paris",
            "country" => "France",
            "name" => "Sophie Dubois",
            "gender" => "Female",
            "age" => 29,
            "fav_food" => "Crème Brûlée",
            "hobby" => "Photography"
        ],
        [
            "city" => "New York",
            "country" => "USA",
            "name" => "Michael Rodriguez",
            "gender" => "Male",
            "age" => 42,
            "fav_food" => "Pizza",
            "hobby" => "Music"
        ],
        [
            "city" => "Melbourne",
            "country" => "Australia",
            "name" => "Emma Wilson",
            "gender" => "Female",
            "age" => 31,
            "fav_food" => "Seafood",
            "hobby" => "Surfing"
        ],
        [
            "city" => "Cairo",
            "country" => "Egypt",
            "name" => "Ahmed Hassan",
            "gender" => "Male",
            "age" => 27,
            "fav_food" => "Koshari",
            "hobby" => "Photography"
        ],
        [
            "city" => "Berlin",
            "country" => "Germany",
            "name" => "Lisa Müller",
            "gender" => "Female",
            "age" => 34,
            "fav_food" => "Schnitzel",
            "hobby" => "Hiking"
        ],
        [
            "city" => "Mumbai",
            "country" => "India",
            "name" => "Raj Patel",
            "gender" => "Male",
            "age" => 33,
            "fav_food" => "Butter Chicken",
            "hobby" => "Cricket"
        ],
        [
            "city" => "Stockholm",
            "country" => "Sweden",
            "name" => "Elsa Johansson",
            "gender" => "Female",
            "age" => 26,
            "fav_food" => "Seafood",
            "hobby" => "Ice Skating"
        ],
        [
            "city" => "São Paulo",
            "country" => "Brazil",
            "name" => "Carlos Silva",
            "gender" => "Male",
            "age" => 29,
            "fav_food" => "Feijoada",
            "hobby" => "Soccer"
        ],
        [
            "city" => "Seoul",
            "country" => "South Korea",
            "name" => "Min-ji Kim",
            "gender" => "Female",
            "age" => 24,
            "fav_food" => "Sushi",
            "hobby" => "K-pop Dancing"
        ],
        [
            "city" => "New York",
            "country" => "USA",
            "name" => "David Chen",
            "gender" => "Male",
            "age" => 41,
            "fav_food" => "Pizza",
            "hobby" => "Photography"
        ],
        [
            "city" => "Moscow",
            "country" => "Russia",
            "name" => "Anastasia Ivanova",
            "gender" => "Female",
            "age" => 35,
            "fav_food" => "Borscht",
            "hobby" => "Chess"
        ],
        [
            "city" => "Barcelona",
            "country" => "Spain",
            "name" => "Javier Moreno",
            "gender" => "Male",
            "age" => 37,
            "fav_food" => "Paella",
            "hobby" => "Music"
        ],
        [
            "city" => "Vancouver",
            "country" => "Canada",
            "name" => "Emily Chen",
            "gender" => "Female",
            "age" => 28,
            "fav_food" => "Poutine",
            "hobby" => "Hiking"
        ],
        [
            "city" => "Dubai",
            "country" => "UAE",
            "name" => "Omar Al-Farsi",
            "gender" => "Male",
            "age" => 32,
            "fav_food" => "Seafood",
            "hobby" => "Desert Racing"
        ],
        [
            "city" => "Dublin",
            "country" => "Ireland",
            "name" => "Aoife Murphy",
            "gender" => "Female",
            "age" => 30,
            "fav_food" => "Irish Stew",
            "hobby" => "Music"
        ],
        [
            "city" => "Bangkok",
            "country" => "Thailand",
            "name" => "Somchai Suwannapong",
            "gender" => "Male",
            "age" => 36,
            "fav_food" => "Pad Thai",
            "hobby" => "Muay Thai"
        ],
        [
            "city" => "Amsterdam",
            "country" => "Netherlands",
            "name" => "Eva Bakker",
            "gender" => "Female",
            "age" => 27,
            "fav_food" => "Stroopwafel",
            "hobby" => "Cycling"
        ],
        [
            "city" => "Mexico City",
            "country" => "Mexico",
            "name" => "Luis Fernandez",
            "gender" => "Male",
            "age" => 34,
            "fav_food" => "Tacos",
            "hobby" => "Dancing"
        ],
    ];
public function getData(){

    $young=[];
    $nationality=[];
    $hobby=[];
    foreach($this->people as $person)
    {
        if($person['age']< 30)
        $young[]=$person;

    }
    foreach($this->people as $person){
        if($person['country']=="USA" || $person['country']=="Brazil"){
            $nationality[]=$person;
        }
    }
    foreach($this->people as $person){
        if($person['hobby']=="Music" || $person['hobby']=="Dancing"){
            $hobby[]=$person;
        }
    }
    // $final=array_merge($nationality,$hobby,$young);
    $final=[
        'young'=>$young,
        'nationality'=>$nationality,
        'hobby'=>$hobby
    ];

     return $final;

    // return $young;
}
public function palindrome($number){
    if($number!="")
    $reverse=strrev($number);
    if($reverse==$number){
        echo "Palindrome";
    }
    else{

        echo "Not Palindrome";
    }


}
public function length($sentence){

    $arr=explode(" ",$sentence);
    // dd($arr);
    $count=count($arr);
    // dd($count);
    $length=strlen(string:end($arr));
    dd($length);

}
public function checkEmail(){
    $valid=[];
    $users = [
        ['name' => 'John Doe', 'email' => 'john@example.com'],
        ['name' => 'Jane Smith', 'email' => 'jane@example.com'],
        ['name' => 'Mike Johnson', 'email' => 'mike@gmail.com'],
        ['name' => 'Anna Lee', 'email' => 'anna@example.com']
    ];
    foreach($users as $user){
        if((substr(strchr($user['email'],'@'),1)==='example.com')){
            $valid[]=$user['name'];
        }
    }
    return $valid;
}


//  public function uniqueIdentify($array) {
//     $unique = [];
//     $new=[];
//     foreach ($array as $item) {

//        if(isset($unique[$item])){
//         continue;
//        }

//         $unique[$item]=1;
//     }
//     return $unique;

// }
public function uniqueIdentify($array) {
    $seen = [];
    $unique = [];

    foreach ($array as $item) {
        if (isset($seen[$item])) {
           continue;
        }
        $seen[$item]=true;
        $unique[]=$item;
    }

    return $unique;
}

public function checkValue(){
    $array=[10];
    $value=$this->uniqueIdentify($array);
    echo($value);

}
// public function secondlargest(){
//     $unique=$this->uniqueIdentify();
//     $max=null;
//     $secondMax=null;
//     if(count($unique)<2){
//         return null;
//     }
//     foreach($unique as $num){
//         if($num>$max){
//             $secondMax=$max;
//             $max=$num;
//         }elseif($num> $secondMax && $num!==$max){
//             $secondMax=$num;
//         }
//     }


//     echo $secondMax;
// }





}
