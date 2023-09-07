<?php

class Bard{
    private string $name;
    private string $voice;
    private array $catched_prey=[];
    private array $friends=[];
    private array $childlen=[];

    function __construct(string $name, string $voice){
        $this->name = $name;
        $this->voice = $voice;
    }

    function cry():void{
        echo $this->voice.PHP_EOL;
    }

    function catch(){
        $array =["木の実","昆虫","果実","植物"];
        //array_rand関数を使用してランダムに獲物を捕獲する
        $hunt = array_rand($array,1);
        $prey = $array[$hunt];
        //キャッチした獲物をリストに格納
        $this->catched_prey[] = $prey;
        return $prey;
    }

    //獲物リストメソッド
    function catchlist(){
        $huntlist = $this->catched_prey;
        return $huntlist;
    }

    //別の鳥と友達になるメソッド $frendはBard型
    function be_friends_with($frend){
        //array_push関数を使用してfriends配列の末尾に追加
        array_push($this->friends,$frend);
    }

    function give_birth(string $babyname,string $babyvoice){
        //Bardクラスからインスタンスを生成
        $baby = new Bard($babyname,$babyvoice);
        //childlen配列の末尾に$babyを追加
        array_push($this->childlen,$baby);
        //生まれた赤ちゃんを返却
        return $baby;
    }

    function get_friends():array{
        //friendsプロパティを返却する。
        return $this->friends;
    }

    function get_children():array{
        //childlenプロパティを返却する。
        return $this->childlen;
    }

}

//テストコード

//Bardクラスからインスタンスを作成
$crow = new Bard("カラス","カーカー");
$pigeon = new Bard("ハト","ポッポー");

// cry() メソッドを呼び出して声を出力
echo "鳴き声:".$crow->cry().PHP_EOL;

// catch() メソッドを呼び出して捕獲した獲物を出力 捕獲リストを確認するために複数回メソッドを呼び出す。
for($i=0; $i<3; $i++){
    echo "捕獲した獲物:".$crow->catch().PHP_EOL;
}

// catch() メソッドで捕獲した獲物リストを出力
echo"獲物リスト:";
print_r($crow->catchlist()); 

// be_friends_with() メソッドを呼び出して友達を追加
$crow->be_friends_with($pigeon);

// get_friends() メソッドを呼び出して友達のリストを表示
echo "友達:";
print_r($crow->get_friends());

// give_birth() メソッドを呼び出して子供を生む
$bady = $crow->give_birth('つばめ', 'つぴーつぴー');

// get_children() メソッドを呼び出して子供のリストを表示
echo "生まれた子: ";
print_r($crow->get_children());
