<?php

class Brave extends Human
// class [クラス名] extends [継承元クラス名]
{
    const MAX_HITPOINT = 120;
    public $hitPoint = self::MAX_HITPOINT;
    public $attackPoint = 30;
    
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

// オーバーライド 
// ポリモーフィズム
// カプセル化