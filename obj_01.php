<?php

$nissan = new Car(110,"ノート");
$nissan->runFor("名古屋");
$nissan->refueling();
$nissan->runFor("名古屋");

class Car {
    private $energy;
    private $max_energy;
    private $cost = 50;
    public $name;

    function __construct(int $max_energy, string $name){
        $this->max_energy = $max_energy;
        $this->name = $name;
    }

    function runFor(string $destination): void{
        if($this->energy < $this->cost){
            print("燃料が不足しています。まず給油してから再度お願いいたします。".PHP_EOL);
        }else{
            print("はい。".$destination."に向かって走ります。シートベルトをしっかりしていてください。燃料残量 = {$this->energy}".PHP_EOL);
            //走った分だけ燃料を減らす。
            $this->energy = $this->energy - $this->cost;
        }
    }

    function refueling():void{
        print("現在給油中です..............".PHP_EOL);
        $this->energy = $this->max_energy;
        print("満タンになりました。".PHP_EOL);
    }
}
