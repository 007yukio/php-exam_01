<?php

$nissan = new Car(110,"ノート",5);
// $nissan->runFor("名古屋");
// $nissan->refueling();
// $nissan->runFor("名古屋");

class Car {
    private $energy;
    private $max_energy;
    private $cost = 50;
    public $name;
    private $menber = 1;
    public $passenger;

    function __construct(int $max_energy, string $name){
        $this->max_energy = $max_energy;
        $this->name = $name;
    }

    function runFor(string $destination): void{
        if($this->energy < $this->cost){
            print("燃料が不足しています。まず給油してから再度お願いいたします。".PHP_EOL);
        }else{
            print("はい。".$destination."に向かって走ります。シートベルトをしっかりしていてください。");
            echo("燃料残量 = {$this->energy}".PHP_EOL);
            //走った分だけ燃料を減らす。
            $this->energy = $this->energy - $this->cost;
        }
    }

    function refueling():void{
        print("現在給油中です..............".PHP_EOL);
        $this->energy = $this->max_energy;
        print("満タンになりました。".PHP_EOL);
    }

    function add_user(string $passenger): void{
        //5人まで追加できる。追加は一人づつしか追加できない。
        if($this->menber < 5){
            echo "現在{$this->menber}人乗ってます！！".PHP_EOL;

            $this->menber = $this->menber + 1;
            
            echo "{$passenger}さんを追加しました！！".PHP_EOL;
            echo "車に{$this->menber}人乗ってます！！".PHP_EOL;
        }else{
            echo "車に乗れる上限を超えてます。".PHP_EOL;
        }
    }

    function delete_user(int $passengerNo): void{

        if($passengerNo > 4){
            echo "4名までしか降ろせません";
        }else{
            if($this->menber > 1){
                $this->menber = $this->menber - $passengerNo;

                echo "{$passengerNo}人降ろしました。".PHP_EOL;
                echo "現在{$this->menber}人乗っています".PHP_EOL;
    
            }else{
                echo "降ろす人がいません".PHP_EOL;
            }
        }
    }
}

while(true){

    echo "車に乗せますか？（0:乗せる、1:乗せない、2:降ろす、）";
    $userNo = (int)trim(fgets(STDIN));
    echo $userNo;

    if($userNo == 0){
        echo "車に乗せる人の名前は？";
        $username = trim(fgets(STDIN));

        $nissan->add_user($username);
    }else if($userNo == 2){

        echo "何名降ろしますか？".PHP_EOL;
        $passengerNo = (int)trim(fgets(STDIN));
        $nissan->delete_user($passengerNo);
    }

    echo "どうしますか？（0:走る、1:給油する）";

    $input = (int) trim(fgets(STDIN));
    echo $input;

    if($input == 0){
        echo "どこへ向かって走りますか？".PHP_EOL;
        echo "東京 OR 名古屋".PHP_EOL;

        $plce = trim(fgets(STDIN));
        echo "行先:".$plce.PHP_EOL;

        $nissan->runFor($plce);
        $nissan->refueling();
        $nissan->runFor($plce);
    }else{
        $nissan->refueling();
    }

    echo "どうしますか？（0:走る、1:給油する、2:終了する）";
    $input1 = (int) trim(fgets(STDIN));

    switch($input1){
        case 0:
            $nissan->runFor($plce);
            break;
            
        case 1:
            $nissan->refueling();
            break;
        
        case 2:
            echo "車から降ります。".PHP_EOL;
            break 2; //switch while両方から抜ける
    }
}
