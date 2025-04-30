<?php

declare(strict_types=1);

return [
    'listTitle' => 'Order List',
    'addOrder' => 'Add New Order',
    'editOrder' => 'Edit Order',
    'headers' => [
        'client' => 'Client',
        'branch' => 'Branch',
        'total' => 'Total',
        'status' => 'Status',
        'typeDelivery' => 'Delivery Type',
        'deliveryMan' => 'Delivery Person',
        'createdAt' => 'Created',
        'updatedAt' => 'Updated',
        'actions' => 'Actions',
    ],
    'empty' => 'No orders registered.',
    'actions' => [
        'edit' => 'Edit',
        'delete' => 'Delete',
        'confirmDeleteMessage' => 'Are you sure you want to delete this order?',
    ],
    'forms' => [
        'save' => 'Save',
        'cancel' => 'Cancel',
        'client' => [
            'label' => 'Client',
            'placeholder' => 'Select a client...',
        ],
        'branch' => [
            'label' => 'Branch',
            'placeholder' => 'Select a branch...',
        ],
        'total' => [
            'label' => 'Total',
            'placeholder' => 'Enter the total...',
        ],
        'status' => [
            'label' => 'Status',
            'placeholder' => 'Select a status...',
            'options' => [
                'pendiente' => 'Pending',
                'en_preparacion' => 'In Preparation',
                'listo' => 'Ready',
                'entregado' => 'Delivered',
            ],
        ],
        'typeOfDelivery' => [
            'label' => 'Delivery Type',
            'placeholder' => 'Select a delivery type...',
            'options' => [
                'en_local' => 'Pick up at the store',
                'a_domicilio' => 'Home delivery',
            ],
        ],
        'deliveryMan' => [
            'label' => 'Delivery Person',
            'placeholder' => 'Select a delivery person...',
            'options' => [
                'en_local' => 'Pick up at the store',
                'a_domicilio' => 'Home delivery',
            ],
        ],
    ],
];
