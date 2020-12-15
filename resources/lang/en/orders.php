<?php

return [
    'resource' => '{{ modelName }}',

    'fields' => [
        'id' => '#',
		'is_for_client' => 'Is_For_Client',
		'status' => 'Status',
		'city' => 'City',
		'target_name' => 'Target_Name',
		'target_phone' => 'Target_Phone',
		'target_city' => 'Target_City',
		'target_references' => 'Target_References',
		'product_type' => 'Product_Type',
		'product_price' => 'Product_Price',
        'created_at' => 'Created at',
        'updated_at' => 'Last update at'
    ],

    'create' => [
        'title' => 'Add new',
        'cancel' => 'Cancel',
        'save' => 'Create'
    ],

    'view' => [
        'action-button' => 'View',
        'title' => 'View'
    ],

    'edit' => [
        'action-button' => 'Update',
        'title' => 'Update',
        'cancel' => 'Cancel',
        'save' => 'Save changes'
    ],

    'delete' => [
        'action-button' => 'Delete',
        'title' => 'Are you sure you want that?',
        'text' => 'You will also permanently lose its information and relationships!',
        'confirm' => 'Yes, Delete it',
        'cancel' => 'No, Cancel'
    ],

    'messages' => [
        'created' => 'Record has been created',
        'updated' => 'Record has been updated',
        'deleted' => 'Record has been deleted'
    ]
];
