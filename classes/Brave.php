<?php

class Brave extends Human
// class [クラス名] extends [継承元クラス名]
{
    const MAX_HITPOINT = 120;
    private $hitPoint = self::MAX_HITPOINT;
    private $attackPoint = 30;
    
    public function doAttack($enemy)
    {
        // 乱数の発動
        if (rand(1,3) === 1){
            // 1/3の確率でスキルを発動
            // スキルの発動
            echo "『" .$this->name . "』のスキルが発動した!\n";
            echo "『ぜんりょくぎり』!!\n";
            echo $enemy->name . "に" . $this->attackPoint * 1.5 . "のダメージ!\n";
            $enemy->tookDamage($this->attackPoint * 1.5);
        } else {
            parent::doAttack($enemy);
        }
        return true;
    }
}

// オブジェクト指向3原則
// オーバーライド 
// ポリモーフィズム

// カプセル化
// private : 宣言されたクラスの中でのみ使用可能
// protected : 宣言されたクラスまたは、継承先クラスでのみ使用可能
// public : クラスの中ｍ外関係なく使用可能 
// すべてpublicは良くない 適切なアクセスレベルが設定されていないことはバグを生みやすくなる
// 基本原則としてプロパティはprivate(場合によってはprotected)にすることを目指す
