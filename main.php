<?php

// echo "処理のはじまり〜〜〜！\n\n";

//親クラスから小クラスを定義することを特化　（その逆を汎化） 


// ファイルロード
require_once('./classes/Human.php');
require_once('./classes/Enemy.php');
require_once('./classes/Brave.php');
require_once('./classes/BlackMage.php');
require_once('./classes/WhiteMage.php');

$members = array();
$members[] = new Brave('ティーダ');
$members[] = new WhiteMage('ユウナ');
$members[] = new BlackMage('ルールー');

$enemies = array();
$enemies[] = new Enemy('ゴブリン', 20);
$enemies[] = new Enemy('ボム', 25);
$enemies[] = new Enemy('モルボル', 30);

// 設計図を使って大工さんが木材などを組み立てる作業=インスタンス化
// インスタンス化  new[クラス名]キーワードを使う
// Humanクラスのインスタンスを$tiidaに代入している感じ


$turn = 1;

// どちらかのHPが0になるまで繰り返す
 $isFinishFlg = false;

 while (!$isFinishFlg) {    
     echo "★★★$turn ターン目 ★★★\n\n";
    // ステータス表示
     foreach ($members as $member) {
         echo $member->getName() . "　：　" . $member->getHitPoint() . "/" . $member::MAX_HITPOINT . "\n";
     }
     echo "\n";
     foreach ($enemies as $enemy) {
         echo $enemy->getName() . "　：　" . $enemy->getHitPoint() . "/" . $enemy::MAX_HITPOINT . "\n";
     }
     echo "\n";
    // $tiidaからnameやhitpointを参照している 
    // constで定義したものはオブジェクト定数というものに ::　参照時注意
    
    // 攻撃
     foreach ($members as $member) {
        //  $enemyIndex = rand(0, count($enemies) - 1); // 添字は0から始まるので、-1する
        //  $enemy = $enemies[$enemyIndex];
         // 白魔道士の場合、味方のオブジェクトも渡す
         if (get_class($member) == "WhiteMage") {
             $attackResult = $member->doAttackWhiteMage($enemies, $members);
         } else {
             $attackResult = $member->doAttack($enemies);
         }
        echo "\n";
     }
     echo "\n";
     foreach ($enemies as $enemy) {
         $enemy->doAttack($members);
         echo "\n";
     }
    echo "\n";
    
    
    // 仲間の全滅チェック
    $deathCnt = 0; // HPが0以下の仲間の数
    foreach ($members as $member) {
        if ($member->getHitPoint() > 0) {
            $isFinishFlg = false;
            break;
        }
        $deathCnt++;
    }
    if ($deathCnt === count($members)) {
        $isFinishFlg = true;
        echo "GAME OVER ....\n\n";
        break;
    }
    
    // 敵の全滅チェック
    $deathCnt = 0; // HPが0以下の敵の数
    foreach ($enemies as $enemy) {
        if ($enemy->getHitPoint() > 0) {
            $isFinishFlg = false;
            break;
        }
        $deathCnt++;
    }
    if ($deathCnt === count($enemies)) {
        $isFinishFlg = true;
        echo "♪♪♪ファンファーレ♪♪♪\n\n";
        break;
    }
    
    $turn++;
    // ターンを1増やす
}



echo "★★★戦闘終了★★★\n\n";
 foreach ($members as $member) {
     echo $member->getName() . "　：　" . $member->getHitPoint() . "/" . $member::MAX_HITPOINT . "\n";
 }
 echo "\n";
 foreach ($enemies as $enemy) {
     echo $enemy->getName() . "　：　" . $enemy->getHitPoint() . "/" . $enemy::MAX_HITPOINT . "\n";
 } 