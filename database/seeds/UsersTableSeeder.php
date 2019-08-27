<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$users = array(
            array('name'=>'Joel King','email'=>'joel@shopping.co.za','type'=>\App\User::USER_TYPE_CUSTOMER,'password'=>bcrypt('password')),
            array('name'=>'Kim Cloete','email'=>'kim@shopping.co.za','password'=>bcrypt('password')),
        );*/

        $products = array(
            array('name'=>'Mad Giant Urban Legend','description'=>'Mad Giant Urban Legend - IPA - 24 x 340 ml','price'=>575,'discountPerc'=>0.5),
            array('name'=>'Samsung Galaxy A30','description'=>'Samsung Galaxy A30 64GB Dual Sim - Blue','price'=>4000,'discountPerc'=>0.5),
            array('name'=>'Light Bulb','description'=>'Notebook:Light Bulbs','price'=>115,'discountPerc'=>0.25),
            array('name'=>'SanDisk USB','description'=>'SanDisk Cruzer Blade Flash Drive 16GB','price'=>4000,'discountPerc'=>0.5),
        );
/*
        foreach ($users as $user){
            \App\User::create($user);
        }*/

        foreach ($products as $product){
            \App\Product::create($product);
        }


    }
}
