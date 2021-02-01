<?php

// echo "処理のはじまり〜〜〜！\n\n";

// ファイルロード
require_once('./classes/Human.php');
require_once('./classes/Enemy.php');

// 設計図を使って大工さんが木材などを組み立てる作業=インスタンス化
// インスタンス化  new[クラス名]キーワードを使う
$tiida = new Human();
// Humanクラスのインスタンスを$tiidaに代入している感じ
$goblin = new Enemy();

$tiida->name = "ティーダ";
$goblin->name = "ゴブリン";

$turn = 1;

// どちらかのHPが0になるまで繰り返す
while ($tiida->hitPoint > 0 && $goblin->hitPoint > 0) {
    echo "★★★$turn ターン目 ★★★\n\n";
    // ステータス表示
    echo $tiida->name. ":" . $tiida->hitPoint . "/" .$tiida::MAX_HITPOINT . "\n";
    echo $goblin->name. ":" .$goblin->hitPoint . "/" . $goblin::MAX_HITPOINT . "\n";
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
echo $tiida->name . ":" . $tiida->hitPoint . "/" . $tiida::MAX_HITPOINT . "\n";
echo $goblin->name . ":" . $goblin->hitPoint . "/" . $goblin::MAX_HITPOINT . "\n\n";