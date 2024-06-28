<?php
return [

    'user' => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'phone_no' => 'Phone number',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'all_privilege'            => 'All Privillege'
        ],
    ],
    'rating' => [
        'title'          => 'Ratings',
        'title_singular' => 'Rating',
        'fields'         => [
            'no'            => 'No',
            'id'            => 'ID',
            'user'          => 'User',
            'product'       => 'Product',
            'rating_value'  => 'Rating Value',
            'review_text'   => 'Review Text',
            'rating_date'   => 'Rating Date',
        ],
    ],
    'category'=>[
        'title' => 'Category',
        'title_singular' => 'Category Title',
        'fields'    =>[
            'no'    => 'No',
            'id'=>'ID',
            'parent_id'=>'Parent Category Name',
            'name' => 'Name',
            'image' => 'Image'
        ],
    ],
    'product'=>[
        'title' => 'Product',
        'title_singular' => 'Product Title',
        'fields' => [
            'no' => 'No',
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'price' => 'Price',
            'qty' => 'Quantity',
            'discount' => 'Discount',
            'category_id' => 'Category',
            'rating_id' => 'Rating',
            'image' => 'Image',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At'
        ],
    ],
    'order'=>[
        'title' => 'Order',
        'title_singular' => 'Order Title',
        'fields'    =>[
            'no'    => 'No',
            'id'=>'ID',
            // 'user_id'=>'Name',
            'name' => 'Name',
            'status' => 'Status'
        ],
    ],
    'order_product' => [
        'title' => 'Order Product',
        'title_singular' => 'Order Product',
        'fields' => [
            'no'    => 'No',
            'id' => 'ID',
            'order_id' => 'Order',
            'product_id' => 'Product',
            'price' => 'Price',
        ],
    ],

];
