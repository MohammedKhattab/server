<?php

return [
    'resource' => '{{ modelName }}',

    'fields' => [
        'id' => '#',
		'url' => 'Url',
		'started_at' => 'Started_At',
		'expired_at' => 'Expired_At',
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
