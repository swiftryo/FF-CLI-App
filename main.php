<?php

// echo "処理のはじまり〜〜〜！\n\n";

//親クラスから小クラスを定義することを特化　（その逆を汎化） 


// ファイルロード
require_once('./classes/Human.php');
require_once('./classes/Enemy.php');
require_once('./classes/Brave.php');

// 設計図を使って大工さんが木材などを組み立てる作業=インスタンス化
// インスタンス化  new[クラス名]キーワードを使う
$tiida = new Brave("ティーダ");
// Humanクラスのインスタンスを$tiidaに代入している感じ
$goblin = new Enemy("ゴブリン");


$turn = 1;

// どちらかのHPが0になるまで繰り返す
while ($tiida->getHitPoint() > 0 && $goblin->getHitPoint() > 0) {
    echo "★★★$turn ターン目 ★★★\n\n";
    // ステータス表示
    echo $tiida->getName() . "　：　" . $tiida->getHitPoint() . "/" . $tiida::MAX_HITPOINT . "\n";
    echo $goblin->getName() . "　：　" . $goblin->getHitPoint() . "/" . $goblin::MAX_HITPOINT . "\n"; 
    echo "\n";
    // $tiidaからnameやhitpointを参照している 
    // constで定義したものはオブジェクト定数というものに ::　参照時注意
    
    // 攻撃
    $tiida->doAttack($goblin);
    echo "\n";
    $goblin->doAttack($tiida);
    echo "\n";
    
    $turn++;
    // ターンを1増やす
}

echo "★★★戦闘終了★★★\n\n";
echo $tiida->getName() . "　：　" . $tiida->getHitPoint() . "/" . $tiida::MAX_HITPOINT . "\n"; 
echo $goblin->getName() . "　：　" . $goblin->getHitPoint() . "/" . $goblin::MAX_HITPOINT . "\n\n"; 